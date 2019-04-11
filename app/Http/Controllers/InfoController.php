<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sunra\PhpSimple\HtmlDomParser;
use Goutte;

class InfoController extends Controller
{
    public function index() {
        return \App\Info::getInfos();
    }

    public function schedule(Request $request) {
        $link = $request->link;
        $html = HtmlDomParser::file_get_html($link, false, null, 0);
        $content = $html->find('page-content', 0);
        echo $content;
    }

    public function track(Request $request) {
        $link = $request->link;
        $html = HtmlDomParser::file_get_html($link, false, null, 0);
        $content = $html->find('page-content', 0);
        echo $content;
    }

    public function cost(Request $request) {
        $link = $request->link;
        $html = HtmlDomParser::file_get_html($link, false, null, 0);
        $table = $html->find('table', 0);    
        echo $table;

    }
}
