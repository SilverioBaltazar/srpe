@extends('sicinar.principal')

@section('title','Ver indicador de cumpliento de las OSCS')

@section('links')
    <link rel="stylesheet" href="{{ asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('nombre')
    {{$nombre}}
@endsection

@section('usuario')
    {{$usuario}}
@endsection

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Registro al Padrón Estatal
                <small>5. Validar y autorizar </small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Menú</a></li>
                <li><a href="#">Registro al Padrón Estatal </a></li>   
                <li><a href="#">5. Validar y autorizar    </a></li>               
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">

                        <div class="page-header" style="text-align:right;">
                            <label style="font-size:10px;"             ><small>                           Requisitos:</small></label>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                            <label style="color:green; font-size:10px;"><small>
                                <img src="{{ asset('images/signoadmin2.jpg') }}" width="20px" height="20px" title="Acta Constitutiva" style="text-align:center;margin-right: 15px;vertical-align: middle;"/> 
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                Obligatorio</small>
                            </label>
                            <label style="color:red;   font-size:10px;"><small><i class="fa fa-times"></i>Opcional   </small></label>                            
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                            {{ Form::open(['route' => 'buscarirse', 'method' => 'GET', 'class' => 'form-inline pull-right']) }}
                                <div class="form-group">
                                    {{ Form::text('idd', null, ['class' => 'form-control', 'placeholder' => 'id OSC']) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre OSC']) }}
                                </div>
                                
                                <div class="form-group">
                                    <button type="submit" class="btn btn-default">
                                        <span class="glyphicon glyphicon-search"></span>
                                    </button>
                                </div>                             
                            {{ Form::close() }}
                        </div>

                        <div class="box-body">
                            <table id="tabla1" class="table table-hover table-striped">
                                <thead style="font-size:10px;" class="justify">
                                    <tr>
                                        <th colspan="1" style="background-color:pink;text-align:center;vertical-align: middle;"></th>
                                        <th colspan="4" style="background-color:darkgreen;text-align:center;"><b style="color:white;font-size: x-small;">Requisitos jurídicos</b>
                                        </th>
                                        <th colspan="3" style="background-color:brown;text-align:center;"><b style="color:white;font-size: x-small;">Requisitos operativos</b>
                                        </th> 
                                        <th colspan="5" style="background-color:darkorange;text-align:center;vertical-align: middle;">Requisitos admon.</th>
                                        <th colspan="1" style="background-color:pink;text-align:center;vertical-align: middle;"></th>
                                    </tr>        
                                    <tr>
                                        <th style="background-color:pink;text-align:left;   vertical-align: middle;">                 </th>

                                        <th style="background-color:green;color:white;text-align:center;vertical-align: middle;"><i class="fa fa-check"></i></th>
                                        <th style="background-color:green;color:white;text-align:center;vertical-align: middle;"><i class="fa fa-check"></i></th>
                                        <th style="background-color:green;color:white;text-align:center;vertical-align: middle;"><i class="fa fa-check"></i></th>   
                                        <th style="background-color:green;color:white;text-align:center;vertical-align: middle;"><i class="fa fa-times"></i></th>

                                        <th style="background-color:brown;color:white;text-align:center; vertical-align: middle;"><i class="fa fa-times"></i></th>
                                        <th style="background-color:brown;color:white;text-align:center; vertical-align: middle;"><i class="fa fa-check"></i></th>
                                        <th style="background-color:brown;color:white;text-align:center; vertical-align: middle;"><i class="fa fa-check"></i></th>

                                        <th style="background-color:darkorange;text-align:center; vertical-align: middle;"><i class="fa fa-check"></i></th> 
                                        <th style="background-color:darkorange;text-align:center; vertical-align: middle;"><i class="fa fa-check"></i></th> 
                                        <th style="background-color:darkorange;text-align:center; vertical-align: middle;"><i class="fa fa-check"></i></th> 
                                        <th style="background-color:darkorange;text-align:center; vertical-align: middle;"><i class="fa fa-check"></i></th> 
                                        <th style="background-color:darkorange;text-align:center; vertical-align: middle;"><i class="fa fa-check"></i></th>   

                                        <th style="background-color:pink;text-align:center; vertical-align: middle;"> </th>
                                    </tr>                                                                
                                    <tr>
                                        
                                        <th style="background-color:pink;text-align:left;   vertical-align: middle;">OSC                 </th>

                                        <th style="background-color:green;color:white;text-align:center;vertical-align: middle;">Acta     <br>Const.   </th>
                                        <th style="background-color:green;color:white;text-align:center;vertical-align: middle;">Reg.     <br>IFREM    </th>
                                        <th style="background-color:green;color:white;text-align:center;vertical-align: middle;">Currículum            </th>   
                                        <th style="background-color:green;color:white;text-align:center; vertical-align: middle;">Ult.     <br>Protocol.</th>

                                        <th style="background-color:brown;color:white;text-align:center; vertical-align: middle;">Padrón   <br>Benef.   </th>
                                        <th style="background-color:brown;color:white;text-align:center; vertical-align: middle;">Prog.    <br>Trabajo  </th>
                                        <th style="background-color:brown;color:white;text-align:center; vertical-align: middle;">Informe  <br>Anual    </th>

                                        <th style="background-color:darkorange;text-align:center; vertical-align: middle;">Presup.  <br>Anual    </th> 
                                        <th style="background-color:darkorange;text-align:center; vertical-align: middle;">Const.   <br>Donativos</th> 
                                        <th style="background-color:darkorange;text-align:center; vertical-align: middle;">Dec.     <br>Anual    </th> 
                                        <th style="background-color:darkorange;text-align:center; vertical-align: middle;">Comp.Ded.<br>Impuestos</th> 
                                        <th style="background-color:darkorange;text-align:center; vertical-align: middle;">Apertura <br>y/o Edo. cta.</th>   

                                        <th style="background-color:pink;text-align:center; vertical-align: middle;">Validar    </th>
                                    </tr>
                                </thead> 
                                <tbody>
                                    <?php $i  = 0; ?>
                                    <?php $r01 = 0; ?>
                                    <?php $r02 = 0; ?>
                                    <?php $r03 = 0; ?>
                                    <?php $r04 = 0; ?>
                                    <?php $r05 = 0; ?>
                                    <?php $r06 = 0; ?>
                                    <?php $r07 = 0; ?>
                                    <?php $r08 = 0; ?>
                                    <?php $r09 = 0; ?>
                                    <?php $r10 = 0; ?>
                                    <?php $r11 = 0; ?>
                                    <?php $r12 = 0; ?>
                                    <?php $tot = 0; ?>
                                    @foreach($regosc as $osc)
                                    <?php $i  = $i + 1; ?>  
                                    <tr>
                                                                        
                                        <td style="tfont-family:'Arial, Helvetica, sans-serif'; font-size:11px; text-align:left; vertical-align: middle;">{{$osc->osc_id.' '.Trim($osc->osc_desc)}}
                                        </td>

                                        <td style="text-align:center; vertical-align: middle;"><small>
                                            @foreach($regjuridico as $rjuridico)
                                                @if($rjuridico->osc_id == $osc->osc_id)
                                                    @if(!empty($rjuridico->osc_d12)&&(!is_null($rjuridico->osc_d12)))
                                                        <?php $r01 = $r01 + 1; ?>  
                                                        <a href="/images/{{$rjuridico->osc_d12}}" class="btn btn-danger" title="Acta Constitutiva"><i class="fa fa-file-pdf-o"></i>
                                                        </a>
                                                        @break
                                                    @else                                                        
                                                        <img src="{{ asset('images/signoadmin2.jpg') }}" width="20px" height="20px" title="Acta Constitutiva" style="text-align:center;margin-right: 15px;vertical-align: middle;"/> 
                                                        @break
                                                    @endif
                                                @endif
                                            @endforeach </small>
                                        </td>
                                        <td style="text-align:center; vertical-align: middle;"><small>
                                            @foreach($regjuridico as $rjuridico)
                                                @if($rjuridico->osc_id == $osc->osc_id)
                                                    @if(!empty($rjuridico->osc_d13)&&(!is_null($rjuridico->osc_d13)))
                                                        <?php $r02 = $r02 + 1; ?>  
                                                        <a href="/images/{{$rjuridico->osc_d13}}" class="btn btn-danger" title="Documento de registro en el IFREM"><i class="fa fa-file-pdf-o"></i>
                                                        </a>
                                                        @break
                                                    @else                                                        
                                                        <img src="{{ asset('images/signoadmin2.jpg') }}" width="20px" height="20px" title="Documento de registro en el IFREM" style="text-align:center;margin-right: 15px;vertical-align: middle;"/> 
                                                        @break
                                                    @endif
                                                @endif
                                            @endforeach </small>
                                        </td>            

                                        <td style="text-align:center; vertical-align: middle;"><small>
                                            @foreach($regjuridico as $rjuridico)
                                                @if($rjuridico->osc_id == $osc->osc_id)
                                                    @if(!empty($rjuridico->osc_d14)&&(!is_null($rjuridico->osc_d14)))
                                                        <?php $r03 = $r03 + 1; ?>  
                                                        <a href="/images/{{$rjuridico->osc_d14}}" class="btn btn-danger" title="Curriculum"><i class="fa fa-file-pdf-o"></i>
                                                        </a>
                                                        @break
                                                    @else                                                        
                                                        <img src="{{ asset('images/signoadmin2.jpg') }}" width="20px" height="20px" title="Curriculum" style="text-align:center;margin-right: 15px;vertical-align: middle;"/> 
                                                        @break 
                                                    @endif
                                                @endif
                                            @endforeach </small>
                                        </td>                                                    
                                        <td style="text-align:center; vertical-align: middle;"><small>
                                            @foreach($regjuridico as $rjuridico)
                                                @if($rjuridico->osc_id == $osc->osc_id)
                                                    @if(!empty($rjuridico->osc_d15)&&(!is_null($rjuridico->osc_d15)))
                                                        <?php $r04 = $r04 + 1; ?>  
                                                        <a href="/images/{{$rjuridico->osc_d15}}" class="btn btn-danger" title="Documento de ultima protocolización"><i class="fa fa-file-pdf-o"></i>
                                                        </a>
                                                        @break
                                                    @endif
                                                @endif
                                            @endforeach </small>
                                        </td>                                                                                                                        

                                        <td style="text-align:center; vertical-align: middle;"><small>
                                            @foreach($regoperativo as $operativo)
                                                @if($operativo->osc_id == $osc->osc_id)
                                                    @if(!empty($operativo->osc_d1)&&(!is_null($operativo->osc_d1)))
                                                        <?php $r05 = $r05 + 1; ?>  
                                                        <a href="/images/{{$operativo->osc_d1}}" class="btn btn-danger" title="Padrón de beneficiarios"><i class="fa fa-file-pdf-o"></i>
                                                        </a>
                                                        @break
                                                    @endif
                                                @endif
                                            @endforeach </small>
                                        </td>
                                        <td style="text-align:center; vertical-align: middle;"><small>
                                            @foreach($regoperativo as $operativo)
                                                @if($operativo->osc_id == $osc->osc_id)
                                                    @if(!empty($operativo->osc_d2)&&(!is_null($operativo->osc_d2)))
                                                        <?php $r06 = $r06 + 1; ?>  
                                                        <a href="/images/{{$operativo->osc_d2}}" class="btn btn-danger" title="Programa de trabajo"><i class="fa fa-file-pdf-o"></i>
                                                        </a>
                                                        @break
                                                    @else                                                        
                                                        <img src="{{ asset('images/signoadmin2.jpg') }}" width="20px" height="20px" title="Programa de trabajo" style="text-align:center;margin-right: 15px;vertical-align: middle;"/> 
                                                        @break
                                                    @endif
                                                @endif
                                            @endforeach </small>
                                        </td>
                                        <td style="text-align:center; vertical-align: middle;"><small>
                                            @foreach($regoperativo as $operativo)
                                                @if($operativo->osc_id == $osc->osc_id)
                                                    @if(!empty($operativo->osc_d3)&&(!is_null($operativo->osc_d3)))
                                                        <?php $r07 = $r07 + 1; ?>  
                                                        <a href="/images/{{$operativo->osc_d3}}" class="btn btn-danger" title="Informe anual"><i class="fa fa-file-pdf-o"></i>
                                                        </a>
                                                        @break
                                                    @else                                                        
                                                        <img src="{{ asset('images/signoadmin2.jpg') }}" width="20px" height="20px" title="Informe anual" style="text-align:center;margin-right: 15px;vertical-align: middle;"/> 
                                                        @break
                                                    @endif
                                                @endif
                                            @endforeach </small>
                                        </td>                                        

                                        <td style="text-align:center; vertical-align: middle;"><small>
                                            @foreach($regcontable as $contable)
                                                @if($contable->osc_id == $osc->osc_id)
                                                    @if(!empty($contable->osc_d7)&&(!is_null($contable->osc_d7)))
                                                        <?php $r08 = $r08 + 1; ?>  
                                                        <a href="/images/{{$contable->osc_d7}}" class="btn btn-danger" title="Presupuesto anual"><i class="fa fa-file-pdf-o"></i>
                                                        </a>
                                                        @break
                                                    @else                                                        
                                                        <img src="{{ asset('images/signoadmin2.jpg') }}" width="20px" height="20px" title="Presupuesto anual" style="text-align:center;margin-right: 15px;vertical-align: middle;"/> 
                                                        @break
                                                    @endif
                                                @endif
                                            @endforeach </small>
                                        </td>
                                        <td style="text-align:center; vertical-align: middle;"><small>
                                            @foreach($regcontable as $contable)
                                                @if($contable->osc_id == $osc->osc_id)
                                                    @if(!empty($contable->osc_d8)&&(!is_null($contable->osc_d8)))
                                                        <?php $r09 = $r09 + 1; ?>  
                                                        <a href="/images/{{$contable->osc_d8}}" class="btn btn-danger" title="Constancia de autorización para recibir donativos"><i class="fa fa-file-pdf-o"></i>
                                                        </a>
                                                        @break
                                                    @else                                                        
                                                        <img src="{{ asset('images/signoadm2.jpg') }}" width="20px" height="20px" title="Constancia de autorización para recibir donativos" style="text-align:center;margin-right: 15px;vertical-align: middle;"/> 
                                                        @break 
                                                    @endif
                                                @endif
                                            @endforeach </small>
                                        </td>           
                                        <td style="text-align:center; vertical-align: middle;"><small>
                                            @foreach($regcontable as $contable)
                                                @if($contable->osc_id == $osc->osc_id)
                                                    @if(!empty($contable->osc_d9)&&(!is_null($contable->osc_d9)))
                                                        <?php $r10 = $r10 + 1; ?>  
                                                        <a href="/images/{{$contable->osc_d9}}" class="btn btn-danger" title="Declaración anual"><i class="fa fa-file-pdf-o"></i>
                                                        </a>
                                                        @break
                                                    @else                                                        
                                                        <img src="{{ asset('images/signoadm2.jpg') }}" width="20px" height="20px" title="Declaración anual" style="text-align:center;margin-right: 15px;vertical-align: middle;"/> 
                                                        @break 
                                                    @endif
                                                @endif
                                            @endforeach </small>
                                        </td>                                                                                                           
                                        <td style="text-align:center; vertical-align: middle;"><small>
                                            @foreach($regcontable as $contable)
                                                @if($contable->osc_id == $osc->osc_id)
                                                    @if(!empty($contable->osc_d10)&&(!is_null($contable->osc_d10)))
                                                        <?php $r11 = $r11 + 1; ?>  
                                                        <a href="/images/{{$contable->osc_d10}}" class="btn btn-danger" title="Comprobante deducible de impuestos"><i class="fa fa-file-pdf-o"></i>
                                                        </a>
                                                        @break
                                                    @else                                                        
                                                        <img src="{{ asset('images/signoadm2.jpg') }}" width="20px" height="20px" title="Comprobante deducible de impuestos" style="text-align:center;margin-right: 15px;vertical-align: middle;"/> 
                                                        @break
                                                    @endif
                                                @endif
                                            @endforeach </small>
                                        </td>                                                                                                           
                                        <td style="text-align:center; vertical-align: middle;"><small>
                                            @foreach($regcontable as $contable)
                                                @if($contable->osc_id == $osc->osc_id)
                                                    @if(!empty($contable->osc_d11)&&(!is_null($contable->osc_d11)))
                                                        <?php $r12 = $r12 + 1; ?>  
                                                        <a href="/images/{{$contable->osc_d11}}" class="btn btn-danger" title="Apertura y/o Edo. cta."><i class="fa fa-file-pdf-o"></i>
                                                        </a>
                                                        @break
                                                    @else
                                                        <img src="{{ asset('images/signoadm2.jpg') }}" width="20px" height="20px" title="Apertura y/o Edo. cta." style="text-align:center;margin-right: 15px;vertical-align: middle;"/> 
                                                        @break
                                                    @endif
                                                @endif
                                            @endforeach </small>
                                        </td>     
                                        <?php $tot = $r01+$r02+$r03+$r04+$r05+$r06+$r07+$r08+$r09+$r10+$r11+$r12 ; ?>  

                                        @foreach($regcontable as $contable)
                                            @if( ($r01==1)&&($r02==1)&&($r03==1)&&($r06==1)&&($r07==1)&&($r08==1)&&($r09==1)&&($r10==1)&&($r11==1)&&($r12==1) )
                                                <td style="text-align:center;"><small>
                                                     <a href="{{route('irsePDF',array($contable->periodo_id, $contable->osc_id) )}}" class="btn btn-danger" title="Oficio de incripción al RSE en formato PDF"><i class="fa fa-file-pdf-o"></i>
                                                     <small> PDF</small>
                                                     </a>
                                                </td></small>
                                                @break
                                            @else
                                                <td style="text-align:center;"><small>
                                                    <img src="{{ asset('images/semaforo_rojo.jpg') }}" width="15px" height="15px" title="Sin cumplir requisitos" style="text-align:center;margin-right: 15px;vertical-align: middle;"/> 
                                                </td></small>                                           
                                                @break                                            
                                            @endif
                                        @endforeach                              
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {!! $regosc->appends(request()->input())->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('request')
@endsection

@section('javascrpt')
@endsection
