<?php

namespace VMA\Client\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use VMA\Client\Helper;
use VMA\Admin\Model\Contact;

class ContactController extends Controller
{

    public $_user;

    public function __construct()
    {
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
        $model->created_at=$request->input("created_at");
        $model->updated_at=$request->input("updated_at");

        $model->save();
        return redirect()->route(
            'client.contact'
        )->with('status', 'Data saved!');


    }


}
