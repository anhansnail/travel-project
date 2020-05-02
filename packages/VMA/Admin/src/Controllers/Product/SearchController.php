<?php
namespace VMA\Admin\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use VMA\Admin\Model\Product;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('q');
        if ($query)
        {
            $records = Product::where('name', 'LIKE', "%$query%")
                     ->orWhere('id', 'LIKE', "%$query%")
         ->orWhere('name', 'LIKE', "%$query%")
         ->orWhere('category_id', 'LIKE', "%$query%")
         ->orWhere('description', 'LIKE', "%$query%")
         ->orWhere('image', 'LIKE', "%$query%")
         ->orWhere('price', 'LIKE', "%$query%")
         ->orWhere('discount', 'LIKE', "%$query%")
         ->orWhere('status', 'LIKE', "%$query%")
         ->orWhere('created_at', 'LIKE', "%$query%")
         ->orWhere('updated_at', 'LIKE', "%$query%")

            ->paginate(20);
        }
        else
        {
            $records = Product::orderBy('id', 'DESC')->paginate(3);
        }

        //$records=Product::paginate(15);
        return view('admin::product.index', ['records' => $records]);
    }

}

