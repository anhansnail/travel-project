<?php
namespace VMA\Admin\Controllers\Question_answer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use VMA\Admin\Model\Question_answer;


class DeleteController extends Controller
{

    public $_question_answer;

    public function __construct(Question_answer $question_answer){
        $this->_question_answer=$question_answer;
    }

    public function index($id)
    {

        $this->_question_answer->find($id)->delete();
        return redirect()->route(
            'question_answer.index'
        )->with('status', 'Data deleted!');

    }

}
