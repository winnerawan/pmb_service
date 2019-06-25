<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ProcessController extends Controller
{

    public function getYears() {
        $thn = date('Y');
        $year = array();
        for ($i=0; $i<26; $i++) {
            $year[] = array('year' => (int) $thn - $i);
        }
        return response()->json(['error' => false, 'years' => $year]);
    }

    public function trackChoice() {
        $tracks = array(
            [
                'id' => 1,
                'name' => 'PMDK'
            ],
            [
                'id' => 2,
                'name' => 'PNUAN'
            ],
            [
                'id' => 3,
                'name' => 'TES'
            ]
            );

        return response()->json(['error' => false, 'tracks' => $tracks]);   
    }

    /**
     * Isi nilai raport di tabel jalur_pmdk 
     */
    public function insertPMDK(Request $request) {
        $no_reg = \App\Process::generateNoReg(\App\Process::generateTahunMini());
        $bind = $request->bind;
        $bind1 = $request->bind1;
        $bind2 = $request->bind2;
        $bind3 = $request->bind3;
        $bind4 = $request->bind4;
        $bind5 = $request->bind5;

        $bing = $request->bing;
        $bing1 = $request->bing1;
        $bing2 = $request->bing2;
        $bing3 = $request->bing3;
        $bing4 = $request->bing4;
        $bing5 = $request->bing5;

        $mat = $request->mat;
        $mat1 = $request->mat1;
        $mat2 = $request->mat2;
        $mat3 = $request->mat3;
        $mat4 = $request->mat4;
        $mat5 = $request->mat5;

        $record = DB::insert('insert into users (no_reg, bind1, bind2, bind3, bind4, bind5, bind, bing1, bing2, bing3, bing4, bing5, bing, mat1, mat2, mat3, mat4, mat5, mat) values 
                                (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)',
                     [$no_reg->no_reg, $bind1, $bind2, $bind3, $bind4, $bind5, $bind,
                        $bing1, $bing2, $bing3, $bing4, $bing5, $bing,
                        $mat1, $mat2, $mat3, $mat4, $mat5, $mat]);
        if ($record) {
            return response()->json(['error' => false, 'pmdk' => $record]);
        }
        return response()->json(['error' => true]);
    }

    /**
     *  isi nilai sesuai ijazaha di tabel jalur_pnuan
     */
    public function insertPNUAN(Request $request) {

    }


    /**
     * Dapat no_reg (insert tabel mahasiswa)
     */
    public function getNoReg() {
        return \App\Process::generateNoReg(\App\Process::generateTahunMini());
    }

    /**
     * Lengkapi biodata (update table mahasiswa)
     */
    public function insertBiodata(Request $request) {
        
    }


    /**
     * PMDK (nilai raport dari semester 1 - 7)
     */
    public function updatePMDK(Request $request) {

    }

    /**
     * PNUAN (nilai uan)
     */
    public function updatePNUAN(Request $request) {

    }

    public function chooseProgram(Request $request) {
        
    }
}
