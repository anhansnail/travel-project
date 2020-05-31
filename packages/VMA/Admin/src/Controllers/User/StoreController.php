<?php
namespace VMA\Admin\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use VMA\Admin\Model\Users;

class StoreController extends Controller
{


    public function __construct(){
    }

    public function index(Request $request)
    {
        $this->validate($request, [
            //'name' => 'required|unique:users|max:255',
        ]);
        $model=new User();
                $model->id=$request->input("id");
        $model->name=$request->input("name");
        $model->role_id=$request->input("role_id");
        $model->email=$request->input("email");
        $model->password=$request->input("password");
        $model->facebook_id=$request->input("facebook_id");
        $model->facebook_token=$request->input("facebook_token");
        $model->facebook_token_expire_time=$request->input("facebook_token_expire_time");
        $model->avatar=$request->input("avatar");
        $model->parent_id=$request->input("parent_id");
        $model->status=$request->input("status");
        $model->remember_token=$request->input("remember_token");
        $model->created_at=$request->input("created_at");
        $model->updated_at=$request->input("updated_at");

        $model->save();
        return redirect()->route(
            'user.index'
        )->with('status', 'Data saved!');


    }

}

