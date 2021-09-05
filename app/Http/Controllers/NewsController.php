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
}
