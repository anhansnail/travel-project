<?php
namespace VMA\Admin\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use VMA\Admin\Model\Post;

class IndexController extends Controller
{
    public function index()
    {
        $records=Post::paginate(3);
        return view('admin::post.index', ['records' => $records]);
    }

}
