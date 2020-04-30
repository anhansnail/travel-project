<?php
namespace VMA\Admin\Controllers\Contact;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use VMA\Admin\Model\Contact;


class DeleteController extends Controller
{

    public $_contact;

    public function __construct(Contact $contact){
        $this->_contact=$contact;
    }

    public function index($id)
    {

        $this->_contact->find($id)->delete();
        return redirect()->route(
            'contact.index'
        )->with('status', 'Data deleted!');

    }

}
