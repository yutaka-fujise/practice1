<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;

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
}