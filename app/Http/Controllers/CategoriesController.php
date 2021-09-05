<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function categories()
    {
        return view('news.categories', [
            'categories' => $this->category
        ]);
    }
    public function item($category)
    {
        return view('news.index', [
            'newsList' => $this->getNum($category)
        ]);
    }
}
