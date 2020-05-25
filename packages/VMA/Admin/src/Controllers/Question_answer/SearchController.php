<?php
namespace VMA\Admin\Controllers\Question_answer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use VMA\Admin\Model\Question_answer;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('q');
        if ($query)
        {
            $records = Question_answer::where('name', 'LIKE', "%$query%")
                     ->orWhere('id', 'LIKE', "%$query%")
         ->orWhere('question', 'LIKE', "%$query%")
         ->orWhere('answer', 'LIKE', "%$query%")
         ->orWhere('user_id', 'LIKE', "%$query%")
         ->orWhere('status', 'LIKE', "%$query%")
         ->orWhere('created_at', 'LIKE', "%$query%")
         ->orWhere('updated_at', 'LIKE', "%$query%")

            ->paginate(3);
        }
        else
        {
            $records = Question_answer::orderBy('id', 'DESC')->paginate(3);
        }

        //$records=Question_answer::paginate(15);
        return view('admin::question_answer.index', ['records' => $records]);
    }

}

