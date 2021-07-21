@extends('sicinar.principal')

@section('title','Editar requisitos operativos')

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
                <small>3. Requisitos operativos - Editar</small>
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-success">

                        {!! Form::open(['route' => ['actualizarReqop1',$regoperativo->osc_folio], 'method' => 'PUT', 'id' => 'actualizarReqop1', 'enctype' => 'multipart/form-data']) !!}
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-4 form-group">
                                    <input type="hidden" name="periodo_id" id="periodo_id" value="{{$regoperativo->periodo_id}}">                                
                                    <label>Periodo fiscal </label><br>
                                        <label label style="color:green;">{{$regoperativo->periodo_id}}</label>
                                </div>                                   
                                <div class="col-xs-6 form-group">
                                    <input type="hidden" name="osc_id" id="osc_id" value="{{$regoperativo->osc_id}}">
                                    <label>OSC &nbsp;&nbsp;&nbsp; </label><br>
                                    @foreach($regosc as $osc)
                                        @if($osc->osc_id == $regoperativo->osc_id)
                                            <label style="color:green;">{{$regoperativo->osc_id.' '.$osc->osc_desc}}</label>
                                            @break
                                        @endif
                                    @endforeach
                                </div>  
                                <div class="col-xs-2 form-group">
                                    <label>Folio </label><br><label style="color:green;">{{$regoperativo->osc_folio}}</label>
                                </div>                                                                                                                            
                            </div>

                            <div class="row">
                                <div class="col-xs-12 form-group">
                                    <label style="background-color:yellow;color:red"><b>Nota importante:</b>&nbsp;&nbsp;El archivo digital, NO deberá ser mayor a 1,500 kBytes en tamaño.  </label>
                                </div>   
                            </div>  
                            <div class="row">
                                @if (!empty($regoperativo->osc_d1)||!is_null($regoperativo->osc_d1))   
                                    <div class="col-xs-4 form-group">
                                        <label >Archivo de Padrón de beneficiarios en formato PDF </label><br>
                                        <label ><a href="/images/{{$regoperativo->osc_d1}}" class="btn btn-danger" title="Padrón de beneficiarios en formato PDF"><i class="fa fa-file-pdf-o"></i>PDF
                                        </a>&nbsp;&nbsp;&nbsp;{{$regoperativo->osc_d1}}
                                        </label>
                                        <input type="hidden" name="doc_id1" id="doc_id1" value="16">
                                    </div>   
                                    <div class="col-xs-4 form-group">
                                        <label >Actualizar archivo de Padrón de beneficiarios en formato PDF </label>
                                        <input type="file" class="text-md-center" style="color:red" name="osc_d1" id="osc_d1" placeholder="Subir archivo de Padrón de beneficiarios en formato PDF " >
                                    </div>      
                                @else     <!-- se captura archivo 1 -->
                                    <div class="col-xs-4 form-group">
                                        <label >Archivo de Padrón de beneficiarios en formato PDF</label>
                                        <input type="file" class="text-md-center" style="color:red" name="osc_d1" id="osc_d1" placeholder="Subir archivo de Padrón de beneficiarios en formato PDF" >
                                        <input type="hidden" name="doc_id1" id="doc_id1" value="16">
                                    </div>                                                
                                @endif 
                                <div class="col-xs-3 form-group">
                                    <label >Formato del archivo que se subio </label>
                                    <select class="form-control m-bot15" name="formato_id1" id="formato_id1" required>
                                        <option selected="true" disabled="disabled">Seleccionar formato del archivo</option>
                                        @foreach($regformatos as $formato)
                                            @if($formato->formato_id == $regoperativo->formato_id1)
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
                                    <a href="{{route('verReqop')}}" role="button" id="cancelar" class="btn btn-danger">Cancelar</a>
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
        {!! JsValidator::formRequest('App\Http\Requests\reqoperativosRequest','#actualizarReqop1') !!}
@endsection

@section('javascrpt')
@endsection
