<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index() {
        return response()->json([\App\News::take(4)->orderBy('tanggal', 'DESC')->get()]);
    }
}
