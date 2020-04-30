<?php

namespace VMA\Client\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use VMA\Client\Helper;
use VMA\User\Model\User;

class HomeController extends Controller
{

    public $_user;

    public function __construct(User $user)
    {
        $this->_user = $user;
    }

    public function index()
    {
        // login xong mà chưa xác thực email luôn phải show ra màn hình yêu cầu check mail để xác thực email trước khi sử dụng
        return view('client::home');
    }

}
