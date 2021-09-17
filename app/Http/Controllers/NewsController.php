<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    // выводит все новости
    public function index()
    {
        return view('news.index',  [
            'newsList' => $this->getNews()
        ]);
    }

    // отобразить конкретную новость
    public function show(int $id)
    {
        return view('news.show', [
            'id' => $id
        ]);
    }

    public function store(Request $request)
    {
//        $request->validate([
//            'title' => ['required', 'string', 'min:3']
//        ]);
        dd($request->all());
//        return redirect()->route('admin.news.index');
    }
}
