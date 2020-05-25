<?php
namespace VMA\Admin\Controllers\Media;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use VMA\Admin\Model\Media;
use VMA\Admin\Services\CommonService;

class StoreController extends Controller
{
    public $__commonService;

    public function __construct(CommonService $commonService){
        $this->__commonService = $commonService;
    }

    public function index(Request $request)
    {
        $this->validate($request, [
            //'name' => 'required|unique:medias|max:255',
        ]);
        $model=new Media();
        $model->title=$request->input("title",'');
        $model->code=$request->input("code",'');
        $model->user_id=Auth::id();
        $model->status=$request->input("status",'open');
        $dataCreate = $request->except('_token','url');

        if ($request->hasFile('url')) {
            $avatar_name = $this->__commonService->uploadMedia( $request->file('url',PATH_MEDIA_SLIDE));
            $model->url = $avatar_name;
        }
        $model->save();
        return redirect()->route(
            'media.index'
        )->with('status', 'Data saved!');


    }

}

