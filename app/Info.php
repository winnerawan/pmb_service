<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    protected $table = "info";

    public static function getInfos() {
        
        $infos = 
                array(
                    array(
                        "id" => 1,
                        "title" => "Jadwal",
                        "url" => "http://pmb.unipma.ac.id/jadwal"
                    ),
                    array(
                        "id" => 2,
                        "title" => "Jalur",
                        "url" => "http://pmb.unipma.ac.id/jalur"
                    ),
                    array(
                        "id" => 3,
                        "title" => "Biaya",
                        "url" => "http://pmb.unipma.ac.id/biaya"
                    ),
                    array(
                        "id" => 4,
                        "title" => "Program Study",
                        "url" => "http://pmb.unipma.ac.id/prody"
                    )
                );
        
        return $infos;
    }
}
