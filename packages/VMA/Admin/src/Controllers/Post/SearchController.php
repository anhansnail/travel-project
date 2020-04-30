<?php
namespace VMA\Admin\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use VMA\Admin\Model\Post;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('q');
        if ($query)
        {
            $records = Post::where('name', 'LIKE', "%$query%")
                     ->orWhere('id', 'LIKE', "%$query%")
         ->orWhere('title', 'LIKE', "%$query%")
         ->orWhere('content', 'LIKE', "%$query%")
         ->orWhere('image', 'LIKE', "%$query%")
         ->orWhere('user_id', 'LIKE', "%$query%")
         ->orWhere('status', 'LIKE', "%$query%")
         ->orWhere('created_at', 'LIKE', "%$query%")
         ->orWhere('updated_at', 'LIKE', "%$query%")

            ->paginate(3);
        }
        else
        {
            $records = Post::orderBy('id', 'DESC')->paginate(3);
        }

        //$records=Post::paginate(15);
        return view('admin::post.index', ['records' => $records]);
    }

}

