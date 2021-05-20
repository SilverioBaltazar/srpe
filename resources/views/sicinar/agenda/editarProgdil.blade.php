@extends('sicinar.principal')

@section('title','Editar Agenda de diligiencia programada')

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
            <h1>
                Menú
                <small> Agenda de diligencias - Programar diligencia</small>
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-success">

                        {!! Form::open(['route' => ['actualizarProgdil',$regprogdil->visita_folio], 'method' => 'PUT', 'id' => 'actualizarProgdil', 'enctype' => 'multipart/form-data']) !!}
                        <div class="box-body">

                            <div class="row">
                                <div class="col-xs-4 form-group">
                                    <label >Año </label>
                                    <select class="form-control m-bot15" name="periodo_id" id="periodo_id" required>
                                        <option selected="true" disabled="disabled">Seleccionar año </option>
                                        @foreach($regperiodos as $periodo)
                                            @if($periodo->periodo_id == $regprogdil->periodo_id)
                                                <option value="{{$periodo->periodo_id}}" selected>{{$periodo->periodo_desc}}</option>
                                            @else                                        
                                               <option value="{{$periodo->periodo_id}}">{{$periodo->periodo_desc}} 
                                               </option>
                                            @endif
                                        @endforeach
                                    </select>                                    
                                </div>   
                                <div class="col-xs-4 form-group">
                                    <label >Mes </label>
                                    <select class="form-control m-bot15" name="mes_id" id="mes_id" required>
                                        <option selected="true" disabled="disabled">Seleccionar mes </option>
                                        @foreach($regmeses as $mes)
                                            @if($mes->mes_id == $regprogdil->mes_id)
                                                <option value="{{$mes->mes_id}}" selected>{{$mes->mes_desc}}</option>
                                            @else                                        
                                               <option value="{{$mes->mes_id}}">{{$mes->mes_desc}} </option>
                                            @endif
                                        @endforeach
                                    </select>                                    
                                </div>   
                                <div class="col-xs-2 form-group" style="color:green;font-size:12px; text-align:right; vertical-align: middle;">
                                    <label ><b>Folio <br> {{Trim($regprogdil->visita_folio)}}</label></b>
                                </div>                                                                        
                           </div>                            

                            <div class="row">
                                <div class="col-xs-4 form-group">
                                    <label >Dia </label>
                                    <select class="form-control m-bot15" name="dia_id" id="dia_id" required>
                                        <option selected="true" disabled="disabled">Seleccionar dia </option>
                                        @foreach($regdias as $dia)
                                            @if($dia->dia_id == $regprogdil->dia_id)
                                                <option value="{{$dia->dia_id}}" selected>{{$dia->dia_desc}}</option>
                                            @else                                        
                                               <option value="{{$dia->dia_id}}">{{$dia->dia_desc}} </option>
                                            @endif
                                        @endforeach
                                    </select>                                    
                                </div>   
                                <div class="col-xs-4 form-group">
                                    <label >Hora </label>
                                    <select class="form-control m-bot15" name="hora_id" id="hora_id" required>
                                        <option selected="true" disabled="disabled">Seleccionar hora </option>
                                        @foreach($reghoras as $hora)
                                            @if($hora->hora_id == $regprogdil->hora_id)
                                                <option value="{{$hora->hora_id}}" selected>{{$hora->hora_desc}}</option>
                                            @else                                        
                                               <option value="{{$hora->hora_id}}">{{$hora->hora_desc}} </option>
                                            @endif
                                        @endforeach
                                    </select>                                    
                                </div>   
                           </div>         

                            <div class="row">    
                                <div class="col-xs-4 form-group">
                                    <label >OSC </label>
                                    <select class="form-control m-bot15" name="osc_id" id="osc_id" required>
                                        <option selected="true" disabled="disabled">Seleccionar OSC </option>
                                        @foreach($regosc as $osc)
                                            @if($osc->osc_id == $regprogdil->osc_id)
                                                <option value="{{$osc->osc_id}}" selected>{{$osc->osc_id.' '.$osc->osc_desc}}</option>
                                            @else                                        
                                                <option value="{{$osc->osc_id}}">{{$osc->osc_desc}} </option>
                                            @endif
                                        @endforeach
                                    </select>                                    
                                </div> 
                                <div class="col-xs-4 form-group">
                                    <label >Domicilio </label>
                                    <input type="text" class="form-control" name="visita_dom" id="visita_dom" placeholder="Domicilio a donde va aser la diligencia" value="{{Trim($regprogdil->visita_dom)}}" required>
                                </div>                
                            </div>

                            <div class="row">
                                <div class="col-xs-4 form-group">
                                    <label >Nombre del contacto del personal de la OSC</label>
                                    <input type="text" class="form-control" name="visita_contacto" id="visita_contacto" placeholder="Nombre del contacto del personal de la OSC" value="{{Trim($regprogdil->visita_contacto)}}" required>
                                </div>                                
                                <div class="col-xs-4 form-group">
                                    <label >Entidad </label>
                                    <select class="form-control m-bot15" name="entidad_id" id="entidad_id" required>
                                        <option selected="true" disabled="disabled">Seleccionar entidad</option>
                                        @foreach($regentidades as $entidad)
                                            @if($entidad->entidadfederativa_id == $regprogdil->entidad_id)
                                                <option value="{{$entidad->entidadfederativa_id}}" selected>{{$entidad->entidadfederativa_desc}}</option>
                                            @else 
                                                <option value="{{$entidad->entidadfederativa_id}}">{{$entidad->entidadfederativa_desc}}</option>
                                            @endif
                                        @endforeach
                                    </select>                                  
                                </div>                  
                                <div class="col-xs-4 form-group">
                                    <label >Municipio</label>
                                    <select class="form-control m-bot15" name="municipio_id" id="municipio_id" required>
                                        <option selected="true" disabled="disabled">Seleccionar municipio</option>
                                        @foreach($regmunicipio as $municipio)
                                            @if($municipio->municipioid == $regprogdil->municipio_id)
                                                <option value="{{$municipio->municipioid}}" selected>{{$municipio->entidadfederativa_desc.'-'.$municipio->municipionombre}}</option>
                                            @else 
                                               <option value="{{$municipio->municipioid}}">{{$municipio->entidadfederativa_desc.'-'.$municipio->municipionombre}}
                                               </option>
                                            @endif
                                        @endforeach
                                    </select>                                  
                                </div>                                                                    
                            </div>

                            <div class="row">
                               <div class="col-xs-4 form-group">
                                    <label >Responsable a realizar la diligencia</label>
                                    <input type="text" class="form-control" name="visita_auditor2" id="visita_auditor2" placeholder="Responsable a realizar la diligencia" value="{{$regprogdil->visita_auditor2}}" required>
                                </div>                                 
                                <div class="col-xs-4 form-group">
                                    <label >Personal adicional asigando a la diligencia </label>
                                    <input type="text" class="form-control" name="visita_spub2" id="visita_spub2" placeholder="Personal adicional aignado a la diligencia" value="{{Trim($regprogdil->visita_spub2)}}" required>
                                </div>
                                
                            </div>

                            <div class="row">     
                                <div class="col-xs-4 form-group">
                                    <label >Secretario Ejecutivo de la DGPS </label>
                                    <input type="text" class="form-control" name="visita_auditor4" id="visita_auditor4" placeholder="Secretario Ejecutivo del DGPS" value="{{Trim($regprogdil->visita_auditor4)}}" required>
                                </div>  
                                <div class="col-xs-4 form-group">
                                    <label >Servidor público que programa diligencia </label>
                                    <input type="text" class="form-control" name="visita_spub" id="visita_spub" placeholder="Servidor público que programa diligencia" value="{{Trim($regprogdil->visita_spub)}}" required>
                                </div>
                            </div>

                            <div class="row">  
                                <div class="col-xs-4 form-group">                        
                                    <label>Tipo de diligencia arealizar </label>
                                    <select class="form-control m-bot15" name="visita_tipo1" required>
                                        @if($regprogdil->visita_tipo1 == '1')
                                            <option value="1" selected>Jurídica      </option>
                                            <option value="2"         >Operación     </option>
                                            <option value="3"         >Administrativa</option>
                                            <option value="4"         >General       </option>
                                        @else
                                            @if($regprogdil->visita_tipo1 == '2')
                                                <option value="1"         >Jurídica      </option>
                                                <option value="2" selected>Operación     </option>
                                                <option value="3"         >Administrativa</option>
                                                <option value="4"         >General       </option>
                                            @else
                                                @if($regprogdil->visita_tipo1 == '3')
                                                    <option value="1"         >Jurídica      </option>
                                                    <option value="2"         >Operación     </option>
                                                    <option value="3" selected>Administrativa</option>
                                                    <option value="4"         >General       </option>
                                                @else                                            
                                                  <option value="1"         >Jurídica      </option>
                                                  <option value="2"         >Operación     </option>
                                                  <option value="3"         >Administrativa</option>
                                                  <option value="4" selected>General       </option>
                                                @endif
                                            @endif
                                        @endif
                                    </select>                                
                                </div>       
                                <div class="col-xs-4 form-group">                        
                                    <label>Estado de la diligencia </label>
                                    <select class="form-control m-bot15" name="visita_edo" required>
                                        @if($regprogdil->visita_edo == '1')
                                            <option value="0"         >En proceso</option>
                                            <option value="1" selected>Cerrada   </option>
                                            <option value="2"         >Cancelada </option>
                                        @else
                                            @if($regprogdil->visita_edo == '2')
                                               <option value="0"         >En proceso</option>
                                               <option value="1"         >Cerrada   </option>
                                               <option value="2" selected>Cancelada </option>
                                            @else
                                               <option value="0" selected>En proceso</option>
                                               <option value="1"         >Cerrada   </option>
                                               <option value="2"         >Cancelada </option>
                                            @endif
                                        @endif
                                    </select>
                                </div>                                                                  
                            </div>

                            <div class="row">                                
                                <div class="col-xs-12 form-group">
                                    <label >Objetivo de la diligencia parte 1 (4,000 caracteres)</label>
                                    <textarea class="form-control" name="visita_obj" id="visita_obj" rows="6" cols="120" placeholder="Objetivo de la diligencia parte 1 (4,000 carácteres)" required>{{Trim($regprogdil->visita_obj)}}
                                    </textarea>
                                </div>                                
                            </div>

                            <div class="row">
                                <div class="col-xs-12 form-group">
                                    <label >Objetivo de la diligencia parte 2 (4,000 caracteres) </label>
                                    <textarea class="form-control" name="visita_obs3" id="visita_obs3" rows="6" cols="120" placeholder="Objetivo de la diligencia parte 2 (4,000 caráteres)" required>{{Trim($regprogdil->visita_obs3)}}
                                    </textarea>
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
    {!! JsValidator::formRequest('App\Http\Requests\progdilRequest','#actualizarProgdil') !!}
@endsection

@section('javascrpt')
@endsection