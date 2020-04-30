<?php
namespace VMA\Admin\Controllers\Categorie;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use VMA\Admin\Model\Categorie;


class DeleteController extends Controller
{

    public $_categorie;

    public function __construct(Categorie $categorie){
        $this->_categorie=$categorie;
    }

    public function index($id)
    {

        $this->_categorie->find($id)->delete();
        return redirect()->route(
            'categorie.index'
        )->with('status', 'Data deleted!');

    }

}
