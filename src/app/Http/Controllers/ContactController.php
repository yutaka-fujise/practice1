<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    // 入力画面
    public function index()
    {
    $categories = collect([
        (object)['id' => 1, 'content' => '商品の交換について'],
        (object)['id' => 2, 'content' => '不具合について'],
    ]);

    return view('user.index', compact('categories'));
    }

    // 確認画面
    public function confirm(Request $request)
    {
        $inputs = $request->all();
        return view('user.confirm', compact('inputs'));
    }

    // 送信処理 → サンクス
    public function store(Request $request)
    {
        // ※ 今はDB保存まだしない
        return view('user.thanks');
    }
}
