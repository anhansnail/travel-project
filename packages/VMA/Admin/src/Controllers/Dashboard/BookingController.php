<?php

namespace VMA\Admin\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use VMA\Admin\Model\Booking;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        return view('admin::dashboard.booking', ['total' => self::getTotalBooking(),'confirmed'=>self::getTotalConfirmed(),'canceled'=>self::getTotalCanceled()]);
    }

    public function getTotalBooking()
    {
        return Booking::where('status', '!=', 'canceled')->get()->count();
    }

    public function getTotalConfirmed()
    {
        return Booking::where('status', '=', 'confirmed')->get()->count();

    }

    public function getTotalCanceled()
    {
        return Booking::where('status', '=', 'canceled')->get()->count();

    }
}
