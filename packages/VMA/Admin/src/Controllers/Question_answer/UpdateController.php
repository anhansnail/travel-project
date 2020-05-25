<?php
namespace VMA\Admin\Controllers\Question_answer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use VMA\Admin\Model\Question_answer;

class UpdateController extends Controller
{

    public $_question_answer;

    public function __construct(Question_answer $question_answer){
        $this->_question_answer=$question_answer;
    }

    public function index(Request $request)
    {
        /*$this->validate($request, [
            'email' => 'required|unique:users|max:255',
        ]);*/
        $id=$request->input('id');
        $model=$this->_question_answer->find($id);
                $model->id=$request->input("id");
        $model->question=$request->input("question");
        $model->answer=$request->input("answer");
        $model->user_id=$request->input("user_id");
        $model->status=$request->input("status");
        $model->created_at=$request->input("created_at");
        $model->updated_at=$request->input("updated_at");

        $model->save();
        return redirect()->route(
            'question_answer.index'
        )->with('status', 'Data updated!');

    }

}

