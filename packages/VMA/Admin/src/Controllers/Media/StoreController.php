<?php
namespace VMA\Admin\Controllers\Media;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use VMA\Admin\Model\Media;

class StoreController extends Controller
{


    public function __construct(){
    }

    public function index(Request $request)
    {
        $this->validate($request, [
            //'name' => 'required|unique:medias|max:255',
        ]);
        $model=new Media();
                $model->id=$request->input("id");
        $model->title=$request->input("title");
        $model->url=$request->input("url");
        $model->code=$request->input("code");
        $model->user_id=$request->input("user_id");
        $model->status=$request->input("status");
        $model->created_at=$request->input("created_at");
        $model->updated_at=$request->input("updated_at");

        $model->save();
        return redirect()->route(
            'media.index'
        )->with('status', 'Data saved!');


    }

}

