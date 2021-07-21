@extends('sicinar.principal')

@section('title','Editar requisitos admon.')

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
            <h1>
                Menú
                <small> Requisitos admon. - Otros requisitos - Editar</small>
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-success">

                        {!! Form::open(['route' => ['actualizarReqc',$regcontable->osc_folio], 'method' => 'PUT', 'id' => 'actualizarReqc', 'enctype' => 'multipart/form-data']) !!}
                        <div class="box-body">
                            <div class="row">                            
                                <div class="col-xs-6 form-group" style="color:green;">
                                    <input type="hidden" name="periodo_id" id="periodo_id" value="{{$regcontable->periodo_id}}">                                
                                    <label>Periodo fiscal <br>
                                        {{$regcontable->periodo_id}}
                                    </label>
                                </div>                                   
                                <div class="col-xs-4 form-group">
                                    <input type="hidden" name="osc_id" id="osc_id" value="{{$regcontable->osc_id}}">
                                    <label>OSC &nbsp;&nbsp;&nbsp; </label><br>
                                    @foreach($regosc as $osc)
                                        @if($osc->osc_id == $regcontable->osc_id)
                                            <label style="color:green;">{{$regcontable->osc_id.' '.$osc->osc_desc}}</label>
                                            @break
                                        @endif
                                    @endforeach
                                </div>  
                                <div class="col-xs-4 form-group">
                                    <label>Folio <br> {{$regcontable->osc_folio}}</label>
                                </div>                                                                                     
                            </div>
           
                            <div class="row">               
                                <div class="col-xs-6 form-group">
                                    @if(!empty($regcontable->osc_d7)||(!is_null($regcontable->osc_d7)))
                                        <label >Archivo de presupuesto anual en formato excel </label><br>
                                        <a href="/images/{{$regcontable->osc_d7}}" class="btn btn-danger" title="documento de presupuesto anual"><i class="fa fa-file-excel-o"></i><small>Excel</small>
                                        </a>{{$regcontable->osc_d7}}
                                        <input type="hidden" name="doc_id7" id="doc_id7" value="16">
                                    @else
                                        <label >Archivo de presupuesto anual en formato excel </label><br>
                                        <b style="color:darkred;">** Pendiente **</b>
                                        <input type="hidden" name="doc_id7" id="doc_id7" value="16">
                                    @endif
                                </div>  
                                <div class="col-xs-4 form-group">
                                    <label >Formato del archivo </label>
                                    <select class="form-control m-bot15" name="formato_id7" id="formato_id7" required>
                                        <option selected="true" disabled="disabled">Seleccionar formato de archivo </option>
                                        @foreach($regformatos as $formato)
                                            @if($formato->formato_id == $regcontable->formato_id7)
                                                <option value="{{$formato->formato_id}}" selected>{{$formato->formato_desc}}</option>
                                            @else 
                                               <option value="{{$formato->formato_id}}">{{$formato->formato_desc}}</option>
                                            @endif
                                        @endforeach
                                    </select>                                                    
                                </div>                                    
                            </div>

                            <div class="row">               
                                <div class="col-xs-6 form-group">
                                    @if(!empty($regcontable->osc_d8)||(!is_null($regcontable->osc_d8)))
                                        <label >Archivo de constancia de autorización para recibir donativos en formato PDF </label><br>
                                        <a href="/images/{{$regcontable->osc_d8}}" class="btn btn-danger" title="constancia de autorización para recibir donativos"><i class="fa fa-file-pdf-o"></i><small>PDF</small>
                                        </a>{{$regcontable->osc_d8}}
                                        <input type="hidden" name="doc_id8" id="doc_id8" value="14">
                                    @else
                                        <label >Archivo de constancia de autorización para recibir donativos en formato PDF </label><br>
                                        <b style="color:darkred;">** Pendiente **</b>
                                        <input type="hidden" name="doc_id8" id="doc_id8" value="14">
                                    @endif
                                </div>  
                                <div class="col-xs-4 form-group">
                                    <label >Formato del archivo  </label>
                                    <select class="form-control m-bot15" name="formato_id8" id="formato_id8" required>
                                        <option selected="true" disabled="disabled">Seleccionar formato del archivo </option>
                                        @foreach($regformatos as $formato)
                                            @if($formato->formato_id == $regcontable->formato_id8)
                                                <option value="{{$formato->formato_id}}" selected>{{$formato->formato_desc}}</option>
                                            @else 
                                               <option value="{{$formato->formato_id}}">{{$formato->formato_desc}}</option>
                                            @endif
                                        @endforeach
                                    </select>                                                    
                                </div>                                    
                            </div>

                            <div class="row">               
                                <div class="col-xs-4 form-group">
                                    @if(!empty($regcontable->osc_d9)||(!is_null($regcontable->osc_d9)))
                                        <label >Archivo de declaración anual en formato PDF </label><br>
                                        <a href="/images/{{$regcontable->osc_d9}}" class="btn btn-danger" title="declaración anual"><i class="fa fa-file-pdf-o"></i><small>PDF</small>
                                        </a>{{$regcontable->osc_d9}}
                                        <input type="hidden" name="doc_id9" id="doc_id9" value="13">
                                    @else
                                        <label >Archivo de declaración anual en formato PDF </label><br>
                                        <b style="color:darkred;">** Pendiente **</b>
                                        <input type="hidden" name="doc_id9" id="doc_id9" value="13">
                                    @endif
                                </div>  
                                <div class="col-xs-4 form-group">
                                    <label >Formato del archivo </label>
                                    <select class="form-control m-bot15" name="formato_id9" id="formato_id9" required>
                                        <option selected="true" disabled="disabled">Seleccionar formato del archivo </option>
                                        @foreach($regformatos as $formato)
                                            @if($formato->formato_id == $regcontable->formato_id9)
                                                <option value="{{$formato->formato_id}}" selected>{{$formato->formato_desc}}</option>
                                            @else 
                                               <option value="{{$formato->formato_id}}">{{$formato->formato_desc}}</option>
                                            @endif
                                        @endforeach
                                    </select>                                                    
                                </div>                                    
                            </div>

                            <div class="row">               
                                <div class="col-xs-6 form-group">
                                    @if(!empty($regcontable->osc_d10) || !is_null($regcontable->osc_d10))
                                        <label >Archivo de Comprobación deducibles de impuestos en formato PDF </label><br>
                                        <a href="/images/{{$regcontable->osc_d10}}" class="btn btn-danger" title="Archivo de Comprobación deducibles de impuestos "><i class="fa fa-file-pdf-o"></i><small>PDF</small>
                                        </a>{{$regcontable->osc_d10}}
                                        <input type="hidden" name="doc_id10" id="doc_id10" value="15">
                                    @else
                                        <label >Archivo de Comprobación deducibles de impuestos en formato PDF </label><br>
                                        <b style="color:darkred;">** Pendiente **</b>
                                        <input type="hidden" name="doc_id10" id="doc_id10" value="15">
                                    @endif
                                </div>  
                                <div class="col-xs-4 form-group">
                                    <label >Formato del archivo </label>
                                    <select class="form-control m-bot15" name="formato_id10" id="formato_id10" required>
                                        <option selected="true" disabled="disabled">Seleccionar formato del archivo </option>
                                        @foreach($regformatos as $formato)
                                            @if($formato->formato_id == $regcontable->formato_id10)
                                                <option value="{{$formato->formato_id}}" selected>{{$formato->formato_desc}}</option>
                                            @else 
                                               <option value="{{$formato->formato_id}}">{{$formato->formato_desc}}</option>
                                            @endif
                                        @endforeach
                                    </select>                                                    
                                </div>                                    
                            </div>

                            <div class="row">               
                                <div class="col-xs-6 form-group">
                                    @if(!empty($regcontable->osc_d11) || !is_null($regcontable->osc_d11))
                                        <label >Archivo de Apertura y/o edo. de cuenta en formato PDF </label><br>
                                        <a href="/images/{{$regcontable->osc_d11}}" class="btn btn-danger" title="Apertura de cuenta y/o estado de cuenta"><i class="fa fa-file-pdf-o"></i><small>PDF</small>
                                        </a>{{$regcontable->osc_d11}}
                                        <input type="hidden" name="doc_id11" id="doc_id11" value="15">
                                    @else
                                        <label >Archivo de Apertura y/o edo. de cuenta en formato PDF </label><br>
                                        <b style="color:darkred;">** Pendiente **</b>
                                        <input type="hidden" name="doc_id11" id="doc_id11" value="15">
                                    @endif
                                </div>  
                                <div class="col-xs-4 form-group">
                                    <label >Formato del archivo </label>
                                    <select class="form-control m-bot15" name="formato_id11" id="formato_id11" required>
                                        <option selected="true" disabled="disabled">Seleccionar formato del archivo </option>
                                        @foreach($regformatos as $formato)
                                            @if($formato->formato_id == $regcontable->formato_id11)
                                                <option value="{{$formato->formato_id}}" selected>{{$formato->formato_desc}}</option>
                                            @else 
                                               <option value="{{$formato->formato_id}}">{{$formato->formato_desc}}</option>
                                            @endif
                                        @endforeach
                                    </select>                                                    
                                </div>                                                                    
                            </div>  

                            <div class="row">
                                @if(count($errors) > 0)
                                    <div class="alert alert-danger" role="alert">
                                        <ul>
                                            @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif 
                                <div class="col-md-12 offset-md-5">
                                    {!! Form::submit('Guardar',['class' => 'btn btn-success btn-flat pull-right']) !!}
                                    <a href="{{route('verReqc')}}" role="button" id="cancelar" class="btn btn-danger">Cancelar
                                    </a>
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('request')
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\reqcontablesRequest','#actualizarReqc') !!}
@endsection

@section('javascrpt')
@endsection
