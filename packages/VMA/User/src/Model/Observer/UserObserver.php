<?php

namespace VMA\User\Model\Observer;


use VMA\User\Model\User;
use Longtt\B2s\Model\User_account;

class UserObserver
{
    public function __construct()
    {
    }

    public function created(User $user)
    {
        if($user->role_id == ROLE_ID_DOANH_NGHIEP){
            $arrCreateWallet = [
                'user_id' => $user->id,
                'status' => 'active',
                'currency' => env('CURRENCY','VND')
            ];
            $createWallet = app(User_account::class)->createItem($arrCreateWallet);
        }

    }
}
