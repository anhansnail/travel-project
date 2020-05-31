<?php
namespace VMA\Admin\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use VMA\Admin\Model\User;


class DeleteController extends Controller
{

    public $_user;

    public function __construct(Users $user){
        $this->_user=$user;
    }

    public function index($id)
    {

        $this->_user->find($id)->delete();
        return redirect()->route(
            'user.index'
        )->with('status', 'Data deleted!');

    }

}
