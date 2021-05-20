@extends('sicinar.principal')

@section('title','Programar nueva diligencia')

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
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Menú
                <small> Agenda de diligencias - Programar nueva diligencia</small>                
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-success">
                         
                        {!! Form::open(['route' => 'AltaNuevoProgdil', 'method' => 'POST','id' => 'nuevoProgdil', 'enctype' => 'multipart/form-data']) !!}
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-4 form-group">
                                    <label >Año </label>
                                    <select class="form-control m-bot15" name="periodo_id" id="periodo_id" required>
                                        <option selected="true" disabled="disabled">Seleccionar año</option>
                                        @foreach($regperiodos as $periodo)
                                            <option value="{{$periodo->periodo_id}}">{{$periodo->periodo_desc}}</option>
                                        @endforeach
                                    </select>                                    
                                </div>
                                <div class="col-xs-4 form-group">
                                    <label >Mes </label>
                                    <select class="form-control m-bot15" name="mes_id" id="mes_id" required>
                                        <option selected="true" disabled="disabled">Seleccionar mes</option>
                                        @foreach($regmeses as $mes)
                                            <option value="{{$mes->mes_id}}">{{$mes->mes_desc}}</option>
                                        @endforeach
                                    </select>                                    
                                </div>       
                            </div>                            

                            <div class="row">                                        
                                <div class="col-xs-4 form-group">
                                    <label >Dia </label>
                                    <select class="form-control m-bot15" name="dia_id" id="dia_id" required>
                                        <option selected="true" disabled="disabled">Seleccionar dia</option>
                                        @foreach($regdias as $dia)
                                            <option value="{{$dia->dia_id}}">{{$dia->dia_desc}}</option>
                                        @endforeach
                                    </select>                                    
                                </div>
                                <div class="col-xs-4 form-group">
                                    <label >Hora </label>
                                    <select class="form-control m-bot15" name="hora_id" id="hora_id" required>
                                        <option selected="true" disabled="disabled">Seleccionar hora</option>
                                        @foreach($reghoras as $hora)
                                            <option value="{{$hora->hora_id}}">{{$hora->hora_desc}}</option>
                                        @endforeach
                                    </select>                                    
                                </div>                                                                 
                            </div>                            

                            <div class="row">                                
                                <div class="col-xs-4 form-group">
                                    <label >OSC</label>
                                    <select class="form-control m-bot15" name="osc_id" id="osc_id" required>
                                        <option selected="true" disabled="disabled">Seleccionar OSC</option>
                                        @foreach($regosc as $osc)
                                            <option value="{{$osc->osc_id}}">{{$osc->osc_id.' '.$osc->osc_desc}}
                                            </option>
                                        @endforeach
                                    </select>                                  
                                </div>                                                                    
                                <div class="col-xs-4 form-group">
                                    <label >Domicilio a donde se va a realizar diligencia </label>
                                    <input type="text" class="form-control" name="visita_dom" id="visita_dom" placeholder="Domicilio de la osc a donde se va a realizar diligencia" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-4 form-group">
                                    <label >Nombre del contacto del personal de la OSC </label>
                                    <input type="text" class="form-control" name="visita_contacto" id="visita_contacto" placeholder="Nombre del contacto del personal de la OSC" required>
                                </div>                                                          
                                <div class="col-xs-4 form-group">
                                    <label >Entidad</label>
                                    <select class="form-control m-bot15" name="entidad_id" id="entidad_id" required>
                                        <option selected="true" disabled="disabled">Seleccionar entidad</option>
                                        @foreach($regentidades as $entidad)
                                            <option value="{{$entidad->entidadfederativa_id}}">{{$entidad->entidadfederativa_desc}}</option>
                                        @endforeach
                                    </select>                                  
                                </div>                                      
                                <div class="col-xs-4 form-group">
                                    <label >Municipio</label>
                                    <select class="form-control m-bot15" name="municipio_id" id="municipio_id" required>
                                        <option selected="true" disabled="disabled">Seleccionar municipio</option>
                                        @foreach($regmunicipio as $municipio)
                                            <option value="{{$municipio->municipioid}}">{{$municipio->entidadfederativa_desc.'-'.$municipio->municipionombre}}
                                            </option>
                                        @endforeach
                                    </select>                                  
                                </div>                                                  
                            </div>

                            <div class="row">                                                                
                                <div class="col-xs-4 form-group">
                                    <label >Responsable a realizar la diligencia </label>
                                    <input type="text" class="form-control" name="visita_auditor2" id="visita_auditor2" placeholder="Responsable a realizar la diligencia" required>
                                </div> 
                                <div class="col-xs-4 form-group">
                                    <label >Personal adicional asigando a la diligencia </label>
                                    <input type="text" class="form-control" name="visita_spub2" id="visita_spub2" placeholder="Personal de DGPS asigando a la diligencia" required>
                                </div>                                                          
                                                                  
                            </div>                            
                            <div class="row">                                                                
                                <div class="col-xs-4 form-group">
                                    <label >Secretario Ejecutivo de la DGPS </label>
                                    <input type="text" class="form-control" name="visita_auditor4" id="visita_auditor4" placeholder="Secretario Ejecutivo de la DGPS" required>
                                </div>                                                          
                                <div class="col-xs-4 form-group">
                                    <label >Servidor público que programa diligencia </label>
                                    <input type="text" class="form-control" name="visita_spub" id="visita_spub" placeholder="Servidor público que programa diligencia" required>
                                </div> 
                            </div>     

                            <div class="row">    
                                <div class="col-xs-6 form-group">
                                    <label >Tipo de diligencia arealizar </label>
                                    <br>
                                    <input type="radio" name="visita_tipo1" checked value="1" style="margin-right:8px;">
                                    Jurídica  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 
                                    <input type="radio" name="visita_tipo1" value="2" style="margin-right:8px;">
                                    Operación &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 
                                    <input type="radio" name="visita_tipo1" value="3" style="margin-right:8px;">
                                    Admon.    &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 
                                    <input type="radio" name="visita_tipo1" value="4" style="margin-right:8px;">
                                    General
                                </div>  
                            </div>                         

                            <div class="row">
                                <div class="col-xs-12 form-group">
                                    <label >Objetivo de la diligencia parte 1 (4,000 caracteres) </label>
                                    <textarea class="form-control" name="visita_obj" id="visita_obj" rows="6" cols="120" placeholder="Objetivo de la diligencia parte 1 (4,000 caráteres)" required>
                                    </textarea>
                                </div>                                
                            </div>

                            <div class="row">
                                <div class="col-xs-12 form-group">
                                    <label >Objetivo de la diligencia parte 2 (4,000 caracteres) </label>
                                    <textarea class="form-control" name="visita_obs3" id="visita_obs3" rows="6" cols="120" placeholder="Objetivo de la diligencia parte 2 (4,000 caráteres)" required>
                                    </textarea>
                                </div>                                
                            </div>                            

                            <div class="row">
                                <div class="col-md-12 offset-md-5">
                                    {!! Form::submit('Dar de alta',['class' => 'btn btn-success btn-flat pull-right']) !!}
                                    <a href="{{route('verProgdil')}}" role="button" id="cancelar" class="btn btn-danger">Cancelar</a>
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
    {!! JsValidator::formRequest('App\Http\Requests\progdilRequest','#nuevoProgdil') !!}
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
       letras = "abcdefghijklmnñopqrstuvwxyz ABCDEFGHIJKLMNÑOPQRSTUVWXYZ1234567890,.;:-_<>!%()=?¡¿/*+";
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

<script>
    $('.datepicker').datepicker({
        format: "dd/mm/yyyy",
        startDate: '-29y',
        endDate: '-18y',
        startView: 2,
        maxViewMode: 2,
        clearBtn: true,        
        language: "es",
        autoclose: true
    });
</script>

@endsection