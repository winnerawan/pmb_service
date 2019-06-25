<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Process extends Model
{
    
    public static function insertPMDK() {
        DB::select('INSERT INTO ');
    }

    public static function generateTahunMini() {
        $sqltahun = DB::select('SELECT * FROM `tahun` where flag=1');
        $thnaktif = $sqltahun[0]->thn;
        $tahunmini = substr($thnaktif,2,2);
        return $tahunmini;
    }

    public static function generateNoReg($thnmini) {
        $check = '%UPM'.$thnmini.'%';
        $kode1 = DB::select('select max(no_reg) as KODE1 from mahasiswa where no_reg LIKE ?', [$check]);
        $id_kode1= $kode1[0]->KODE1;
        $urut1= substr($id_kode1, 5,8);
        $urut1++;
        if($urut1 == ''){$urut1 = 1;}
        $id_baru1="UPM".$thnmini.sprintf("%04s", $urut1); 
        return response()->json(['error' => false, 'no_reg' => $id_baru1]);
    }

    public static function generateRegistrationNumber($thnmini) {
        $check = '%UPM'.$thnmini.'%';
        $kode1 = DB::select('select max(no_reg) as KODE1 from mahasiswa where no_reg LIKE ?', [$check]);
        $id_kode1= $kode1[0]->KODE1;
        $urut1= substr($id_kode1, 5,8);
        $urut1++;
        if($urut1 == ''){$urut1 = 1;}
        $id_baru1="UPM".$thnmini.sprintf("%04s", $urut1); 
        return $id_baru1;
    }
}
