<?php
namespace VMA\Admin\Controllers\Contact;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use VMA\Admin\Model\Contact;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('q');
        if ($query)
        {
            $records = Contact::where('name', 'LIKE', "%$query%")
                     ->orWhere('id', 'LIKE', "%$query%")
         ->orWhere('email', 'LIKE', "%$query%")
         ->orWhere('phone', 'LIKE', "%$query%")
         ->orWhere('content', 'LIKE', "%$query%")
         ->orWhere('created_at', 'LIKE', "%$query%")
         ->orWhere('updated_at', 'LIKE', "%$query%")

            ->paginate(3);
        }
        else
        {
            $records = Contact::orderBy('id', 'DESC')->paginate(3);
        }

        //$records=Contact::paginate(15);
        return view('admin::contact.index', ['records' => $records]);
    }

}

