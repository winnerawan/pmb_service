<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sunra\PhpSimple\HtmlDomParser;

use Goutte;

class SearchController extends Controller
{
    public function search(Request $request) {
        $key = $request['key'];
        $link = "http://pmb.unipma.ac.id/proses_cari_ajax.php?searching=".$key;
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
        $students = array();
        foreach($aDataTableDetailHTML as $i => $s) {
            $students[$i]['no_reg'] = $s[1];
            $students[$i]['name'] = $s[2];
            $students[$i]['study'] = $s[3];
            $students[$i]['base64'] = md5($s[1]);
        }
        // echo json_encode($students);
        return response()->json($students);
    }
}
