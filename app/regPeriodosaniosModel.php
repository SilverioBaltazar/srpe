<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class regPeriodosaniosModel extends Model
{
    protected $table      = "PE_CAT_PERIODOS_ANIOS";
    protected $primaryKey = 'PERIODO_ID';
    public $timestamps    = false;
    public $incrementing  = false;
    protected $fillable   = [
        'PERIODO_ID',
        'PERIODO_DESC',
        'PERIODO_FECREG'
    ];
}
