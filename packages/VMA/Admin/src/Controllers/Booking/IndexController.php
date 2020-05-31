<?php
namespace VMA\Admin\Controllers\Booking;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use VMA\Admin\Model\Booking;

class IndexController extends Controller
{
    public function index()
    {
        $records=Booking::paginate(3);
        return view('admin::booking.index', ['records' => $records]);
    }

}
