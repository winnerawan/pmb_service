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
        $html = HtmlDomParser::file_get_html($link, false, null, 0);
        $table = $html->find('table', 0);    
        $data = new \stdClass();
        $data->content = (string) $table;
        echo json_encode($data);

    }

    public function infoMenu() {
        return \App\Info::getMenuInfos();
    }

    public function getCost() {
        $link = "http://pmb.unipma.ac.id/biaya";
        $html = HtmlDomParser::file_get_html($link, false, null, 0);

        $htmlContent = file_get_contents($link);
        $DOM = new \DOMDocument();
        @$DOM->loadHTML($htmlContent);
        $Header = $DOM->getElementsByTagName('tr')->item(0)->getElementsByTagName('td');
        $Detail = $DOM->getElementsByTagName('td');
        foreach($Header as $NodeHeader) {
            $aDataTableHeaderHTML[] = trim($NodeHeader->textContent);
        }
        $i = 0;
        $j = 0;
        foreach($Detail as $sNodeDetail) {
            $aDataTableDetailHTML[$j][] = trim($sNodeDetail->textContent);
            $i = $i + 1;
            $j = $i % count($aDataTableHeaderHTML) == 0 ? $j + 1 : $j;
        }
        array_shift($aDataTableDetailHTML);
        array_pop($aDataTableDetailHTML);
        $costs = array();
        foreach($aDataTableDetailHTML as $x => $cost) {
            $costs[$x]['program_study'] = $cost[1];
            $costs[$x]['biaya_semester'] = $cost[2];
            $costs[$x]['pkkmb'] = $cost[3];
            $costs[$x]['pbi_gel1'] = $cost[4];
            $costs[$x]['pbi_gel2'] = $cost[5];
            $costs[$x]['pbi_gel3'] = $cost[6];
        }
        echo json_encode($costs);
        
    }

    public function getCalendarAcademic() {
        $link = "http://unipma.ac.id/akademik/kalender.php";
        $html = HtmlDomParser::file_get_html($link, false, null, 0);

        $pdf = $html->find('iframe', 0)->src;
        echo json_encode(["pdf" => $pdf]);
    }

    public function getProgramStudy() {
        
        $html = file_get_contents("https://gist.githubusercontent.com/winnerawan/356034cafa8402c385b8a72fcf99defd/raw/4b09a551c9f9bec8fcb5a61a8663c0daf5fb29c4/faculties.json");

        $prodys = json_decode($html, true);

        echo json_encode($prodys);

    }
}
