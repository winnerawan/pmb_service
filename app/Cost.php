<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cost extends Model
{
    protected $fillable = ['no', 'program_study', 'biaya_semester', 'pkkmb', 'bpiGel1', 'bpiGel2', 'bpiGel3'];

    public $no;
    public $programStudy;
    public $biayaSemester;
    public $pkkmb;
    public $bpiGel1;
    public $bpiGel2;
    public $bpiGel3;

    function __construct($n, $ps, $bs, $pk, $g1, $g2, $g3) {
        $this->no = $n;
        $this->programStudy = $ps;
        $this->biayaSemester = $bs;
        $this->pkkmb = $pk;
        $this->bpiGel1 = $g2;
        $this->bpiGel2 = $g3;
        $this->bpiGel3 = $g4;
    }

    public function getProgramStudy(){
		return $this->programStudy;
	}

	public function setProgramStudy($programStudy){
		$this->programStudy = $programStudy;
	}

	public function getBiayaSemester(){
		return $this->biayaSemester;
	}

	public function setBiayaSemester($biayaSemester){
		$this->biayaSemester = $biayaSemester;
	}

	public function getPkkmb(){
		return $this->pkkmb;
	}

	public function setPkkmb($pkkmb){
		$this->pkkmb = $pkkmb;
	}

	public function getBpiGel1(){
		return $this->bpiGel1;
	}

	public function setBpiGel1($bpiGel1){
		$this->bpiGel1 = $bpiGel1;
	}

	public function getBpiGel2(){
		return $this->bpiGel2;
	}

	public function setBpiGel2($bpiGel2){
		$this->bpiGel2 = $bpiGel2;
	}

	public function getBpiGel3(){
		return $this->bpiGel3;
	}

	public function setBpiGel3($bpiGel3){
		$this->bpiGel3 = $bpiGel3;
	}
}
