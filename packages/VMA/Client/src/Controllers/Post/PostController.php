<?php

namespace VMA\Client\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use VMA\Client\Helper;
use VMA\User\Model\User;
use VMA\Admin\Model\Post;
use VMA\Admin\Model\Categorie;

class PostController extends Controller
{

    public $__post;

     function __construct(User $user, Post $post, Categorie $categorie)
    {
        $this->__post = $post;
    }
    public function index(Request $request)
    {
        $records = [];
        $dataSearch = [
            'status'=>'open',
            'paginate'=> 1,
        ];
        $records = $this->__post->searchByCondition($dataSearch);
        return view('client::post',['records'=>$records,'dataSearch'=>$dataSearch]);
    }

    public function detail($id){
         $post = $this->__post->find($id);
        return view('client::detail.detail_post',['post'=>$post]);
    }
}
