<?php
namespace VMA\Admin\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use VMA\Admin\Model\Users;

class EditController extends Controller
{

    public $user;

    public function __construct(Users $user){
        $this->user=$user;
    }

    public function index($id)
    {


        $user=$this->user->find($id);
        return view('admin::user.edit',[
            'user'=>$user,
        ]);

    }

}

