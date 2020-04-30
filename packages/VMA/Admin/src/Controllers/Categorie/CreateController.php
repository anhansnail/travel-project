<?php
namespace VMA\Admin\Controllers\Categorie;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use VMA\Admin\Model\Categorie;


class CreateController extends Controller
{

    public function index()
    {
        $categories=Categorie::all();
        return view('admin::categorie.create',["categories"=>$categories]);

    }

}
