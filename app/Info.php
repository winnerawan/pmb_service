<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    protected $table = "info";

    public function getInfos() {
        return $this->all();
    }

    public function getInfo($id) {
        return $this->findOrFail($id);
    }
}
