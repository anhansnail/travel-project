<?php
namespace VMA\Admin\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use VMA\Admin\Model\Post;


class CreateController extends Controller
{

    public function index()
    {
        $posts=Post::all();
        return view('admin::post.create',["posts"=>$posts]);

    }

}
