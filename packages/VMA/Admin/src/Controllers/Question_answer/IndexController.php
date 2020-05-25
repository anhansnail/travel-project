<?php
namespace VMA\Admin\Controllers\Question_answer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use VMA\Admin\Model\Question_answer;

class IndexController extends Controller
{
    public function index()
    {
        $records=Question_answer::paginate(3);
        return view('admin::question_answer.index', ['records' => $records]);
    }

}
