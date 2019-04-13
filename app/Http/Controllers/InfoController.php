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
        $link = $request['link'];
        $html = HtmlDomParser::file_get_html($link, false, null, 0);
        $content = $html->find('.page-content', 0);
        $data = new \stdClass();
        $data->content = (string) $content;
        echo json_encode($data);
    }

    public function track(Request $request) {
        $link = $request['link'];
        $html = HtmlDomParser::file_get_html($link, false, null, 0);
        $content = $html->find('.page-content', 0);
        $data = new \stdClass();
        $data->content = (string) $content;
        echo json_encode($data);
    }

    public function cost(Request $request) {
        $link = $request['link'];
//var_dump($request['link']);
        $html = HtmlDomParser::file_get_html($link, false, null, 0);
        $table = $html->find('table', 0);    
        $data = new \stdClass();
        $css = array("<link rel='stylesheet' href='http://pmb.unipma.ac.id/asset/css/bootstrap.min.css'");
        $data->content = (string) $table;
        echo json_encode($data);

    }
}
