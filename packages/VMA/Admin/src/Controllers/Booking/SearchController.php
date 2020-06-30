<?php
namespace VMA\Admin\Controllers\Booking;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use VMA\Admin\Model\Booking;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('q');
        if ($query)
        {
            $records = Booking::where('name', 'LIKE', "%$query%")->orWhere('id', 'LIKE', "%$query%")
         ->orWhere('product_id', 'LIKE', "%$query%")
         ->orWhere('customer_name', 'LIKE', "%$query%")
         ->orWhere('customer_email', 'LIKE', "%$query%")
         ->orWhere('customer_phone', 'LIKE', "%$query%")
         ->orWhere('people', 'LIKE', "%$query%")
         ->orWhere('note', 'LIKE', "%$query%")
         ->orWhere('status', 'LIKE', "%$query%")
         ->orWhere('created_at', 'LIKE', "%$query%")
         ->orWhere('updated_at', 'LIKE', "%$query%")

            ->paginate(3);
        }
        else
        {
            $records = Booking::orderBy('id', 'DESC')->paginate(3);
        }

        //$records=Booking::paginate(15);
        return view('admin::booking.index', ['records' => $records]);
    }

}

