<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;

    class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();
        return view('index', ['authors' => $authors]);
    }
    
// データ追加用ページの表示
    public function add()
    {
       return view('add');
    }

    // データ追加処理
    public function create(Request $request)
    {
    $form = $request->all();
    Author::create($form);
    return redirect('/');
    }


}
