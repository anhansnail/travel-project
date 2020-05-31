<?php
namespace VMA\Admin\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use VMA\Admin\Model\Users;


class CreateController extends Controller
{

    public function index()
    {
        $users=Users::all();
        return view('admin::user.create',["users"=>$users]);

    }

}
