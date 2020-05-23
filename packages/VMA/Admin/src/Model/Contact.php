<?php
/**
 * Created by PhpStorm.
 * admin: long
 * Date: 2/7/17
 * Time: 4:23 PM
 */
namespace VMA\Admin\Model;

use Illuminate\Database\Eloquent\Model;

class Contact extends BaseModel {
    protected $table = TABLE_CONTACT;
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = array('name', 'email','subject','content',
        'created_at','updated_at');
}