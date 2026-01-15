<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function confirm(ContactRequest $request)
    {
    $inputs = $request->all();
    return view('user.confirm', compact('inputs'));
    }

    public function return(Request $request)
    {
    return redirect('/')->withInput($request->except('_token'));
    }

    public function store(Request $request)
    {
    Contact::create([
        'last_name'   => $request->last_name,
        'first_name'  => $request->first_name,
        'gender'      => $request->gender,
        'email'       => $request->email,
        'tel'         => $request->tel1 . '-' . $request->tel2 . '-' . $request->tel3,
        'address'     => $request->address,
        'building'    => $request->building,
        'category_id' => $request->category,   // ★ここだけ変更（category → category_id）
        'detail'      => $request->detail,
    ]);

    return view('user.thanks');
    }
}