<?php
/**
 * Created by PhpStorm.
 * admin: long
 * Date: 2/7/17
 * Time: 4:23 PM
 */
namespace VMA\Admin\Model;

use Illuminate\Database\Eloquent\Model;

class Zone extends Model {
    protected $table = 'zones';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = array('name', 'description','subject','zone_parent_id	','status','uer_id',
        'created_at','updated_at');
}