<?php
namespace VMA\Admin\Controllers\Question_answer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use VMA\Admin\Model\Question_answer;

class StoreController extends Controller
{


    public function __construct(){
    }

    public function index(Request $request)
    {
        $this->validate($request, [
            //'name' => 'required|unique:question_answers|max:255',
        ]);
        $model=new Question_answer();
        $model->question=$request->input("question",'');
        $model->answer=$request->input("answer",'');
        $model->user_id=Auth::id();
        $model->status=$request->input("status",'open');

        $model->save();
        return redirect()->route(
            'question_answer.index'
        )->with('status', 'Data saved!');


    }

}

