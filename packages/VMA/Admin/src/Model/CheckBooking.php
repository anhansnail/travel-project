<?php
/**
 * Created by PhpStorm.
 * admin: long
 * Date: 2/7/17
 * Time: 4:23 PM
 */

namespace VMA\Admin\Model;

use Illuminate\Database\Eloquent\Model;

class CheckBooking extends Model
{
    protected $table = 'check_booking_users';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = array('email', 'code', 'status', 'created_at', 'updated_at');
}