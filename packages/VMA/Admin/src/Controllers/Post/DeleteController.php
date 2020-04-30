<?php
namespace VMA\Admin\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use VMA\Admin\Model\Post;


class DeleteController extends Controller
{

    public $_post;

    public function __construct(Post $post){
        $this->_post=$post;
    }

    public function index($id)
    {

        $this->_post->find($id)->delete();
        return redirect()->route(
            'post.index'
        )->with('status', 'Data deleted!');

    }

}
