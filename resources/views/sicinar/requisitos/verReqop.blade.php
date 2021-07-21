@extends('sicinar.principal')

@section('title','Ver requisitos operativos')

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
            <h1>Menu 
                <small>3. Requisitos operativos - Seleccionar para editar o registrar</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Menú</a></li>
                <li><a href="#">3. Requisitos operativos </a></li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header" style="text-align:right;">
                            {{ Form::open(['route' => 'buscarReqop', 'method' => 'GET', 'class' => 'form-inline pull-right']) }}
                                <div class="form-group">
                                    {{ Form::text('fper', null, ['class' => 'form-control', 'placeholder' => 'Periodo fiscal']) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::text('nameiap', null, ['class' => 'form-control', 'placeholder' => 'Nombre OSC']) }}
                                </div>                                           
                                <div class="form-group"> 
                                    <button type="submit" class="btn btn-default">
                                        <span class="glyphicon glyphicon-search"></span>
                                    </button>
                                </div>
                                <div class="form-group">
                                    <a href="{{route('nuevoReqop')}}" class="btn btn-primary btn_xs" title="Registrar Requisitos operativos"><i class="fa fa-file-new-o"></i><span class="glyphicon glyphicon-plus"></span>Registrar requisitos operativos</a>
                                </div>                                
                            {{ Form::close() }}                            
                        </div>                        
                        <div class="box-body">
                            <table id="tabla1" class="table table-striped table-bordered table-sm">
                                <thead style="color: brown;" class="justify">
                                    <tr>
                                        <th style="text-align:left;   vertical-align: middle;font-size:11px;">Per.            </th>
                                        <th style="text-align:left;   vertical-align: middle;font-size:11px;">Fol.            </th>  
                                        <th style="text-align:left;   vertical-align: middle;font-size:11px;">OSC             </th>
                                        <th style="text-align:center; vertical-align: middle;font-size:11px;">Padrón  <br>Benef. </th>
                                        <th style="text-align:center; vertical-align: middle;font-size:11px;">Programa<br>Trabajo</th>
                                        <th style="text-align:center; vertical-align: middle;font-size:11px;">Informe <br>Anual  </th>
                                        <th style="text-align:center; vertical-align: middle;font-size:11px; width:100px;">Acciones</th>
                                    </tr>
                                </thead>
 
                                <tbody>
                                    @foreach($regoperativo as $operativo)
                                    <tr>
                                        <td style="text-align:left; vertical-align: middle;font-size:11px;">{{$operativo->periodo_id}}</td>
                                        <td style="text-align:left; vertical-align: middle;font-size:11px;">{{$operativo->osc_folio}} </td>
                                        <td style="text-align:left; vertical-align: middle;font-size:11px;">
                                            @foreach($regosc as $osc)
                                                @if($osc->osc_id == $operativo->osc_id)
                                                    {{$osc->osc_id.' '.Trim($osc->osc_desc)}} 
                                                    @break
                                                @endif
                                            @endforeach    
                                        </td>  
                                        @if(!empty($operativo->osc_d1)&&(!is_null($operativo->osc_d1)))
                                            <td style="color:darkgreen;text-align:center; vertical-align:middle;font-size:11px;" title="Padrón de beneficiarios">
                                                <a href="/images/{{$operativo->osc_d1}}" class="btn btn-danger" title="Padrón de beneficiarios"><i class="fa fa-file-pdf-o"></i>
                                                </a>
                                                <a href="{{route('editarReqop1',$operativo->osc_folio)}}" class="btn badge-warning" title="Editar Padrón de beneficiarios"><i class="fa fa-edit"></i>
                                                </a>
                                            </td>
                                        @else
                                            <td style="color:darkred; text-align:center; vertical-align: middle;font-size:11px;" title="Padrón de beneficiarios"><i class="fa fa-times"></i>
                                                <a href="{{route('editarReqop1',$operativo->osc_folio)}}" class="btn badge-warning" title="Editar Padrón de beneficiarios"><i class="fa fa-edit"></i>
                                                </a>
                                            </td>   
                                        @endif
                                        @if(!empty($operativo->osc_d2)&&(!is_null($operativo->osc_d2)))
                                            <td style="color:darkgreen;text-align:center; vertical-align: middle;font-size:11px;" title="Programa de trabajo">
                                                <a href="/images/{{$operativo->osc_d2}}" class="btn btn-danger" title="Programa de trabajo"><i class="fa fa-file-pdf-o"></i>
                                                </a>
                                                <a href="{{route('editarReqop2',$operativo->osc_folio)}}" class="btn badge-warning" title="Editar Programa de trabajo"><i class="fa fa-edit"></i>
                                                </a>
                                            </td>
                                        @else
                                            <td style="color:darkred; text-align:center; vertical-align: middle;font-size:11px;" title="Programa de trabajo"><i class="fa fa-times"></i>
                                                <a href="{{route('editarReqop2',$operativo->osc_folio)}}" class="btn badge-warning" title="Editar Programa de trabajo"><i class="fa fa-edit"></i>
                                                </a>
                                            </td>   
                                        @endif
                                        @if(!empty($operativo->osc_d3)&&(!is_null($operativo->osc_d3)))
                                            <td style="color:darkgreen;text-align:center; vertical-align: middle;font-size:11px;" title="Informe anual">
                                                <a href="/images/{{$operativo->osc_d3}}" class="btn btn-danger" title="Informe anual"><i class="fa fa-file-pdf-o"></i>
                                                </a>
                                                <a href="{{route('editarReqop3',$operativo->osc_folio)}}" class="btn badge-warning" title="Editar Informe anual"><i class="fa fa-edit"></i>
                                                </a>
                                            </td>
                                        @else
                                            <td style="color:darkred; text-align:center; vertical-align: middle;font-size:11px;" title="Informe anual"><i class="fa fa-times"></i>
                                                <a href="{{route('editarReqop3',$operativo->osc_folio)}}" class="btn badge-warning" title="Editar Informe anual"><i class="fa fa-edit"></i>
                                                </a>
                                            </td>   
                                        @endif

                                        <td style="text-align:center; vertical-align: middle;font-size:11px;">
                                            <a href="{{route('editarReqop',$operativo->osc_folio)}}" class="btn badge-warning" title="Editar requisitos operativos"><i class="fa fa-edit"></i>
                                            </a>
                                            @if(session()->get('rango') == '4')
                                                <a href="{{route('borrarReqop',$operativo->osc_folio)}}" class="btn badge-danger" title="Borrar registro" onclick="return confirm('¿Seguro que desea borrar requisitos operativos?')"><i class="fa fa-times"></i>
                                                </a>                                             
                                            @endif 
                                        </td>
                    
                                    </tr>   
                                    @endforeach
                                </tbody>
                            </table>
                            {!! $regoperativo->appends(request()->input())->links() !!}
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
