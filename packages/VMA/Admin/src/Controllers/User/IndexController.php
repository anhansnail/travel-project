<?php
namespace VMA\Admin\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use VMA\Admin\Model\Users;

class IndexController extends Controller
{
    public function index()
    {
        $records=Users::where('role_id','3')->paginate(3);
        return view('admin::user.index', ['records' => $records]);
    }

}
