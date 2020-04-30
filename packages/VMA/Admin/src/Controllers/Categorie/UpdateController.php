<?php
namespace VMA\Admin\Controllers\Categorie;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use VMA\Admin\Model\Categorie;

class UpdateController extends Controller
{

    public $_categorie;

    public function __construct(Categorie $categorie){
        $this->_categorie=$categorie;
    }

    public function index(Request $request)
    {
        /*$this->validate($request, [
            'email' => 'required|unique:users|max:255',
        ]);*/
        $id=$request->input('id');
        $model=$this->_categorie->find($id);
                $model->id=$request->input("id");
        $model->name=$request->input("name");
        $model->user_id=$request->input("user_id");
        $model->description=$request->input("description");
        $model->status=$request->input("status");
        $model->created_at=$request->input("created_at");
        $model->updated_at=$request->input("updated_at");

        $model->save();
        return redirect()->route(
            'categorie.index'
        )->with('status', 'Data updated!');

    }

}

