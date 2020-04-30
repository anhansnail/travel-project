<?php
namespace VMA\Admin\Controllers\Contact;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use VMA\Admin\Model\Contact;


class CreateController extends Controller
{

    public function index()
    {
        $contact=Contact::all();
        return view('admin::contact.create',["contact"=>$contact]);

    }

}
