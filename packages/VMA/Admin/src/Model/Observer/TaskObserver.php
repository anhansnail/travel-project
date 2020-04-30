<?php

namespace Longtt\B2s\Model\Observer;


use Longtt\B2s\Model\Statistic_check_in_qualities;
use Longtt\B2s\Model\Task;
use Longtt\B2s\Model\Task_customer;
use Longtt\B2s\Model\Order_item;
use Longtt\B2s\Model\User_product;

class TaskObserver
{
    public $_user;


    public function __construct()
    {

    }

    public function saved(Task $task)
    {

    }

    public function created(Task $task)
    {
        $user_bh_id=$task->user_bh_id;
        $statistic = Statistic_check_in_qualities::where('user_bh_id', $user_bh_id)
            ->where('month', (int)date('m', strtotime($task->start_date)))
            ->where('year', (int)date('Y', strtotime($task->start_date)))
            ->first();
        //nếu tồn tại log này rồi thì update số task
        if ($statistic!=null) {
            $arrCreateStatisticCheckIn = [
                'user_bh_id' =>$user_bh_id,
                'finished_task' => $statistic->finished_task,
                'approved_task' => $statistic->approved_task + 1,
                'month' => (int)date('m', strtotime($task->start_date)),
                'year' => (int)date('Y', strtotime($task->start_date))
                //ngày này là ngày phải hoàn thành công việc
            ];
            app(Statistic_check_in_qualities::class)->updateItem($statistic->id,$arrCreateStatisticCheckIn);
        } else {  //nếu chưa thì tạo log mới
            $arrCreateStatisticCheckIn = [
                'user_bh_id' => $user_bh_id,
                'finished_task' => 0,
                'approved_task' => 1,
                'month' => (int)date('m', strtotime($task->start_date)),
                'year' => (int)date('Y', strtotime($task->start_date))
            ];
            app(Statistic_check_in_qualities::class)->createItem($arrCreateStatisticCheckIn);
        }
    }

    public function updated(Task $task)
    {
    }
}