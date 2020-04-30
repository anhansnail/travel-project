<?php
namespace VMA\Admin\Controllers\Zone;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use VMA\Admin\Model\Zone;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('q');
        if ($query)
        {
            $records = Zone::where('name', 'LIKE', "%$query%")
                     ->orWhere('id', 'LIKE', "%$query%")
         ->orWhere('name', 'LIKE', "%$query%")
         ->orWhere('description', 'LIKE', "%$query%")
         ->orWhere('user_id', 'LIKE', "%$query%")
         ->orWhere('zone_parent_id', 'LIKE', "%$query%")
         ->orWhere('status', 'LIKE', "%$query%")
         ->orWhere('created_at', 'LIKE', "%$query%")
         ->orWhere('updated_at', 'LIKE', "%$query%")

            ->paginate(3);
        }
        else
        {
            $records = Zone::orderBy('id', 'DESC')->paginate(3);
        }

        //$records=Zone::paginate(15);
        return view('admin::zone.index', ['records' => $records]);
    }

}

