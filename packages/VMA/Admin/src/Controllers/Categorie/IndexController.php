<?php
namespace VMA\Admin\Controllers\Categorie;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use VMA\Admin\Model\Categorie;

class IndexController extends Controller
{
    public function index()
    {
        $records=Categorie::paginate(3);
        return view('admin::categorie.index', ['records' => $records]);
    }

}
