<?php

namespace Longtt\B2s\Model\Observer;


use Longtt\B2s\Model\Log_xnk_npp;
use Longtt\B2s\Model\Order;
use Longtt\B2s\Model\Order_item;
use Longtt\B2s\Model\User_product;

class OrderObserver {
    public $_user;


    public function __construct()
    {

    }

    public function saved(Order $order){

    }

    public function created(Order $order){

    }

    public function updated(Order $order) {

        if($order->status == 'hoan_thanh_don_hang'){
            # sau khi xuất kho thì lưu vào bảng log_xnk_npp
            $getOrderItems = $order->order_item;
            foreach ($getOrderItems as $getOrderItem){
                $arrCreateXNK = [
                'product_id'=>$getOrderItem->product_id,
                'qty' => $getOrderItem->qty,
                'price' => $getOrderItem->price,
                'user_npp_id' => $getOrderItem->user_npp_id,
                'type' => 1  #0 : nhập, 1 : xuất
                ];
                app(Log_xnk_npp::class)->createItem($arrCreateXNK);
            }
        }
        #huỷ đơn hàng thì chuyển lại sản phẩm cho kho chứa
        elseif ($order->status == 'huy_don_hang'){
            $orderItems = $order->order_item;
            foreach ($orderItems as $orderItem){
                $getUserProduct = app(User_product::class)->searchByCondition(['user_id'=>$orderItem->user_npp_id,'product_id'=>$orderItem->product_id,'is_first'=>1]);
                if(isset($getUserProduct->id)){
                    app(User_product::class)->updateItem($getUserProduct->id,['qty'=>$getUserProduct->qty + $orderItem->qty]);
                }
            }
        }
    }

}