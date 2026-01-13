<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $query = Contact::query();

        // keyword（姓・名・メール・内容をまとめて検索）
        if ($request->filled('keyword')) {
            $keyword = $request->keyword;
            $query->where(function ($q) use ($keyword) {
                $q->where('last_name', 'like', "%{$keyword}%")
                  ->orWhere('first_name', 'like', "%{$keyword}%")
                  ->orWhere('email', 'like', "%{$keyword}%")
                  ->orWhere('detail', 'like', "%{$keyword}%");
            });
        }

        // gender（1/2/3）
        if ($request->filled('gender')) {
            $query->where('gender', $request->gender);
        }

        // 日付（created_at）
        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }
        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        // 並び順（新しい順）＋ ページネーション（条件維持）
        $contacts = $query->orderBy('created_at', 'desc')
                          ->paginate(8)
                          ->appends($request->query());

        return view('admin.contacts.admin', compact('contacts'));
    }
}
