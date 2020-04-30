<?php
namespace VMA\Admin\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use VMA\Admin\Model\Product;

class UpdateController extends Controller
{

    public $_product;

    public function __construct(Product $product){
        $this->_product=$product;
    }

    public function index(Request $request)
    {
        /*$this->validate($request, [
            'email' => 'required|unique:users|max:255',
        ]);*/
        $id=$request->input('id');
        $model=$this->_product->find($id);
                $model->id=$request->input("id");
        $model->name=$request->input("name");
        $model->category_id=$request->input("category_id");
        $model->description=$request->input("description");
        $model->image=$request->input("image");
        $model->price=$request->input("price");
        $model->discount=$request->input("discount");
        $model->status=$request->input("status");
        $model->created_at=$request->input("created_at");
        $model->updated_at=$request->input("updated_at");

        $model->save();
        return redirect()->route(
            'product.index'
        )->with('status', 'Data updated!');

    }

}

