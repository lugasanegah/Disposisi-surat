<?php

namespace App\Models;

use App\Models\Surat;
use Bitfumes\Multiauth\Model\Admin;
use Illuminate\Database\Eloquent\Model;

class Log_Surat extends Model
{
    protected $table = 'log_surats';
    protected $dates = ['created_at', 'updated_at'];

    public function Surat(){

    	return $this->belongsTo(Surat::class, 'id_surat', 'id');

    }

    public function Admin(){

    	return $this->belongsTo(Admin::class, 'id_user', 'id');

    }

}
