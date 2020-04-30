<?php
namespace VMA\Admin\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use VMA\Admin\Model\Product;

class EditController extends Controller
{

    public $product;

    public function __construct(Product $product){
        $this->product=$product;
    }

    public function index($id)
    {


        $product=$this->product->find($id);
        return view('admin::product.edit',[
            'product'=>$product,
        ]);

    }

}

