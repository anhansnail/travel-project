<?php
namespace VMA\Admin\Controllers\Booking;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use VMA\Admin\Model\Booking;

class UpdateController extends Controller
{

    public $_booking;

    public function __construct(Booking $booking){
        $this->_booking=$booking;
    }

    public function index(Request $request)
    {
        /*$this->validate($request, [
            'email' => 'required|unique:users|max:255',
        ]);*/
        $id=$request->input('id');
        $model=$this->_booking->find($id);
                $model->id=$request->input("id");
        $model->product_id=$request->input("product_id");
        $model->customer_name=$request->input("customer_name");
        $model->customer_email=$request->input("customer_email");
        $model->customer_phone=$request->input("customer_phone");
        $model->people=$request->input("people");
        $model->note=$request->input("note");
        $model->status=$request->input("status");
        $model->created_at=$request->input("created_at");
        $model->updated_at=$request->input("updated_at");

        $model->save();
        return redirect()->route(
            'booking.index'
        )->with('status', 'Data updated!');

    }

}

