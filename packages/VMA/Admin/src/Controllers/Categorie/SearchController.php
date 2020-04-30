<?php
namespace VMA\Admin\Controllers\Categorie;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use VMA\Admin\Model\Categorie;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('q');
        if ($query)
        {
            $records = Categorie::where('name', 'LIKE', "%$query%")
                     ->orWhere('id', 'LIKE', "%$query%")
         ->orWhere('name', 'LIKE', "%$query%")
         ->orWhere('user_id', 'LIKE', "%$query%")
         ->orWhere('description', 'LIKE', "%$query%")
         ->orWhere('status', 'LIKE', "%$query%")
         ->orWhere('created_at', 'LIKE', "%$query%")
         ->orWhere('updated_at', 'LIKE', "%$query%")

            ->paginate(3);
        }
        else
        {
            $records = Categorie::orderBy('id', 'DESC')->paginate(3);
        }

        //$records=Categorie::paginate(15);
        return view('admin::categorie.index', ['records' => $records]);
    }

}

