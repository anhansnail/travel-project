<?php
namespace VMA\Admin\Controllers\Categorie;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use VMA\Admin\Model\Categorie;
use VMA\Admin\Services\CommonService;


class StoreController extends Controller
{


    public $__commonService;

    public function __construct(CommonService $commonService)
    {
        $this->__commonService = $commonService;
    }

    public function index(Request $request)
    {
        $this->validate($request, [
            //'name' => 'required|unique:categories|max:255',
        ]);
        $model=new Categorie();
                $model->id=$request->input("id");
        $model->name=$request->input("name");
        $model->user_id=$request->input("user_id");
        $model->description=$request->input("description");
        $model->status=$request->input("status");
        $model->created_at=$request->input("created_at");
        $model->updated_at=$request->input("updated_at");
        $dataCreate = $request->except('_token','image');
        $model->save();
        return redirect()->route(
            'categorie.index'
        )->with('status', 'Data saved!');


    }

}

