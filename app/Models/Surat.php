<?php

namespace App\Models;

use App\Models\Log_Surat;
use Bitfumes\Multiauth\Model\Admin;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    protected $table = 'surats';

    public function logSurat(){

    	return $this->hasMany(Log_Surat::class, 'id_surat');

    }

    public function user(){

    	return $this->belongsTo(Admin::class, 'tujuan_surat', 'id');

    }
}
