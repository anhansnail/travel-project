<?php
namespace VMA\Admin\Controllers\Contact;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use VMA\Admin\Model\Contact;

class IndexController extends Controller
{
    public function index()
    {
        $records=Contact::paginate(20);
        return view('admin::contact.index', ['records' => $records]);
    }

}
