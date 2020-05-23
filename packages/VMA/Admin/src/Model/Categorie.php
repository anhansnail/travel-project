<?php
/**
 * Created by PhpStorm.
 * admin: long
 * Date: 2/7/17
 * Time: 4:23 PM
 */
namespace VMA\Admin\Model;

use Illuminate\Database\Eloquent\Model;

class Categorie extends BaseModel {
    protected $table = TABLE_CATEGORY;
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = array('name', 'user_id','image','description',
        'status','created_at','updated_at');
    public function product(){
        return $this->hasMany('VMA\Admin\Model\Product','category_id','id');
    }
}