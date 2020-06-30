<?php
namespace VMA\Admin\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use VMA\Admin\Model\Product;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('q');
        if ($query)
        {
            $records = product::where('name', 'like', "%$query%")->orwhere('id', 'like', "%$query%")
         ->orwhere('name', 'like', "%$query%")
         ->orwhere('category_id', 'like', "%$query%")
         ->orwhere('description', 'like', "%$query%")
         ->orwhere('image', 'like', "%$query%")
         ->orwhere('price', 'like', "%$query%")
         ->orwhere('discount', 'like', "%$query%")
         ->orwhere('status', 'like', "%$query%")
         ->orwhere('created_at', 'like', "%$query%")
         ->orwhere('updated_at', 'like', "%$query%")

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

