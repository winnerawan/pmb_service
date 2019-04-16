<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sunra\PhpSimple\HtmlDomParser;

class NewsController extends Controller
{
    public function index() {
        return response()->json(\App\News::take(4)->orderBy('tanggal', 'DESC')->get());
    }

    public function root() {
        $x = new \stdClass();
        $x->error = true;
        $x->message = "Congratulations! You have found an empty page! Go celebrate this great discovery by sending the admin a coffee";
        return response()->json($x);
    }

    public function news() {
        
        $data[] = array();
        $link = "http://unipma.ac.id";
        $html = HtmlDomParser::file_get_html($link, false, null, 0);
        foreach($html->find('.img-thumbnail') as $i => $a0){
            $style = $a0->style;
            preg_match('/\(([^)]+)\)/', $style, $match);
            $data[$i]['image'] = str_replace("'", "", $match[1]);
            foreach($html->find('.portfolio-details a > h5') as $i => $item) {
                $data[$i]['title'] = $item->innertext;
                foreach($html->find('.portfolio-details a > a') as $x => $l) {
                    $data[$x]['link'] = "http://unipma.ac.id/" . $l->href;
                } 
            }
        }
        $i=0;
        foreach($data as $element) {
        if(sizeof($element)<=1){
                unset($data[$i]);
            }
            $i++;
        }
        echo json_encode($data);
    }

    public function newsDetail(Request $request) {
        $link = $request['link'];
        $html = HtmlDomParser::file_get_html($link, false, null, 0);
        $detail = new \stdClass();
        $penulis = $html->find('.post-content ul > li');
        $teks = array();
        $detail->writter = trim($penulis[0]);
        $detail->date = trim($penulis[1]);
        $detail->first = $html->find('.post-content > p', 0)->innertext;
        $pp = $html->find('.post-content > p');
        foreach($pp as $p) {
            $teks[] = $p->innertext;

        }
        $text = array_shift($teks);
        $detail->center = implode(" ", $teks);

        $detail->image = $html->find('.post-head > img', 0)->src;
        $detail->link = $link;
        echo json_encode($detail);
    }
}
