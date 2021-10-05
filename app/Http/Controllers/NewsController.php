<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    // выводит все новости
    public function index()
    {
        return view('news.index',  [
            'newsList' => News::paginate(
                config('news.paginate')
            )
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

        dd($request->all());
//        return redirect()->route('admin.news.index');

//
//        $news = News::create(
//            $request->only(['category_id' ,'title', 'author', 'description'])
//        );
//        if($news ) {
//            return redirect()->route('admin.news.index')->
//            with('success', 'Запись успешно добавлена');
//        }
//
//        return back()->with('error', 'Запись не добавлена')->withInput();
    }
}
