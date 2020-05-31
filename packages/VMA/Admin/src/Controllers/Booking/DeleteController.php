<?php
namespace VMA\Admin\Controllers\Booking;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use VMA\Admin\Model\Booking;


class DeleteController extends Controller
{

    public $_booking;

    public function __construct(Booking $booking){
        $this->_booking=$booking;
    }

    public function index($id)
    {

        $this->_booking->find($id)->delete();
        return redirect()->route(
            'booking.index'
        )->with('status', 'Data deleted!');

    }

}
