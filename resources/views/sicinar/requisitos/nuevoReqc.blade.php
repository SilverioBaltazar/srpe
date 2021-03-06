@extends('sicinar.principal')

@section('title','Registro de requisitos admon.')

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
            <h1>Menú
                <small>Requisitos admon. - Otros requisitos - Nuevo </small>
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12"> 
                    <div class="box box-success">

                        {!! Form::open(['route' => 'AltaNuevoReqc', 'method' => 'POST','id' => 'nuevoReqc', 'enctype' => 'multipart/form-data']) !!}

                        <div class="box-body">
                            <div class="row">                                
                                <div class="col-xs-6 form-group">
                                    <label >OSC</label>
                                    <select class="form-control m-bot15" name="osc_id" id="osc_id" required>
                                        <option selected="true" disabled="disabled">Seleccionar OSC</option>
                                        @foreach($regosc as $osc)
                                            <option value="{{$osc->osc_id}}">{{$osc->osc_id.' '.$osc->osc_desc}}</option>
                                        @endforeach 
                                    </select>                                    
                                </div>   
                                <div class="col-xs-4 form-group">
                                    <label >Periodo fiscal de los requisitos a cumplir</label>
                                    <select class="form-control m-bot15" name="periodo_id" id="periodo_id" required>
                                        <option selected="true" disabled="disabled">Seleccionar periodo fiscal</option>
                                        @foreach($regperiodos as $periodo)
                                            <option value="{{$periodo->periodo_id}}">{{$periodo->periodo_desc}}</option>
                                        @endforeach
                                    </select>                                    
                                </div>                                                               
                            </div>     

                            <div class="row">
                                <div class="col-xs-12 form-group">
                                    <label style="background-color:yellow;color:red"><b>Nota importante:</b>&nbsp;&nbsp;Los archivos digitales, NO deberán ser mayores a 1,500 kBytes en tamaño.  </label>
                                </div>   
                            </div>  
                            <div class="row">               
                                <div class="col-xs-6 form-group">
                                    <label >Archivo de Presupuesto anual en formato Excel </label>
                                    <input type="hidden" name="doc_id7" id="doc_id7" value="16">
                                    <input type="file" class="text-md-center" style="color:red" name="osc_d7" id="osc_d7" placeholder="Subir archivo de Presupuesto anual en formato Excel">
                                </div>   
                                <div class="col-xs-4 form-group">
                                    <label >Formato del archivo digital </label>
                                    <select class="form-control m-bot15" name="formato_id7" id="formato_id7" required>
                                        <option selected="true" disabled="disabled">Seleccionar formato del archivo</option>
                                        @foreach($regformatos as $formato)
                                            <option value="{{$formato->formato_id}}">{{$formato->formato_desc}}</option>
                                        @endforeach
                                    </select>                                    
                                </div>                                         
                            </div>    

                            <div class="row">               
                                <div class="col-xs-6 form-group">
                                    <label >Archivo de Constancia de cumplimiento para recibir donativos en formato PDF </label>
                                    <input type="hidden" name="doc_id8" id="doc_id8" value="14">
                                    <input type="file" class="text-md-center" style="color:red" name="osc_d8" id="osc_d8" placeholder="Subir archivo de Constancia de cumplimiento para recibir donativos en formato PDF">
                                </div>   
                                <div class="col-xs-4 form-group">
                                    <label >Formato del archivo a subir </label>
                                    <select class="form-control m-bot15" name="formato_id8" id="formato_id8" required>
                                        <option selected="true" disabled="disabled">Seleccionar formato del archivo a subir</option>
                                        @foreach($regformatos as $formato)
                                            <option value="{{$formato->formato_id}}">{{$formato->formato_desc}}</option>
                                        @endforeach
                                    </select>                                    
                                </div>         
                            </div> 

                            <div class="row">               
                                <div class="col-xs-6 form-group">
                                    <label >Archivo de Declaración anual en formato PDF </label>
                                    <input type="hidden" name="doc_id9" id="doc_id9" value="13">
                                    <input type="file" class="text-md-center" style="color:red" name="osc_d9" id="osc_d9" placeholder="Subir archivo de Declaración anual en formato PDF">
                                </div>   
                                <div class="col-xs-4 form-group">
                                    <label >Formato del archivo a subir </label>
                                    <select class="form-control m-bot15" name="formato_id9" id="formato_id9" required>
                                        <option selected="true" disabled="disabled">Seleccionar formato del archivo a subir</option>
                                        @foreach($regformatos as $formato)
                                            <option value="{{$formato->formato_id}}">{{$formato->formato_desc}}</option>
                                        @endforeach
                                    </select>                                    
                                </div>         
                            </div> 
                         

                            <div class="row">               
                                <div class="col-xs-6 form-group">
                                    <label >Archivo de Comprobación deducibles de impuestos en formato PDF </label>
                                    <input type="hidden" name="doc_id10" id="doc_id10" value="15">
                                    <input type="file" class="text-md-center" style="color:red" name="osc_d10" id="osc_d10" placeholder="Subir archivo de Comprobación deducibles de impuestos en formato PDF">
                                </div>   
                                <div class="col-xs-4 form-group">
                                    <label >Formato del archivo a subir </label>
                                    <select class="form-control m-bot15" name="formato_id10" id="formato_id10" required>
                                        <option selected="true" disabled="disabled">Seleccionar formato del archivo a subir</option>
                                        @foreach($regformatos as $formato)
                                            <option value="{{$formato->formato_id}}">{{$formato->formato_desc}}</option>
                                        @endforeach
                                    </select>                                    
                                </div>                                         
                            </div>        

                            <div class="row">                
                                <div class="col-xs-6 form-group">
                                    <label >Archivo de Apertura y/o edo. de cuenta en formato PDF </label>
                                    <input type="hidden" name="doc_id11" id="doc_id11" value="15">
                                    <input type="file" class="text-md-center" style="color:red" name="osc_d11" id="osc_d11" placeholder="Subir archivo de Apertura de cuenta y/o estado de cuenta en formato PDF">
                                </div>   
                                <div class="col-xs-4 form-group">
                                    <label >Formato del archivo a subir </label>
                                    <select class="form-control m-bot15" name="formato_id11" id="formato_id11" required>
                                        <option selected="true" disabled="disabled">Seleccionar formato del archivo a subir</option>
                                        @foreach($regformatos as $formato)
                                            <option value="{{$formato->formato_id}}">{{$formato->formato_desc}}</option>
                                        @endforeach
                                    </select>                                    
                                </div>                                                                         
                            </div> 

                            <div class="row">
                                <div class="col-md-6 offset-md-5">
                                    {!! Form::submit('Registrar',['class' => 'btn btn-success btn-flat pull-right']) !!}
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
    {!! JsValidator::formRequest('App\Http\Requests\reqcontablesRequest','#nuevoReqc') !!}
@endsection

@section('javascrpt')
<script>
  function soloAlfa(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key);
       letras = "abcdefghijklmnñopqrstuvwxyz ABCDEFGHIJKLMNÑOPQRSTUVWXYZ.";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }
        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }

    function general(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key);
       letras = "abcdefghijklmnñopqrstuvwxyz ABCDEFGHIJKLMNÑOPQRSTUVWXYZ634567890,.;:-_<>!%()=?¡¿/*+";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }
        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }
</script>
@endsection
