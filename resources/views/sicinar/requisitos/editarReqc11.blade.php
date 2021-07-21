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
                <small>4. Requisitos admon. - Editar</small>
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-success">

                        {!! Form::open(['route' => ['actualizarReqc11',$regcontable->osc_folio], 'method' => 'PUT', 'id' => 'actualizarReqc11', 'enctype' => 'multipart/form-data']) !!}
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-4 form-group">
                                    <input type="hidden" name="periodo_id" id="periodo_id" value="{{$regcontable->periodo_id}}">                                
                                    <label>Periodo fiscal </label><br>
                                    <label style="color:green;">{{$regcontable->periodo_id}}</label>
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
                                    <label>Folio </label><br><label style="color:green;">{{$regcontable->osc_folio}}</label>
                                </div>                                                                                                                            
                            </div>

                            <div class="row">
                                <div class="col-xs-12 form-group">
                                    <label style="background-color:yellow;color:red"><b>Nota importante:</b>&nbsp;&nbsp;El archivo digital, NO deberá ser mayor a 1,500 kBytes en tamaño.  </label>
                                </div>   
                            </div>  
                            <div class="row">
                                @if (!empty($regcontable->osc_d11)||!is_null($regcontable->osc_d11))   
                                    <div class="col-xs-4 form-group">
                                        <label >Archivo digital de Apertura y/o edo. de cuenta en formato PDF</label><br>
                                        <label ><a href="/images/{{$regcontable->osc_d11}}" class="btn btn-danger" title="Apertura y/o edo. de cuenta en formato PDF"><i class="fa fa-file-pdf-o"></i>PDF
                                        </a>&nbsp;&nbsp;&nbsp;{{$regcontable->osc_d11}}
                                        </label>
                                        <input type="hidden" name="doc_id11" id="doc_id11" value="15">
                                    </div>   
                                    <div class="col-xs-4 form-group">
                                        <label >Apertura y/o edo. de cuenta en formato PDF</label>
                                        <input type="file" class="text-md-center" style="color:red" name="osc_d11" id="osc_d11" placeholder="Subir archivo digital de Apertura y/o edo. de cuenta en formato PDF" >
                                    </div>      
                                @else     <!-- se captura archivo 1 -->
                                    <div class="col-xs-4 form-group">
                                        <label >Apertura y/o edo. de cuenta en formato PDF</label>
                                        <input type="file" class="text-md-center" style="color:red" name="osc_d11" id="osc_d11" placeholder="Subir archivo digital de Apertura y/o edo. de cuenta en formato PDF" >
                                        <input type="hidden" name="doc_id11" id="doc_id11" value="15">
                                    </div>                                                
                                @endif 
                                <div class="col-xs-3 form-group">
                                    <label >Formato del archivo digital </label>
                                    <select class="form-control m-bot15" name="formato_id11" id="formato_id11" required>
                                        <option selected="true" disabled="disabled">Seleccionar formato del archivo</option>
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
                                    <a href="{{route('verReqc')}}" role="button" id="cancelar" class="btn btn-danger">Cancelar</a>
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
    {!! JsValidator::formRequest('App\Http\Requests\reqcontablesRequest','#actualizarRec11') !!}
@endsection

@section('javascrpt')
@endsection
