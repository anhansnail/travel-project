<?php

namespace VMA\Admin\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use VMA\Admin\Model\Product;
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
            //'name' => 'required|unique:products|max:255',
        ]);
        $model = new Product();
        $model->name = $request->input("name");
        $model->category_id = $request->input("category_id");
        $model->user_id = Auth::id();
        $model->description = $request->input("description");
//        $model->image=$request->input("image");
        $model->price = $request->input("price");
        $model->discount = $request->input("discount");
        $model->status = $request->input("status");
        $model->created_at = $request->input("created_at");
        $model->updated_at = $request->input("updated_at");
        $dataCreate = $request->except('_token','image');
        if ($request->hasFile('image')) {
                $avatar_name = $this->__commonService->uploadImage( $request->file('image',PATH_PRODUCT));
            $model->image = $avatar_name;
        }
        $model->save();
        return redirect()->route(
            'product.index'
        )->with('status', 'Data saved!');


    }

}

