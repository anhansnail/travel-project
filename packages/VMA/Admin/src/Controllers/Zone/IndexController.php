<?php
namespace VMA\Admin\Controllers\Zone;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use VMA\Admin\Model\Zone;

class IndexController extends Controller
{
    public function index()
    {
        $records=Zone::paginate(3);
        return view('admin::zone.index', ['records' => $records]);
    }

}
