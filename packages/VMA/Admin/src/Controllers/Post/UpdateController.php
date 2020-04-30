<?php
namespace VMA\Admin\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use VMA\Admin\Model\Post;

class UpdateController extends Controller
{

    public $_post;

    public function __construct(Post $post){
        $this->_post=$post;
    }

    public function index(Request $request)
    {
        /*$this->validate($request, [
            'email' => 'required|unique:users|max:255',
        ]);*/
        $id=$request->input('id');
        $model=$this->_post->find($id);
                $model->id=$request->input("id");
        $model->title=$request->input("title");
        $model->content=$request->input("content");
        $model->image=$request->input("image");
        $model->user_id=$request->input("user_id");
        $model->status=$request->input("status");
        $model->created_at=$request->input("created_at");
        $model->updated_at=$request->input("updated_at");

        $model->save();
        return redirect()->route(
            'post.index'
        )->with('status', 'Data updated!');

    }

}

