<?php

namespace VMA\Client\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use VMA\Client\Helper;
use VMA\User\Model\User;
use VMA\Admin\Model\Product;
use VMA\Admin\Model\Categorie;

class ProductCategoryController extends Controller
{

    public $__user;
    public $__product;
    public $__categorie;

    public function __construct(User $user, Product $product, Categorie $categorie)
    {
        $this->__user = $user;
        $this->__product = $product;
        $this->__categorie = $categorie;
    }

    public function index()
    {
        // login xong mà chưa xác thực email luôn phải show ra màn hình yêu cầu check mail để xác thực email trước khi sử dụng
        return view('client::home');
    }

    public function product_category(Request $request,$id)
    {
        $records = [];
        $dataSearch = [
            'paginate'=> 1,
            'price'=> $request->input('price',''),
            'name'=> $request->input('name',''),
            'category_id' => $id,
        ];
        $records = $this->__product->searchByCondition($dataSearch);
        $category = $this->__categorie->find($id);
//        dd($category);
        $id_category=$id;
        return view('client::product',['records'=>$records,'id_category'=>$id_category,'dataSearch'=>$dataSearch]);
    }




}
