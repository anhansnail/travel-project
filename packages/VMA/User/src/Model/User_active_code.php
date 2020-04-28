<?php
/**
 * Created by PhpStorm.
 * b2s: long
 * Date: 2/7/17
 * Time: 4:23 PM
 */
namespace Longtt\B2s\Model;

use Illuminate\Database\Eloquent\Model;
use Longtt\User\Model\User;

class User_active_code extends Model {
    public $table = 'user_active_code';
    public $expire_period=1;//ngay

    public function createActiveCode(User $user){
        $this->user_id=$user->id;
        $this->active_code=$s = substr(str_shuffle(str_repeat("23456789abcdefghijkmnpqrstuvwxyz", 5)), 0, 5);
        $this->expire_at=time()+$this->expire_period*24*60*60;
        $this->save();
        return $this;
    }
}