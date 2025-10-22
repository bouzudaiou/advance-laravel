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

    // データ編集用ページの表示
    public function edit(Request $request){
        $author = Author::find($request->id);
        return view('edit', ['form' => $author]);
    }

    // データ更新処理
    public function update(Request $request)
    {
        $form = $request->all();
        unset($form['_token']);
        Author::find($request->id)->update($form);
        return redirect('/');
    }

    // データ削除用ページの表示
    public function delete(Request $request)
    {
        $author = Author::find($request->id);
        return view('delete', ['author' => $author]);
    }

    // データ削除処理
    public function remove(Request $request)
    {
        Author::find($request->id)->delete();
        return redirect('/');
    }

// データ検索用ページの表示
public function find()
{
    return view('find', ['input' => '']);
}

// データ検索処理
public function search(Request $request)
{
    $item = Author::where('name', 'LIKE',"%{$request->input}%")->first();
    $param = [
        'input' => $request->input,
        'item' => $item
    ];
    return view('find', $param);
}

// モデル結合ルート
public function bind(Author $author)
{
    $data = [
        'item'=>$author,
    ];
    return view('author.binds', $data);
}

public function relate()
{
    $items = Author::with('books')->get();
    return view('author.index', ['items' => $items]);
}



}
