<?php

namespace App\Models;

use App\Models\Surat;
use Illuminate\Database\Eloquent\Model;

class Log_Surat extends Model
{
    protected $table = 'log_surats';

    public function Surat(){

    	return $this->belongsTo(Surat::class, 'id');

    }
}
