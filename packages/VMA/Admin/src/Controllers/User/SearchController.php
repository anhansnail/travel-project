<?php

namespace VMA\Admin\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use VMA\Admin\Model\Users;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('q');
        if ($query) {
            $records = Users::where('role_id', '3')->where( function ($querys) use ($query) {
                $querys->where('name', 'LIKE', "%$query%")
                    ->orWhere('id', 'LIKE', "%$query%")
                    ->orWhere('name', 'LIKE', "%$query%")
                    ->orWhere('role_id', 'LIKE', "%$query%")
                    ->orWhere('email', 'LIKE', "%$query%")
                    ->orWhere('password', 'LIKE', "%$query%")
                    ->orWhere('facebook_id', 'LIKE', "%$query%")
                    ->orWhere('facebook_token', 'LIKE', "%$query%")
                    ->orWhere('facebook_token_expire_time', 'LIKE', "%$query%")
                    ->orWhere('avatar', 'LIKE', "%$query%")
                    ->orWhere('parent_id', 'LIKE', "%$query%")
                    ->orWhere('status', 'LIKE', "%$query%")
                    ->orWhere('remember_token', 'LIKE', "%$query%")
                    ->orWhere('created_at', 'LIKE', "%$query%")
                    ->orWhere('updated_at', 'LIKE', "%$query%");
            })
                ->paginate(3);
        } else {
            $records = Users::orderBy('id', 'DESC')->paginate(3);
        }

        //$records=User::paginate(15);
        return view('admin::user.index', ['records' => $records]);
    }

}

