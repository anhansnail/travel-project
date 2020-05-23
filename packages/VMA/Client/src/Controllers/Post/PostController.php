<?php

namespace VMA\Client\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use VMA\Client\Helper;
use VMA\User\Model\User;
use VMA\Admin\Model\Product;
use VMA\Admin\Model\Categorie;

class PostController extends Controller
{

    public $__product;

     function __construct(User $user, Product $product, Categorie $categorie)
    {
        $this->__product = $product;
    }
    public function index(Request $request)
    {
        $records = [];
        $dataSearch = [
            'price'=> $request->input('price',''),
            'name'=> $request->input('name',''),
            'category_id'=> $request->input('category_id',''),
            'paginate'=> 1,
        ];
        $records = $this->__product->searchByCondition($dataSearch);
//        dd($records);
        $id_category = 'all';
        return view('client::product',['records'=>$records,'id_category'=>$id_category,'dataSearch'=>$dataSearch]);
    }

}
