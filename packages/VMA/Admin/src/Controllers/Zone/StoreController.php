<?php
namespace VMA\Admin\Controllers\Zone;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use VMA\Admin\Model\Zone;

class StoreController extends Controller
{


    public function __construct(){
    }

    public function index(Request $request)
    {
        $this->validate($request, [
            //'name' => 'required|unique:zones|max:255',
        ]);
        $model=new Zone();
                $model->id=$request->input("id");
        $model->name=$request->input("name");
        $model->description=$request->input("description");
        $model->user_id=$request->input("user_id");
        $model->zone_parent_id=$request->input("zone_parent_id");
        $model->status=$request->input("status");
        $model->created_at=$request->input("created_at");
        $model->updated_at=$request->input("updated_at");

        $model->save();
        return redirect()->route(
            'zone.index'
        )->with('status', 'Data saved!');


    }

}

