<?php
namespace VMA\Admin\Controllers\Zone;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use VMA\Admin\Model\Zone;


class CreateController extends Controller
{

    public function index()
    {
        $zones=Zone::all();
        return view('admin::zone.create',["zones"=>$zones]);

    }

}
