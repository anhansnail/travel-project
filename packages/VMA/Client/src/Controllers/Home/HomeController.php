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
use VMA\Admin\Model\Media;

class HomeController extends Controller
{

    public $_user;
    public $_category;
    public $_post;
    public $_media;

    public function __construct(User $user, Categorie $categorie, Post $post, Media $media)
    {
        $this->_user = $user;
        $this->_category = $categorie;
        $this->_post = $post;
        $this->_media = $media;
    }

    public function index(Request $request)
    {
        #get posts, get categories

        $categories = [];
        $posts = [];
        $slides = [];
        $categories = $this->_category->where('status','open')->get();
        $slides = $this->_media->where('status','open')->get();
        $posts = $this->_post->where('status','open')->take(5)->get();
        return view('client::home',['categories'=>$categories, 'posts'=>$posts,'slides'=>$slides]);
    }
    public function changeLanguage($language)
    {
        Session::put('website_language', $language);

        return redirect()->back();
    }
}
