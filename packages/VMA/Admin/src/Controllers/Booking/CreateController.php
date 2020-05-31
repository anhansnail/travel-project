<?php
namespace VMA\Admin\Controllers\Booking;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use VMA\Admin\Model\Booking;


class CreateController extends Controller
{

    public function index()
    {
        $bookings=Booking::all();
        return view('admin::booking.create',["bookings"=>$bookings]);

    }

}
