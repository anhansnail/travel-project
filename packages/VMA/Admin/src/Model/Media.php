<?php
/**
 * Created by PhpStorm.
 * admin: long
 * Date: 2/7/17
 * Time: 4:23 PM
 */
namespace VMA\Admin\Model;

use Illuminate\Database\Eloquent\Model;

class Media extends BaseModel {
    protected $table = TABLE_MEDIAS;
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = array('title', 'url','code','user_id','status',
        'created_at','updated_at');
}