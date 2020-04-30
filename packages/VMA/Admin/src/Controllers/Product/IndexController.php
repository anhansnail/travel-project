<?php
namespace VMA\Admin\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use VMA\Admin\Model\Product;

class IndexController extends Controller
{
    public function index()
    {
        $records=Product::paginate(3);
        return view('admin::product.index', ['records' => $records]);
    }

}
