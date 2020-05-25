<?php
namespace VMA\Admin\Controllers\Question_answer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use VMA\Admin\Model\Question_answer;


class CreateController extends Controller
{

    public function index()
    {
        $question_answers=Question_answer::all();
        return view('admin::question_answer.create',["question_answers"=>$question_answers]);

    }

}
