<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class regPfiscalesModel extends Model
{
    protected $table      = "PE_CAT_PERIODOS";
    protected $primaryKey = 'PERIODO_ID';
    public $timestamps    = false;
    public $incrementing  = false;
    protected $fillable   = [
        'PERIODO_ID',
        'PERIODO_DESC',
        'PERIODO_FECREG'
    ];
}
