<?php
/**
 * Created by PhpStorm.
 * admin: long
 * Date: 2/7/17
 * Time: 4:23 PM
 */
namespace VMA\Admin\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends BaseModel {

    protected $table = TABLE_PRODUCTS;
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = array('name', 'user_id','image','description','price','discount','category_id','status',
        'status','created_at','updated_at');
    public function Categorie(){
        return $this->belongsTo('VMA\Admin\Model\Categorie','category_id','id');
    }
    public function searchByCondition($dataSearch = array())
    {
        try {
            $query = self::where('id', '>', 0);
            if (isset($dataSearch['id'])) {
                if (is_array($dataSearch['id'])) {
                    $query->whereIn('id', $dataSearch['id']);
                } elseif ($dataSearch['id'] > 0) {
                    $query->where('id', $dataSearch['id']);
                }
            }

            if (isset($dataSearch['name'])) {
                if (is_array($dataSearch['name'])) {
                    $query->whereIn('name', $dataSearch['name']);
                } elseif ($dataSearch['name'] !== '') {
                    $query->where('name','LIKE','%'. $dataSearch['name'].'%');
                }
            }

            if (isset($dataSearch['user_id'])) {
                if (is_array($dataSearch['user_id'])) {
                    $query->whereIn('id', $dataSearch['user_id']);
                } elseif ($dataSearch['user_id'] > 0) {
                    $query->where('id', $dataSearch['user_id']);
                }
            }


            if (isset($dataSearch['category_id'])) {
                if (is_array($dataSearch['category_id'])) {
                    $query->whereIn('category_id', $dataSearch['category_id']);
                } elseif ($dataSearch['category_id'] > 0) {
                    $query->where('category_id', $dataSearch['category_id']);
                }
            }

            if(isset($dataSearch['paginate']) && $dataSearch['paginate'] == 1 ){
                $result = $query->paginate(NUMBER_OF_EACH_PAGE);
            }
            else{
                $fields = (isset($dataSearch['field_get']) && trim($dataSearch['field_get']) != '') ? explode(',', trim($dataSearch['field_get'])) : array();
                if (isset($dataSearch['is_first']) && $dataSearch['is_first'] == 1) {
                    if (!empty($fields)) {
                        $result = $query->first($fields);
                    } else {
                        $result = $query->first();
                    }

                } else {
                    if(isset($dataSearch['limit'])){
                        $query->limit($dataSearch['limit'])->offset($dataSearch['offset']);
                    }
                    if (!empty($fields)) {
                        $result = $query->get($fields);
                    } else {
                        $result = $query->get();
                    }
                }
            }

            return $result;


        } catch (PDOException $e) {
            throw new PDOException();
        }
    }

    public function createItem($data)
    {
        $create = 0;
        try {
            $fieldInput = $this->checkFieldInTable($data);
            if (count($fieldInput) > 0) {
                $create = self::create($fieldInput);
            }
            return $create->id;
        } catch (PDOException $e) {
            return $create;
        }
    }

    public function updateItem($id, $data)
    {
        try {
            $fieldInput = $this->checkFieldInTable($data);
            $item = self::find($id)->update($fieldInput);
            return $item;
        } catch (PDOException $e) {
            return false;
        }
    }

}