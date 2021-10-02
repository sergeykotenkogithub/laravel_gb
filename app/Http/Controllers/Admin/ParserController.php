<?php

namespace App\Http\Controllers\Admin;

use App\Contract\Parser;
use App\Http\Controllers\Controller;
use App\Services\ParserService;
use Illuminate\Http\Request;

class ParserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Parser $service)
    {
        dd($service->parse('https://news.yandex.ru/music.rss'));
    }
}
