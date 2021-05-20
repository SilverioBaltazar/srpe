@extends('sicinar.principal')

@section('title','Ver requisitos admon.')

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
                <small>Requisitos admon. - Otros requisitos - Seleccionar para editar o registrar</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Menú</a></li>
                <li><a href="#">Requisitos admon.  </a></li>
                <li><a href="#">Otros requisitos      </a></li>         
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header" style="text-align:right;">
                            {{ Form::open(['route' => 'buscarReqc', 'method' => 'GET', 'class' => 'form-inline pull-right']) }}
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
                                    <a href="{{route('nuevoReqc')}}" class="btn btn-primary btn_xs" title="Registrar Requisitos admon."><i class="fa fa-file-new-o"></i><span class="glyphicon glyphicon-plus"></span>Registrar requisitos admon.</a>
                                </div>                                
                            {{ Form::close() }}                            
                        </div>                        
                        <div class="box-body">
                            <table id="tabla1" class="table table-striped table-bordered table-sm">
                                <thead style="color: brown;" class="justify">
                                    <tr>
                                        <th style="text-align:left;   vertical-align: middle;font-size:11px;">Per.          </th>
                                        <th style="text-align:left;   vertical-align: middle;font-size:11px;">Fol.            </th>  
                                        <th style="text-align:left;   vertical-align: middle;font-size:11px;">OSC             </th>
                                        <th style="text-align:center; vertical-align: middle;font-size:11px;">Presup.<br>Anual </th>
                                        <th style="text-align:center; vertical-align: middle;font-size:11px;">Constan.<br>Recibir<br>Donativos</th>
                                        <th style="text-align:center; vertical-align: middle;font-size:11px;">Declar.<br>Anual </th>
                                        <th colspan="12" style="background-color:darkgreen;text-align:center;"><b style="color:white;font-size: x-small;">Cuotas de 5 al millar<br>Enero ... Diciembre</b></th>
                                        <th style="text-align:center; vertical-align: middle;font-size:11px; width:100px;">Acciones</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($regcontable as $contable)
                                    <tr>
                                        <td style="text-align:left; vertical-align: middle;font-size:11px;">{{$contable->periodo_id}}</td>
                                        <td style="text-align:left; vertical-align: middle;font-size:11px;">{{$contable->osc_folio}} </td>
                                        <td style="text-align:left; vertical-align: middle;font-size:11px;">
                                            @foreach($regosc as $osc)
                                                @if($osc->osc_id == $contable->osc_id)
                                                    {{$osc->osc_id.' '.Trim($osc->osc_desc)}} 
                                                    @break
                                                @endif
                                            @endforeach    
                                        </td>  
                                        @if(!empty($contable->osc_d7)&&(!is_null($contable->osc_d7)))
                                            <td style="color:darkgreen;text-align:center; vertical-align:middle;font-size:11px;" title="Presupuesto anual">
                                                <a href="/images/{{$contable->osc_d7}}" class="btn btn-success" title="Presupuesto anual"><i class="fa fa-file-excel-o"></i>
                                                </a>
                                                <a href="{{route('editarReqc7',$contable->osc_folio)}}" class="btn badge-warning" title="Editar Presupuesto anual"><i class="fa fa-edit"></i>
                                                </a>
                                            </td>
                                        @else
                                            <td style="color:darkred; text-align:center; vertical-align: middle;font-size:11px;" title="Presupuesto anual"><i class="fa fa-times"></i>
                                                <a href="{{route('editarReqc7',$contable->osc_folio)}}" class="btn badge-warning" title="Editar Presupuesto anual"><i class="fa fa-edit"></i>
                                                </a>
                                            </td>   
                                        @endif
                                        @if(!empty($contable->osc_d8)&&(!is_null($contable->osc_d8)))
                                            <td style="color:darkgreen;text-align:center; vertical-align: middle;font-size:11px;" title="Contancia para recibir donativos">
                                                <a href="/images/{{$contable->osc_d8}}" class="btn btn-danger" title="Contancia para recibir donativos"><i class="fa fa-file-pdf-o"></i>
                                                </a>
                                                <a href="{{route('editarReqc8',$contable->osc_folio)}}" class="btn badge-warning" title="Editar Contancia para recibir donativos"><i class="fa fa-edit"></i>
                                                </a>
                                            </td>
                                        @else
                                            <td style="color:darkred; text-align:center; vertical-align: middle;font-size:11px;" title="Contancia para recibir donativos"><i class="fa fa-times"></i>
                                                <a href="{{route('editarReqc8',$contable->osc_folio)}}" class="btn badge-warning" title="Editar Contancia para recibir donativos"><i class="fa fa-edit"></i>
                                                </a>
                                            </td>   
                                        @endif
                                        @if(!empty($contable->osc_d9)&&(!is_null($contable->osc_d9)))
                                            <td style="color:darkgreen;text-align:center; vertical-align: middle;font-size:11px;" title="Declaración anual">
                                                <a href="/images/{{$contable->osc_d9}}" class="btn btn-danger" title="Declaración anual"><i class="fa fa-file-pdf-o"></i>
                                                </a>
                                                <a href="{{route('editarReqc9',$contable->osc_folio)}}" class="btn badge-warning" title="Editar Declaración anual"><i class="fa fa-edit"></i>
                                                </a>
                                            </td>
                                        @else
                                            <td style="color:darkred; text-align:center; vertical-align: middle;font-size:11px;" title="Declaración anual"><i class="fa fa-times"></i>
                                                <a href="{{route('editarReqc9',$contable->osc_folio)}}" class="btn badge-warning" title="Editar Declaración anual"><i class="fa fa-edit"></i>
                                                </a>
                                            </td>   
                                        @endif
                                        @if(!empty($contable->osc_d10)&&(!is_null($contable->osc_d10)))
                                            <td style="color:darkgreen;text-align:center; vertical-align: middle;font-size:11px;" title="Enero Cuotas de 5 al millar">
                                                <a href="/images/{{$contable->osc_d10}}" class="btn btn-danger" title="Enero Cuotas de 5 al millar"><i class="fa fa-file-pdf-o">
                                                </a>
                                                <a href="{{route('editarReqc10',$contable->osc_folio)}}" class="btn badge-warning" title="Editar enero Cuotas de 5 al millar"><i class="fa fa-edit"></i>
                                                </a>
                                            </td>
                                        @else
                                            <td style="color:darkred; text-align:center; vertical-align: middle;font-size:11px;" title="Enero Cuotas de 5 al millar"><i class="fa fa-times"></i>
                                                <a href="{{route('editarReqc10',$contable->osc_folio)}}" class="btn badge-warning" title="Editar enero Cuotas de 5 al millar"><i class="fa fa-edit"></i>
                                                </a>
                                            </td>   
                                        @endif
                                        @if(!empty($contable->osc_d1002)&&(!is_null($contable->osc_d1002)))
                                            <td style="color:darkgreen;text-align:center; vertical-align: middle;font-size:11px;" title="Febrero Cuotas de 5 al millar">
                                                <a href="/images/{{$contable->osc_d1002}}" class="btn btn-danger" title="Febrero Cuotas de 5 al millar"><i class="fa fa-file-pdf-o">
                                                </a>
                                                <a href="{{route('editarReqc1002',$contable->osc_folio)}}" class="btn badge-warning" title="Editar febrero Cuotas de 5 al millar"><i class="fa fa-edit"></i>
                                                </a>
                                            </td>
                                        @else
                                            <td style="color:darkred; text-align:center; vertical-align: middle;font-size:11px;" title="Febrero Cuotas de 5 al millar"><i class="fa fa-times"></i>
                                                <a href="{{route('editarReqc1002',$contable->osc_folio)}}" class="btn badge-warning" title="Editar febrero Cuotas de 5 al millar"><i class="fa fa-edit"></i>
                                                </a>
                                            </td>   
                                        @endif
                                        @if(!empty($contable->osc_d1003)&&(!is_null($contable->osc_d1003)))
                                            <td style="color:darkgreen;text-align:center; vertical-align: middle;font-size:11px;" title="Marzo Cuotas de 5 al millar">
                                                <a href="/images/{{$contable->osc_d1003}}" class="btn btn-danger" title="Marzo Cuotas de 5 al millar"><i class="fa fa-file-pdf-o">
                                                </a>
                                                <a href="{{route('editarReqc1003',$contable->osc_folio)}}" class="btn badge-warning" title="Editar marzo Cuotas de 5 al millar"><i class="fa fa-edit"></i>
                                                </a>
                                            </td>
                                        @else
                                            <td style="color:darkred; text-align:center; vertical-align: middle;font-size:11px;" title="Marzo Cuotas de 5 al millar"><i class="fa fa-times"></i>
                                                <a href="{{route('editarReqc1003',$contable->osc_folio)}}" class="btn badge-warning" title="Editar marzo Cuotas de 5 al millar"><i class="fa fa-edit"></i>
                                                </a>
                                            </td>   
                                        @endif 

                                        @if(!empty($contable->osc_d1004)&&(!is_null($contable->osc_d1004)))
                                            <td style="color:darkgreen;text-align:center; vertical-align: middle;font-size:11px;" title="Abril Cuotas de 5 al millar">
                                                <a href="/images/{{$contable->osc_d1004}}" class="btn btn-danger" title="Abril Cuotas de 5 al millar"><i class="fa fa-file-pdf-o"></i>
                                                </a>
                                                <a href="{{route('editarReqc1004',$contable->osc_folio)}}" class="btn badge-warning" title="Editar abril Cuotas de 5 al millar"><i class="fa fa-edit"></i>
                                                </a>
                                            </td>
                                        @else
                                            <td style="color:darkred; text-align:center; vertical-align: middle;font-size:11px;" title="Abril Cuotas de 5 al millar"><i class="fa fa-times"></i>
                                                <a href="{{route('editarReqc1004',$contable->osc_folio)}}" class="btn badge-warning" title="Editar abril Cuotas de 5 al millar"><i class="fa fa-edit"></i>
                                                </a>
                                            </td>   
                                        @endif 
                                        @if(!empty($contable->osc_d1005)&&(!is_null($contable->osc_d1005)))
                                            <td style="color:darkgreen;text-align:center; vertical-align: middle;font-size:11px;" title="Mayo Cuotas de 5 al millar">
                                                <a href="/images/{{$contable->osc_d1005}}" class="btn btn-danger" title="Mayo Cuotas de 5 al millar"><i class="fa fa-file-pdf-o"></i>
                                                </a>
                                                <a href="{{route('editarReqc1005',$contable->osc_folio)}}" class="btn badge-warning" title="Editar mayo Cuotas de 5 al millar"><i class="fa fa-edit"></i>
                                                </a>
                                            </td>
                                        @else
                                            <td style="color:darkred; text-align:center; vertical-align: middle;font-size:11px;" title="Mayo Cuotas de 5 al millar"><i class="fa fa-times"></i>
                                                <a href="{{route('editarReqc1005',$contable->osc_folio)}}" class="btn badge-warning" title="Editar mayo Cuotas de 5 al millar"><i class="fa fa-edit"></i>
                                                </a>
                                            </td>   
                                        @endif 
                                        @if(!empty($contable->osc_d1006)&&(!is_null($contable->osc_d1006)))
                                            <td style="color:darkgreen;text-align:center; vertical-align: middle;font-size:11px;" title="Junio Cuotas de 5 al millar">
                                                <a href="/images/{{$contable->osc_d1006}}" class="btn btn-danger" title="Junio Cuotas de 5 al millar"><i class="fa fa-file-pdf-o"></i>
                                                </a>
                                                <a href="{{route('editarReqc1006',$contable->osc_folio)}}" class="btn badge-warning" title="Editar junio Cuotas de 5 al millar"><i class="fa fa-edit"></i>
                                                </a>
                                            </td>
                                        @else
                                            <td style="color:darkred; text-align:center; vertical-align: middle;font-size:11px;" title="Junio Cuotas de 5 al millar"><i class="fa fa-times"></i>
                                                <a href="{{route('editarReqc1006',$contable->osc_folio)}}" class="btn badge-warning" title="Editar junio Cuotas de 5 al millar"><i class="fa fa-edit"></i>
                                                </a>
                                            </td>   
                                        @endif                                                                                 

                                        @if(!empty($contable->osc_d1007)&&(!is_null($contable->osc_d1007)))
                                            <td style="color:darkgreen;text-align:center; vertical-align: middle;font-size:11px;" title="Agosto Cuotas de 5 al millar">
                                                <a href="/images/{{$contable->osc_d1007}}" class="btn btn-danger" title="Agosto Cuotas de 5 al millar"><i class="fa fa-file-pdf-o"></i>
                                                </a>
                                                <a href="{{route('editarReqc1007',$contable->osc_folio)}}" class="btn badge-warning" title="Editar agosto Cuotas de 5 al millar"><i class="fa fa-edit"></i>
                                                </a>
                                            </td>
                                        @else
                                            <td style="color:darkred; text-align:center; vertical-align: middle;font-size:11px;" title="Agosto Cuotas de 5 al millar"><i class="fa fa-times"></i>
                                                <a href="{{route('editarReqc1007',$contable->osc_folio)}}" class="btn badge-warning" title="Editar agosto Cuotas de 5 al millar"><i class="fa fa-edit"></i>
                                                </a>
                                            </td>   
                                        @endif 
                                        @if(!empty($contable->osc_d1008)&&(!is_null($contable->osc_d1008)))
                                            <td style="color:darkgreen;text-align:center; vertical-align: middle;font-size:11px;" title="Septiembre Cuotas de 5 al millar">
                                                <a href="/images/{{$contable->osc_d1008}}" class="btn btn-danger" title="Septiembre Cuotas de 5 al millar"><i class="fa fa-file-pdf-o"></i>
                                                </a>
                                                <a href="{{route('editarReqc1008',$contable->osc_folio)}}" class="btn badge-warning" title="Editar septiembre Cuotas de 5 al millar"><i class="fa fa-edit"></i>
                                                </a>
                                            </td>
                                        @else
                                            <td style="color:darkred; text-align:center; vertical-align: middle;font-size:11px;" title="Septiembre Cuotas de 5 al millar"><i class="fa fa-times"></i>
                                                <a href="{{route('editarReqc1008',$contable->osc_folio)}}" class="btn badge-warning" title="Editar septiembre Cuotas de 5 al millar"><i class="fa fa-edit"></i>
                                                </a>
                                            </td>   
                                        @endif 
                                        @if(!empty($contable->osc_d1009)&&(!is_null($contable->osc_d1009)))
                                            <td style="color:darkgreen;text-align:center; vertical-align: middle;font-size:11px;" title="Octubre Cuotas de 5 al millar">
                                                <a href="/images/{{$contable->osc_d1009}}" class="btn btn-danger" title="Octubre Cuotas de 5 al millar"><i class="fa fa-file-pdf-o"></i>
                                                </a>
                                                <a href="{{route('editarReqc1009',$contable->osc_folio)}}" class="btn badge-warning" title="Editar octubre Cuotas de 5 al millar"><i class="fa fa-edit"></i>
                                                </a>
                                            </td>
                                        @else
                                            <td style="color:darkred; text-align:center; vertical-align: middle;font-size:11px;" title="Octubre Cuotas de 5 al millar"><i class="fa fa-times"></i>
                                                <a href="{{route('editarReqc1009',$contable->osc_folio)}}" class="btn badge-warning" title="Editar octubre Cuotas de 5 al millar"><i class="fa fa-edit"></i>
                                                </a>
                                            </td>   
                                        @endif                                                                             

                                        @if(!empty($contable->osc_d1010)&&(!is_null($contable->osc_d1010)))
                                            <td style="color:darkgreen;text-align:center; vertical-align: middle;font-size:11px;" title="Octubre Cuotas de 5 al millar">
                                                <a href="/images/{{$contable->osc_d1010}}" class="btn btn-danger" title="Octubre Cuotas de 5 al millar"><i class="fa fa-file-pdf-o"></i>
                                                </a>
                                                <a href="{{route('editarReqc1010',$contable->osc_folio)}}" class="btn badge-warning" title="Editar octubre Cuotas de 5 al millar"><i class="fa fa-edit"></i>
                                                </a>
                                            </td>
                                        @else
                                            <td style="color:darkred; text-align:center; vertical-align: middle;font-size:11px;" title="Octubre Cuotas de 5 al millar"><i class="fa fa-times"></i>
                                                <a href="{{route('editarReqc1010',$contable->osc_folio)}}" class="btn badge-warning" title="Editar octubre Cuotas de 5 al millar"><i class="fa fa-edit"></i>
                                                </a>
                                            </td>   
                                        @endif 
                                        @if(!empty($contable->osc_d1011)&&(!is_null($contable->osc_d1011)))
                                            <td style="color:darkgreen;text-align:center; vertical-align: middle;font-size:11px;" title="Noviembre Cuotas de 5 al millar">
                                                <a href="/images/{{$contable->osc_d1011}}" class="btn btn-danger" title="Noviembre Cuotas de 5 al millar"><i class="fa fa-file-pdf-o">
                                                </a>
                                                <a href="{{route('editarReqc1011',$contable->osc_folio)}}" class="btn badge-warning" title="Editar noviembre Cuotas de 5 al millar"><i class="fa fa-edit"></i>
                                                </a>
                                            </td>
                                        @else
                                            <td style="color:darkred; text-align:center; vertical-align: middle;font-size:11px;" title="Noviembre Cuotas de 5 al millar"><i class="fa fa-times"></i>
                                                <a href="{{route('editarReqc1011',$contable->osc_folio)}}" class="btn badge-warning" title="Editar noviembre Cuotas de 5 al millar"><i class="fa fa-edit"></i>
                                                </a>
                                            </td>   
                                        @endif 
                                        @if(!empty($contable->osc_d1012)&&(!is_null($contable->osc_d1012)))
                                            <td style="color:darkgreen;text-align:center; vertical-align: middle;font-size:11px;" title="Diciembre Cuotas de 5 al millar">
                                                <a href="/images/{{$contable->osc_d1012}}" class="btn btn-danger" title="Diciembre Cuotas de 5 al millar"><i class="fa fa-file-pdf-o"></i>
                                                </a>
                                                <a href="{{route('editarReqc1012',$contable->osc_folio)}}" class="btn badge-warning" title="Editar diciembre Cuotas de 5 al millar"><i class="fa fa-edit"></i>
                                                </a>
                                            </td>
                                        @else
                                            <td style="color:darkred; text-align:center; vertical-align: middle;font-size:11px;" title="Diciembre Cuotas de 5 al millar"><i class="fa fa-times"></i>
                                                <a href="{{route('editarReqc1012',$contable->osc_folio)}}" class="btn badge-warning" title="Editar diciembre Cuotas de 5 al millar"><i class="fa fa-edit"></i>
                                                </a>
                                            </td>   
                                        @endif                                            
                                        <td style="text-align:center; vertical-align: middle;font-size:11px;">
                                            <a href="{{route('editarReqc',$contable->osc_folio)}}" class="btn badge-warning" title="Editar requisitos admon."><i class="fa fa-edit"></i>
                                            </a>
                                            @if(session()->get('rango') == '4')
                                                <a href="{{route('borrarReqc',$contable->osc_folio)}}" class="btn badge-danger" title="Borrar registro" onclick="return confirm('¿Seguro que desea borrar requisitos admon.?')"><i class="fa fa-times"></i>
                                                </a>                                             
                                            @endif 
                                        </td>
                    
                                    </tr>   
                                    @endforeach
                                </tbody>
                            </table>
                            {!! $regcontable->appends(request()->input())->links() !!}
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
