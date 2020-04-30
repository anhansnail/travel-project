<?php
namespace VMA\Admin\Controllers\Categorie;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use VMA\Admin\Model\Categorie;

class EditController extends Controller
{

    public $categorie;

    public function __construct(Categorie $categorie){
        $this->categorie=$categorie;
    }

    public function index($id)
    {


        $categorie=$this->categorie->find($id);
        return view('admin::categorie.edit',[
            'categorie'=>$categorie,
        ]);

    }

}

