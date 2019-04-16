<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class LoginController extends Controller
{
    public function login(Request $request) {
        $table_1 = "bayar_online";
        $table_2 = "bayar_manual";
        $username = $request['username'];
        $password = $request['password'];
        $query = "SELECT username, password, status
                    FROM bayar_online
                    WHERE username='$username' AND password='$password' 
                    UNION 
                    SELECT username, password, status
                    FROM bayar_manual 
                    WHERE username='$username' AND password='$password'";

        $sql = DB::select($query);   
        $info = new \stdClass();
        // var_dump($sql);
        if (sizeof($sql)>=0) {
            // $info['status'] = $sql['status'];
            echo json_encode(array("error" => false, "message" => "Successfuly Login", "info" => $sql[0]));
        } else {
            echo json_encode(array("error" => true, "message" => "Wrong Authentication"));
        }
    }
}
