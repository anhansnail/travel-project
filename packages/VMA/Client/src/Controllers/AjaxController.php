<?php

namespace VMA\Client\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use VMA\Client\Helper;
use VMA\User\Model\User;
use VMA\Admin\Model\Categorie;

class AjaxController extends Controller
{

    public $_user;

    public function __construct(User $user)
    {
        $this->_user = $user;
    }

    public function check_menu_category()
    {
        $categories = "";
        $resuls = "";
        $categories=Categorie::where('status','=','open')->get();
//        dd($categories);
        if($categories != null){
            foreach ($categories as $cate){
                $resuls = $resuls.'<a href="'.url('/').'/client/product/category/'.$cate->id.'">'.$cate->name.' </a>';
            }
            return $resuls;
        }else{
            return ;
        }

    }

}
