<?php

namespace VMA\Client\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use VMA\Admin\Model\Categorie;
use VMA\Admin\Model\Product;
use VMA\Client\Helper;
use VMA\User\Model\User;

class ProductController extends Controller
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

    public function detail($id)
    {
        $product = $this->__product->find($id);
        return view('client::detail.detail_product', ['product' => $product]);
    }
}
