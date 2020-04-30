<?php
namespace VMA\Admin\Controllers\Contact;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use VMA\Admin\Model\Contact;

class EditController extends Controller
{

    public $contact;

    public function __construct(Contact $contact){
        $this->contact=$contact;
    }

    public function index($id)
    {


        $contact=$this->contact->find($id);
        return view('admin::contact.edit',[
            'contact'=>$contact,
        ]);

    }

}

