<?php
namespace VMA\Admin\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use VMA\Admin\Model\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $records=Contact::paginate(3);
        return view('admin::dashboard.contact', ['total' => self::getTotalContact(), 'guest'=>self::getTotalGuest()]);
    }

    public function getTotalContact(){
        return Contact::all()->count();
    }
    public function getTotalGuest(){
        return Contact::distinct('email')->count();
    }
    public function getMostDonate(){

    }
}
