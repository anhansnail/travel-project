<?php
namespace VMA\Admin\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use VMA\Admin\Model\Product;


class DeleteController extends Controller
{

    public $_product;

    public function __construct(Product $product){
        $this->_product=$product;
    }

    public function index($id)
    {

        $this->_product->find($id)->delete();
        return redirect()->route(
            'product.index'
        )->with('status', 'Data deleted!');

    }

}
