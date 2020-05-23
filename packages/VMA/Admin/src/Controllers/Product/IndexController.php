<?php
namespace VMA\Admin\Controllers\Product;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use VMA\Admin\Model\Product;

class IndexController extends Controller
{
    public function index()
    {
//        dd(URL::current());
//        dd(app_path());
//        dd(base_path('storage\upload'));
//        dd(storage_path('app\upload<\>'));
        $records=Product::paginate(10);
        return view('admin::product.index', ['records' => $records]);
    }

}
