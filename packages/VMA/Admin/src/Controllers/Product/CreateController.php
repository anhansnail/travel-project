<?php
namespace VMA\Admin\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use VMA\Admin\Model\Product;


class CreateController extends Controller
{

    public function index()
    {
        $products=Product::all();
        return view('admin::product.create',["products"=>$products]);

    }

}
