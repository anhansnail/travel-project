<?php
namespace VMA\Admin\Controllers\Media;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use VMA\Admin\Model\Media;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('q');
        if ($query)
        {
            $records = Media::where('name', 'LIKE', "%$query%")
                     ->orWhere('id', 'LIKE', "%$query%")
         ->orWhere('title', 'LIKE', "%$query%")
         ->orWhere('url', 'LIKE', "%$query%")
         ->orWhere('code', 'LIKE', "%$query%")
         ->orWhere('user_id', 'LIKE', "%$query%")
         ->orWhere('status', 'LIKE', "%$query%")
         ->orWhere('created_at', 'LIKE', "%$query%")
         ->orWhere('updated_at', 'LIKE', "%$query%")

            ->paginate(3);
        }
        else
        {
            $records = Media::orderBy('id', 'DESC')->paginate(3);
        }

        //$records=Media::paginate(15);
        return view('admin::media.index', ['records' => $records]);
    }

}

