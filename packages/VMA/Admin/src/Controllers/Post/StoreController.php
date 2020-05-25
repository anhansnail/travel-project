<?php
namespace VMA\Admin\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use VMA\Admin\Model\Post;
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
            //'name' => 'required|unique:posts|max:255',
        ]);
        $model=new Post();
        $model->title=$request->input("title",'');
        $model->content=$request->input("content",'');
        $model->user_id=Auth::id();
        $model->status=$request->input("status",'open');

        $dataCreate = $request->except('_token','image');
        if ($request->hasFile('image')) {
            $avatar_name = $this->__commonService->uploadImage( $request->file('image',PATH_PRODUCT));
            $model->image = $avatar_name;
        }
        $model->save();
        return redirect()->route(
            'post.index'
        )->with('status', 'Data saved!');


    }

}

