<?php
namespace VMA\Admin\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use VMA\Admin\Model\Post;

class EditController extends Controller
{

    public $post;

    public function __construct(Post $post){
        $this->post=$post;
    }

    public function index($id)
    {


        $post=$this->post->find($id);
        return view('admin::post.edit',[
            'post'=>$post,
        ]);

    }

}

