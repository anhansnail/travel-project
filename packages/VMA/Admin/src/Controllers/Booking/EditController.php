<?php
namespace VMA\Admin\Controllers\Booking;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use VMA\Admin\Model\Booking;

class EditController extends Controller
{

    public $booking;

    public function __construct(Booking $booking){
        $this->booking=$booking;
    }

    public function index($id)
    {


        $booking=$this->booking->find($id);
        return view('admin::booking.edit',[
            'booking'=>$booking,
        ]);

    }

}

