<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sunra\PhpSimple\HtmlDomParser;
use Goutte;

class InfoController extends Controller
{
    public function index() {

        return response()->json([
            'Jalur',
            'Jadwal'
        ]);
    }

    public function infoBiaya() {
        $link = "http://pmb.unipma.ac.id/biaya";
        $html = HtmlDomParser::file_get_html($link);
        $table = $html->find('table', 0);    
        
        echo $table;

    }
}
