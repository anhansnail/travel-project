<?php
namespace VMA\Admin\Controllers\Contact;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use VMA\Admin\Model\Contact;

class StoreController extends Controller
{


    public function __construct(){
    }

    public function index(Request $request)
    {
        $this->validate($request, [
            //'name' => 'required|unique:contact|max:255',
        ]);
        $model=new Contact();
                $model->id=$request->input("id");
        $model->email=$request->input("email");
        $model->phone=$request->input("phone");
        $model->content=$request->input("content");
        $model->created_at=$request->input("created_at");
        $model->updated_at=$request->input("updated_at");

        $model->save();
        return redirect()->route(
            'contact.index'
        )->with('status', 'Data saved!');


    }

}

