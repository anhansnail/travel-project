<?php
/**
 * Created by PhpStorm.
 * admin: long
 * Date: 2/7/17
 * Time: 4:23 PM
 */
namespace VMA\Admin\Model;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Question_answer extends BaseModel {
    use Searchable;
    protected $table = 'question_answers';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = array('question', 'user_id','answer',
        'status','created_at','updated_at');



    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs()
    {
        return 'question';
    }
    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        $array = $this->toArray();

        // Customize array...

        return $array;
    }
    /**
     * Get the value used to index the model.
     *
     * @return mixed
     */
    public function getScoutKey()
    {
        return $this->id;
    }
}