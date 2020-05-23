<?php

namespace VMA\Client\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use VMA\Admin\Model\Contact;
use VMA\Admin\Services\CommonService;
use VMA\Client\Helper;

class ContactController extends Controller
{

    public $__user;
    public $__commonService;

    public function __construct(CommonService $commonService)
    {
        $this->__commonService = $commonService;
    }

    public function index()
    {
        // login xong mà chưa xác thực email luôn phải show ra màn hình yêu cầu check mail để xác thực email trước khi sử dụng
        return view('client::contact');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            //'name' => 'required|unique:posts|max:255',
        ]);
        $model=new Contact();
        $model->name=$request->input("name");
        $model->email=$request->input("email");
        $model->phone=$request->input("phone");
        $model->subject=$request->input("subject");
        $model->content=$request->input("content");
        $send = $this->__commonService->sendMailContact(
            $request->input("email"),
            $request->input("name"),
            'client::mail.mail_contact',
            'client.contact',
            'Contact Mail');
        $contact = $model->save();

            return redirect()->route(
                'client.contact'
            )->with('status', 'Data saved!');

    }


}
