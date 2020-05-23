<?php
namespace VMA\Admin\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Longtt\B2s\Model\User_account;
use Longtt\B2s\Model\User_pending_transaction;
use Longtt\B2sapi\Response;
use DB;
use Exception;

class UserPendingTransactionService {

    private $__user_pending_transaction;
    private $__user_account;
    public function __construct(User_pending_transaction $user_pending_transaction,User_account $user_account)
    {
        $this->__user_pending_transaction = $user_pending_transaction;
        $this->__user_account = $user_account;
    }


    public function sendMail($user,$password,$template,$routeBack,$subject){
        try {

            Mail::send($template, ['user' => $user, 'password' => $password], function ($m) use ($user, $password,$subject) {
                $m->from(env('MAIL_USERNAME'), 'SHARK DMS');
                $m->to($user->email, $user->name)->subject($subject);
            });
        } catch (\Exception $exception) {
            return redirect()->route($routeBack)->withErrors('status', 'Không thể gửi thư, vui lòng kiểm tra lại or liên hệ nhân viên kĩ thuật');
        }
    }

    public function createPendingTransaction($dataCreate = [],$masterAccount = [],$userAccount = [])
    {
        $transactionAmount = isset($dataCreate['transaction_amount']) ? $dataCreate['transaction_amount'] : 0;
        DB::beginTransaction();

        try{
            $arrCreateTransaction = [
                'code' => CODE_NAP_TIEN . $userAccount->id . time(), // mã giao dịch của DMS-
                'transaction_type' => NAP_TIEN, //loại hình giao dịch: nap,rut, chuyen tien
                'transaction_amount' => $transactionAmount, // số tiền giao dịch
                'transaction_id' => isset($dataCreate['transaction_id']) ? $dataCreate['transaction_id'] : '', // mã giao dịch ngân hàng
                'user_id_sent' => 0, // id người gửi, nếu là master_wallet thì để trống
                'account_id_sent' => 1, // id ví người gửi
                'user_id_receive' => $userAccount->user_id, //id của người nhận
                'account_id_receive' => $userAccount->id, // id ví của người nhận
                'currency' => $userAccount->currency, // đơn vị tiền tệ
                'note' => isset($dataCreate['note']) ? $dataCreate['note'] : '', // chú ý
                'status' => isset($dataCreate['image']) ? 'cho_giao_dich' : 'moi', // trạng thái
                'balance_sent_before' => $masterAccount->balance,
                'balance_sent_after' => $masterAccount->balance - $transactionAmount,
                'balance_receive_before' => $userAccount->balance,
                'balance_receive_after' => $userAccount->balance + $transactionAmount,
                'user_id' => $userAccount->user_id,
                'data' => isset($dataCreate['image']) ? json_encode(['image_url'=>$dataCreate['image']]) : '', // thường để lưu link ảnh, chụp giao dịch với ngân hàng, lưu dưới dạng json
            ];

            $creatingTrangsaction = $this->__user_pending_transaction->createItem($arrCreateTransaction);


            # tạo transaction xong thì cập nhật pending balance của user và trừ tiền ở ví master
            $updatePendingUser = $this->__user_account
                ->updateItem($userAccount->id,['pending_balance' => $userAccount->pending_balance + $transactionAmount]);

            $updateMasterWallet = $this->__user_account
                ->updateItem($masterAccount->id,['balance' => $masterAccount->balance - $transactionAmount]);

            DB::commit();
        }
        catch(Exception $exception){
            DB::rollback();
            return false;
        }
        return true;
    }

    public function cancelPendingTransaction($modelTransaction,$masterAccount = [],$userAccount = [],$data = [])
    {
        DB::beginTransaction();

        try{
           //chuyển trạng thái pending_transaction sang huỷ
            $logData = json_decode($modelTransaction->data);
            $logData->user_cancel_id = Auth::id();

            $arrCancel['data'] = json_encode($logData);
            $arrCancel['status'] = 'huy';
            if(isset($data['note'])) $arrCancel['note'] = 'huy';


            $cancelTrangsaction = $this->__user_pending_transaction->updateItem($modelTransaction->id,$arrCancel);
//
//
//            # cộng lại tiền cho ví master và trừ pending_balance của ví người dùng
            $updatePendingUser = $this->__user_account
                ->updateItem($userAccount->id,['pending_balance' => $userAccount->pending_balance - $modelTransaction->transaction_amount]);

            $updateMasterWallet = $this->__user_account
                ->updateItem($masterAccount->id,['balance' => $masterAccount->balance + $modelTransaction->transaction_amount]);

            DB::commit();
        }
        catch(Exception $exception){
            DB::rollback();
            return false;
        }
        return true;
    }


}
