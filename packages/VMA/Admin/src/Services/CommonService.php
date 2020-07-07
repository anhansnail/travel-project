<?php
namespace VMA\Admin\Services;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use VMA\User\Response;
use Maatwebsite\Excel\Excel;

class CommonService {
    public function __construct(){}


    public function sendMail($user,$password,$template,$routeBack,$subject){
        try {

            Mail::send($template, ['user' => $user, 'password' => $password], function ($m) use ($user, $password,$subject) {
                $m->from(env('MAIL_USERNAME'), 'Minh Anh Travel');
                $m->to($user->email, $user->name)->subject($subject);
            });
        } catch (\Exception $exception) {
            return redirect()->route($routeBack)->withErrors('status', 'Không thể gửi thư, vui lòng kiểm tra lại or liên hệ nhân viên kĩ thuật');
        }
    }

    public function sendMailContact($email,$name,$template,$routeBack,$subject){
        try {
           Mail::send($template, ['email' => $email,'name'=>$name ], function ($m) use ($email,$name,$subject) {
                $m->from(env('MAIL_USERNAME'), 'Minh Anh Travel');
                $m->to($email,$name)->subject($subject);
            });
        } catch (\Exception $exception) {
            return redirect()->route($routeBack)->withErrors('status', 'Không thể gửi thư, vui lòng kiểm tra lại or liên hệ nhân viên kĩ thuật');
        }
    }
    public function sendMailBooking($email,$name,$template,$routeBack,$subject,$product,$data){
        try {
           Mail::send($template, ['email' => $email,'name'=>$name,'product' =>$product,'data'=>$data], function ($m) use ($email,$name,$subject,$product) {
                $m->from(env('MAIL_USERNAME'), 'Minh Anh Travel');
                $m->to($email,$name)->subject($subject);
            });
        } catch (\Exception $exception) {
            return redirect()->route($routeBack)->withErrors('status', 'Không thể gửi thư, vui lòng kiểm tra lại or liên hệ nhân viên kĩ thuật');
        }
    }
    public function sendMailBookingOTP($email,$template,$routeBack,$subject,$OTP){
        try {
           Mail::send($template, ['email' => $email,'OTP' =>$OTP], function ($m) use ($email,$subject,$OTP) {
                $m->from(env('MAIL_USERNAME'), 'Minh Anh Travel');
                $m->to($email,$email)->subject($subject);
            });
        } catch (\Exception $exception) {
            return redirect()->route($routeBack)->withErrors('status', 'Không thể gửi thư, vui lòng kiểm tra lại or liên hệ nhân viên kĩ thuật');
        }
    }
    public function sendMailCancelBooking($email,$template,$routeBack,$subject,$booking){
        try {
           Mail::send($template, ['email' => $email,'booking'=>$booking], function ($m) use ($email,$subject,$booking) {
                $m->from(env('MAIL_USERNAME'), 'Minh Anh Travel');
                $m->to($email,$email)->subject($subject);
            });
        } catch (\Exception $exception) {
            return redirect()->route($routeBack)->withErrors('status', 'Không thể gửi thư, vui lòng kiểm tra lại or liên hệ nhân viên kĩ thuật');
        }
    }

    public function uploadImage($image,$path = '')
    {
        $avatar_name = '';
//        dd($image);
        $image_extension=$image->getClientOriginalExtension();
        if($image_extension != "jpg" && $image_extension != "png" && $image_extension !="jpeg"){
            $response=Response::$error;
            $response['message']="Ảnh không đúng định dạng. Vui lòng kiểm tra lại.";
            return Response::response($response);
        }
        $avatar_name = strtotime(date('d-m-Y H:i:s')).'-'.str_slug($image->getClientOriginalName()).'.'.$image_extension;
        $image->storeAs('images/product/'.$path, $avatar_name);
        return $avatar_name;
    }
    public function uploadMedia($image,$path = '')
    {
//        dd($path);
        $avatar_name = '';
        $image_extension=$image->getClientOriginalExtension();
        if($image_extension != "jpg" && $image_extension != "png" && $image_extension !="jpeg"){
            $response=Response::$error;
            $response['message']="Ảnh không đúng định dạng. Vui lòng kiểm tra lại.";
            return Response::response($response);
        }
        $avatar_name = strtotime(date('d-m-Y H:i:s')).'-'.str_slug($image->getClientOriginalName()).'.'.$image_extension;
        $image->storeAs('images/media/slide/'.$path, $avatar_name);
        return $avatar_name;
    }

    public function sendMailCombineNpp($email = '',$token = '', $id = ''){
        try {
            Mail::send('b2s::mail.combine_email', ['email' => $email, 'token' => $token, 'id' => $id], function ($m) use ($email, $token) {
                $m->from(env('MAIL_USERNAME'), 'SHARK DMS');
                $m->to($email, $email)->subject('THƯ MỜI BẠN THAM DỰ VÀO HỆ THÔNG CỦA CHÚNG TÔI');
            });
            return true;
        }
        catch (\Exception $e){
            return false;
        }
    }

    public function exportBasicFile($data,$file_name = 'DanhSach'){
        return \Excel::create($file_name, function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                if (!empty($data)) {
                    foreach ($data as $key => $value) {
                        foreach ($value as $key_line => $value_line){
                           $sheet->cell($key_line, $value_line);
                        }
                    }
                }
            });
        })->download('xls');
    }

    public function readFileExcelImport($file){
        $objData = \PHPExcel_IOFactory::createReader('Excel5');

        //Chỉ đọc dữ liệu
        $objData->setReadDataOnly(true);

        // Load dữ liệu sang dạng đối tượng
        $objPHPExcel = $objData->load($file);

        //Lấy ra số trang sử dụng phương thức getSheetCount();
        // Lấy Ra tên trang sử dụng getSheetNames();

        //Chọn trang cần truy xuất
        $sheet = $objPHPExcel->setActiveSheetIndex(0);

        //Lấy ra số dòng cuối cùng
        $Totalrow = $sheet->getHighestRow();
        //Lấy ra tên cột cuối cùng
        $LastColumn = $sheet->getHighestColumn();

        //Chuyển đổi tên cột đó về vị trí thứ, VD: C là 3,D là 4
        $TotalCol = \PHPExcel_Cell::columnIndexFromString($LastColumn);

        //Tạo mảng chứa dữ liệu
        $data = [];
        //Tiến hành lặp qua từng ô dữ liệu
        //----Lặp dòng, Vì dòng đầu là tiêu đề cột nên chúng ta sẽ lặp giá trị từ dòng 2
        for ($i = 2; $i <= $Totalrow; $i++) {
            //----Lặp cột
            for ($j = 0; $j < $TotalCol; $j++) {
                $cellValue = $sheet->getCellByColumnAndRow($j, $i)->getValue();
                if($j == 4 && is_double($cellValue)){
                    //nếu tồn tại ngày mà khách nhập vào rồi thì mới convert
                    $data[$i - 2][$j] = date('Y-m-d', \PHPExcel_Shared_Date::ExcelToPHP($cellValue));
                }
                else{
                    // Tiến hành lấy giá trị của từng ô đổ vào mảng
                    $data[$i - 2][$j] = $cellValue;
                }
            }
        }
        //Hiển thị mảng dữ liệu
        return $data;
    }

}
