<?php

namespace VMA\Client\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use VMA\Client\Helper;
use VMA\User\Model\User;
use VMA\Admin\Model\Product;

class ProductCategoryController extends Controller
{

    public $__user;
    public $__product;

    public function __construct(User $user, Product $product)
    {
        $this->__user = $user;
        $this->__product = $product;
    }

    public function index()
    {
        // login xong mà chưa xác thực email luôn phải show ra màn hình yêu cầu check mail để xác thực email trước khi sử dụng
        return view('client::home');
    }

    public function product_category($id)
    {
        $records = [];
        $search = [
            'category_id' => $id,
        ];
        $records = $this->__product->searchByCondition($search);
//        dd($records);
        return view('client::product',['records'=>$records]);
    }




}
