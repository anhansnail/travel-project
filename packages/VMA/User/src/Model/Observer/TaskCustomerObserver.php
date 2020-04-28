<?php

namespace VMA\User\Model\Observer;


use Longtt\B2s\Model\Statistic_check_in_qualities;
use Longtt\B2s\Model\Task_customer;
use Longtt\B2s\Model\Task;
use Longtt\B2s\Model\Order_item;
use Longtt\B2s\Model\User_product;

class TaskCustomerObserver
{
    public $_user;


    public function __construct()
    {

    }

    public function saved(Task_customer $task_customer)
    {

    }

    public function created(Task_customer $task_customer)
    {

    }

    public function updated(Task_customer $task_customer)
    {
        //chỉ khi checkin rồi mới tạo ở bảng log này
        if ($task_customer->status == 'da_checkin') {
            # sau khi đã checkin lấy thông tin của task ngày hôm đó và lưu thống kê vào bảng Statistic_check_in_qualities
            $task = $task_customer->task;
            if ($task) {
                //từ user_bh_id tính được ra các task đã hoàn thành
                $user_bh_id = $task->user_bh_id;
                $statistic = Statistic_check_in_qualities::
                where('user_bh_id', $user_bh_id)
                    ->where('month', (int)date('m', strtotime($task->start_date)))
                    ->where('year', (int)date('Y', strtotime($task->start_date)))
                    ->first();

                //Nếu đã có nhân viên bán hàng này trong log rồi thì update
                if ($statistic!=null) {
                    //nếu có task_customer trc đã hoàn thành thì ko cập nhật nữa, 1 ngày chỉ 1 lần chấm công
                   $other_task_customer=Task_customer::where('task_id', $task_customer->task_id)
                       ->where('status', 'da_checkin')
                       ->get();
                    if($other_task_customer->count()<=1){//nếu là 1 thì chính là bản thân nó đã chuyển trạng thái đã check in
                        $arrCreateStatisticCheckIn = [
                            'user_bh_id' =>$user_bh_id,
                            'finished_task' => $statistic->finished_task + 1,
                            'approved_task' => $statistic->approved_task ,
                            'month' => (int)date('m', strtotime($task->start_date)),
                            'year' => (int)date('Y', strtotime($task->start_date))
                            //ngày này là ngày phải hoàn thành công việc
                        ];
                        app(Statistic_check_in_qualities::class)->updateItem($statistic->id,$arrCreateStatisticCheckIn);
                    }
                }
                else{
                    $arrCreateStatisticCheckIn = [
                        'user_bh_id' =>$user_bh_id,
                        'finished_task' => 1,
                        'approved_task' => $statistic->approved_task ,
                        'month' => (int)date('m', strtotime($task->start_date)),
                        'year' => (int)date('Y', strtotime($task->start_date))
                        //ngày này là ngày phải hoàn thành công việc
                    ];
                    app(Statistic_check_in_qualities::class)->createItem($arrCreateStatisticCheckIn);
                }
            }
        }
    }
}