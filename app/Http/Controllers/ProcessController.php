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
        $no_reg = $request->no_reg;
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

        $record = DB::insert('insert into jalur_pmdk (no_reg, bind1, bind2, bind3, bind4, bind5, bind, bing1, bing2, bing3, bing4, bing5, bing, mat1, mat2, mat3, mat4, mat5, mat) values 
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
        $no_reg = \App\Process::generateRegistrationNumber(\App\Process::generateTahunMini());
        $nama = $request->nama;
        $no_ktp = $request->no_ktp;
        $nisn = ""; //$request->nisn;
        $username = $request->username;
        $alamat = $request->alamat;
        $kelurahan = $request->kelurahan;
        $kecamatan = $request->kecamatan;
        $kota = ""; //$request->kota;
        $provinsi = ""; //$request->provinsi;
        $kewarganegaraan = $request->kewarganegaraan;
        $rt = $request->rt;
        $rw = $request->rw;
        $kodepos = $request->kodepos;
        $notlp = ""; //$request->notlp;
        $email = $request->email;
        $tmptlhr = $request->tmptlhr;
        $tgllhr = $request->tgllhr;
        $gender = $request->gender;
        $agama = $request->agama;
        $status_nikah = $request->status_nikah;
        $asalsekolah = $request->asalsekolah;
        $kota_sekolah = ""; //$request->kota_sekolah;
        $jurusan = $request->jurusan;
        $thnlulus = $request->thnlulus;
        $status_sekolah = $request->status_sekolah;
        $no_ijazah = $request->no_ijazah;
        $nama_ayah = $request->nama_ayah;
        $nama_ibu = $request->nama_ibu;
        $alamat_ortu = $request->alamat_ortu;
        $notlp_ortu = $request->notlp_ortu;
        $gaji_ortu = $request->gaji_ortu;
        $jml_tanggungan = $request->jml_tanggungan;
        $tgl_daftar = $request->tgl_daftar;
        $tahun_masuk = $request->tahun_masuk;
        $jalur = $request->jalur;
        $gelombang = "GELOMBANG 1"; //$request->gelombang;

        $size = "";
        $idkecamatan = "";
        $idkota = "";
        $idprovinsi = "";
        $kodedikti = "";

        $record = DB::insert('INSERT INTO mahasiswa (no_reg, nama, no_ktp, nisn, username, alamat, kelurahan, kecamatan, kota, provinsi, kewarganegaraan, rt, rw, kodepos, notlp, email, tmptlhr, tgllhr, gender, agama, status_nikah, asalsekolah, kota_sekolah, jurusan, thnlulus, status_sekolah, no_ijazah, nama_ayah, nama_ibu, alamat_ortu, notlp_ortu, gaji_ortu, jml_tanggungan, tgl_daftar, tahun_masuk, jalur, gelombang, size, idkecamatan, idkota, idprovinsi, kodedikti) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)',
            [$no_reg, $nama, $no_ktp, $nisn, $username, $alamat, $kelurahan, $kecamatan, $kota, $provinsi, $kewarganegaraan, $rt, $rw,
            $kodepos, $notlp, $email, $tmptlhr, $tgllhr, $gender, $agama, $status_nikah, $asalsekolah, $kota_sekolah, $jurusan, $thnlulus,
            $status_sekolah, $no_ijazah, $nama_ayah, $nama_ibu, $alamat_ortu, $notlp_ortu, $gaji_ortu, $jml_tanggungan, $tgl_daftar, $tahun_masuk, $jalur, $gelombang,
            $size, $idkecamatan, $idkota, $idprovinsi, $kodedikti]);

        if ($record) {

            $mahasiswa = DB::select('SELECT * FROM mahasiswa WHERE no_reg = ?', [$no_reg]);
                return response()->json(['error' => false, 'mahasiswa' => $mahasiswa[0]]);
        }
        return response()->json(['error' => true]);
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

    public function insertChoice() {
        $record = DB::insert('insert into pilihan (id_pil, no_reg, pil_1, pil_2) values (?, ?, ?, ?)', [1, 'Dayle']);
    }
}
