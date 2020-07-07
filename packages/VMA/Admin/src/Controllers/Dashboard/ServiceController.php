<?php

namespace VMA\Admin\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use VMA\Admin\Model\Booking;
use VMA\Admin\Model\Product;

class ServiceController extends Controller
{
    public function index()
    {
        $records = Product::paginate(3);
        return view('admin::dashboard.service', ['total' => self::getTotalProduct(),'booked'=>self::getProductBooked()]);
    }

    public function getTotalProduct()
    {
        $num = Product::all()->count();
        return $num;
    }

    public function getProductBooked()
    {
        $booked = Booking::where('status', '!=', 'canceled')->distinct('product_id')->count();
        return $booked;
    }
}
