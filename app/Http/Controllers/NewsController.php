<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
