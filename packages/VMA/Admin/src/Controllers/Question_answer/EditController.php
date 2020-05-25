<?php
namespace VMA\Admin\Controllers\Question_answer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use VMA\Admin\Model\Question_answer;

class EditController extends Controller
{

    public $question_answer;

    public function __construct(Question_answer $question_answer){
        $this->question_answer=$question_answer;
    }

    public function index($id)
    {


        $question_answer=$this->question_answer->find($id);
        return view('admin::question_answer.edit',[
            'question_answer'=>$question_answer,
        ]);

    }

}

