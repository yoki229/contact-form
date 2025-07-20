<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    //お問い合わせフォームを呼び出し
    public function index(){
        return view('index');
    }

    //送信ボタンを押したとき、送信した情報を次のページに渡す
    public function confirm(ContactRequest $request){
        $contact = $request->only(['name','email','tel','content']);
        return view('confirm',['contact' => $contact]);
    }

    //confirm.blade.php⇒web.php⇒送られてきた情報をモデルを通して保存し次のページを呼び出す
    public function store(ContactRequest $request){
        $contact = $request->only('name','email','tel','content');
        Contact::create($contact);  //createで変数に格納されたデータを作成する
        return view('thanks');
    }

}
