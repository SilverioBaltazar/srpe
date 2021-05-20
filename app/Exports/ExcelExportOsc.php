<?php
namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\regOscModel;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExcelExportOsc implements FromCollection, /*FromQuery,*/ WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'OSC_ID',
            'NOMBRE',
            'DOMICILIO_LEGAL',
            'DOMICILIO_2',
            'DOMICILIO_3',
            'ENTIDADFEDERATIVA_ID',
            'ENTIDAD_FEDERATIVA',
            'MUNICIPIO_ID',
            'MUNICIPIO',
            'RUBRO_ID',
            'RUBRO',
            'REGISTRO_CONSTITUCION',
            'RFC',
            'CP',
            'FECHA_CONSTITUCION',
            'TELEFONO',
            'EMAIL',
            'SITIO_WEB',
            'PRESIDENTE',
            'REPRESENTANTE_LEGAL',
            'SRIO',
            'TESORERO',
            'OBJETO_SOCIAL_P1',
            'OBJETO_SOCIAL_P2',
            'FECHA_CERTIFICACION',
            'FECHA_REGISTRO',
            'SITUACION_INM',
            'VIGENCIA',
            'STATUS'            
        ];
    }

    public function collection()
    {
       // return regOscModel::join('PE_CAT_MUNICIPIOS_SEDESEM',[['PE_CAT_MUNICIPIOS_SEDESEM.ENTIDADFEDERATIVAID','=',15],
       //                                                    ['PE_CAT_MUNICIPIOS_SEDESEM.MUNICIPIOID','=','PE_OSC.MUNICIPIO_ID']])
       //                    ->wherein('PE_CAT_MUNICIPIOS_SEDESEM.ENTIDADFEDERATIVAID',[9,15,22])
        return regOscModel::join(  'PE_CAT_MUNICIPIOS_SEDESEM',[['PE_CAT_MUNICIPIOS_SEDESEM.ENTIDADFEDERATIVAID','=',
                                                                 'PE_OSC.ENTIDADFEDERATIVA_ID'],
                                                                ['PE_CAT_MUNICIPIOS_SEDESEM.MUNICIPIOID','=',
                                                                 'PE_OSC.MUNICIPIO_ID']]) 
                          ->join(   'PE_CAT_ENTIDADES_FED'    ,  'PE_CAT_ENTIDADES_FED.ENTIDADFEDERATIVA_ID', '=', 
                                                                 'PE_OSC.ENTIDADFEDERATIVA_ID')
                          ->join(   'PE_CAT_RUBROS'         ,'PE_CAT_RUBROS.RUBRO_ID'          ,'=','PE_OSC.RUBRO_ID')
                          ->join(   'PE_CAT_INMUEBLES_EDO'  ,'PE_CAT_INMUEBLES_EDO.INM_ID'     ,'=','PE_OSC.INM_ID')
                          ->join(   'PE_CAT_PERIODOS_ANIOS' ,'PE_CAT_PERIODOS_ANIOS.PERIODO_ID','=','PE_OSC.ANIO_ID')
                          ->select( 'PE_OSC.OSC_ID'         ,'PE_OSC.OSC_DESC', 
                                    'PE_OSC.OSC_DOM1'       ,'PE_OSC.OSC_DOM2',
                                    'PE_OSC.OSC_DOM3'       ,'PE_OSC.ENTIDADFEDERATIVA_ID',
                                    'PE_CAT_ENTIDADES_FED.ENTIDADFEDERATIVA_DESC',
                                    'PE_OSC.MUNICIPIO_ID'   ,'PE_CAT_MUNICIPIOS_SEDESEM.MUNICIPIONOMBRE',         
                                    'PE_OSC.RUBRO_ID'       ,'PE_CAT_RUBROS.RUBRO_DESC', 
                                    'PE_OSC.OSC_REGCONS'    ,'PE_OSC.OSC_RFC', 
                                    'PE_OSC.OSC_CP'         ,'PE_OSC.OSC_FECCONS2',     
                                    'PE_OSC.OSC_TELEFONO'   ,'PE_OSC.OSC_EMAIL',
                                    'PE_OSC.OSC_SWEB'       ,'PE_OSC.OSC_PRES',         
                                    'PE_OSC.OSC_REPLEGAL'   ,'PE_OSC.OSC_SRIO', 
                                    'PE_OSC.OSC_TESORERO'   ,
                                    'PE_OSC.OSC_OBJSOC_1'   ,'PE_OSC.OSC_OBJSOC_2',        
                                    'PE_OSC.OSC_FECCERTIFIC','PE_OSC.OSC_FECREG',
                                    'PE_CAT_INMUEBLES_EDO.INM_DESC','PE_CAT_PERIODOS_ANIOS.PERIODO_DESC',
                                    'PE_OSC.OSC_STATUS')
                          ->orderBy('PE_OSC.OSC_ID','ASC')
                          ->get();                               
    }
}
