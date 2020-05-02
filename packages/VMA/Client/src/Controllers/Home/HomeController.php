<?php

namespace VMA\Client\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use VMA\Client\Helper;
use VMA\User\Model\User;
use VMA\Admin\Model\Categorie;
use VMA\Admin\Model\Post;

class HomeController extends Controller
{

    public $_user;
    public $_category;
    public $_post;

    public function __construct(User $user, Categorie $categorie, Post $post)
    {
        $this->_user = $user;
        $this->_category = $categorie;
        $this->_post = $post;
    }

    public function index()
    {
        #get posts, get categories

        $categories = [];
        $posts = [];
        $categories = $this->_category->where('status','open')->get();
        $posts = $this->_post->where('status','open')->get();
        return view('client::home',['categories'=>$categories, 'posts'=>$posts]);
    }

}
