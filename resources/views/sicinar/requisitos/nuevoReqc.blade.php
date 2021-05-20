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
                                <div class="col-xs-4 form-group">
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
                                <div class="col-xs-4 form-group">
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
                                <div class="col-xs-4 form-group">
                                    <label >$ Ingreso estimado  </label>
                                    <input type="number" min="0" max="999999999999.99" class="form-control" name="preg_003" id="preg_003" placeholder="999999999999.99" required>
                                </div>                                                          
                                <div class="col-xs-4 form-group">
                                    <label >$ Egreso estimado </label>
                                    <input type="number" min="0" max="999999999999.99" class="form-control" name="preg_004" id="preg_004" placeholder="999999999999.99" required>
                                </div>
                                <div class="col-xs-4 form-group">
                                    <label >$ Inversiones proyectadas </label>
                                    <input type="number" min="0" max="999999999999.99" class="form-control" name="preg_005" id="preg_005" placeholder="999999999999.99" required>
                                </div>                                   
                            </div>                                         

                            <div class="row">               
                                <div class="col-xs-4 form-group">
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
                                <div class="col-xs-4 form-group">
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
                        

                            <div class="box box-success">
                            <div class="row">               
                                  <div class="col-xs-12 form-group">
                                    <label > *** Quotas de 5 al millar en formato PDF ***</label><br>
                                    <label style="background-color:yellow;color:red"><b>Nota importante:</b>&nbsp;&nbsp;Los archivos digitales, NO deberán ser mayores a 1,500 kBytes en tamaño.  </label>
                                </div>                                                                      
                            </div>
                            <div class="row">               
                                <div class="col-xs-4 form-group">
                                    <label >Enero - Archivo en formato PDF </label>
                                    <input type="hidden" name="doc_id10" id="doc_id10" value="15">
                                    <input type="file" class="text-md-center" style="color:red" name="osc_d10" id="osc_d10" placeholder="Subir archivo de Enero quotas de 5 al millar en formato PDF">
                                </div>   
                                <div class="col-xs-4 form-group">
                                    <label >Enero-Monto de la aportación monetaria </label>
                                    <input type="number" min="0" max="999999999999.99" class="form-control" name="preg_006" id="preg_006" placeholder="999999999999.99" required>
                                </div>                                                          
                            </div>        

                            <div class="row">               
                                <div class="col-xs-4 form-group">
                                    <label >Febrero - Archivo en formato PDF </label>
                                    <input type="hidden" name="doc_id1002" id="doc_id1002" value="15">
                                    <input type="file" class="text-md-center" style="color:red" name="osc_d1002" id="osc_d1002" placeholder="Subir archivo de Febrero quotas de 5 al millar en formato PDF">
                                </div>   
                                <div class="col-xs-4 form-group">
                                    <label >Febrero-Monto de la aportación monetaria </label>
                                    <input type="number" min="0" max="999999999999.99" class="form-control" name="preg_1002" id="preg_1002" placeholder="999999999999.99" required>
                                </div>                                                          
                            </div> 
                            <div class="row">               
                                <div class="col-xs-4 form-group">
                                    <label >Marzo - Archivo en formato PDF </label>
                                    <input type="hidden" name="doc_id1003" id="doc_id1003" value="15">
                                    <input type="file" class="text-md-center" style="color:red" name="osc_d1003" id="osc_d1003" placeholder="Subir archivo de Marzo quotas de 5 al millar en formato PDF">
                                </div>   
                                <div class="col-xs-4 form-group">
                                    <label >Marzo-Monto de la aportación monetaria </label>
                                    <input type="number" min="0" max="999999999999.99" class="form-control" name="preg_1003" id="preg_1003" placeholder="999999999999.99" required>
                                </div>                                                          
                            </div> 

                            <div class="row">               
                                <div class="col-xs-4 form-group">
                                    <label >Abril - Archivo en formato PDF </label>
                                    <input type="hidden" name="doc_id1004" id="doc_id1004" value="15">
                                    <input type="file" class="text-md-center" style="color:red" name="osc_d1004" id="osc_d1004" placeholder="Subir archivo de abril quotas de 5 al millar en formato PDF">
                                </div>   
                                <div class="col-xs-4 form-group">
                                    <label >Abril-Monto de la aportación monetaria </label>
                                    <input type="number" min="0" max="999999999999.99" class="form-control" name="preg_1004" id="preg_1004" placeholder="999999999999.99" required>
                                </div>                                                          
                            </div> 
                            <div class="row">               
                                <div class="col-xs-4 form-group">
                                    <label >Mayo - Archivo formato PDF </label>
                                    <input type="hidden" name="doc_id1005" id="doc_id1005" value="15">
                                    <input type="file" class="text-md-center" style="color:red" name="osc_d1005" id="osc_d1005" placeholder="Subir archivo de Mayo quotas de 5 al millar en formato PDF">
                                </div>   
                                <div class="col-xs-4 form-group">
                                    <label >Mayo-Monto de la aportación monetaria </label>
                                    <input type="number" min="0" max="999999999999.99" class="form-control" name="preg_1005" id="preg_1005" placeholder="999999999999.99" required>
                                </div>                                                          
                            </div> 
                            <div class="row">               
                                <div class="col-xs-4 form-group">
                                    <label >Junio - Archivo en formato PDF </label>
                                    <input type="hidden" name="doc_id1006" id="doc_id1006" value="15">
                                    <input type="file" class="text-md-center" style="color:red" name="osc_d1006" id="osc_d1006" placeholder="Subir archivo de Junio quotas de 5 al millar en formato PDF">
                                </div>   
                                <div class="col-xs-4 form-group">
                                    <label >Junio-Monto de la aportación monetaria </label>
                                    <input type="number" min="0" max="999999999999.99" class="form-control" name="preg_1006" id="preg_1006" placeholder="999999999999.99" required>
                                </div>                                                          
                            </div>

                            <div class="row">               
                                <div class="col-xs-4 form-group">
                                    <label >Julio - Archivo en formato PDF </label>
                                    <input type="hidden" name="doc_id1007" id="doc_id1007" value="15">
                                    <input type="file" class="text-md-center" style="color:red" name="osc_d1007" id="osc_d1007" placeholder="Subir archivo de julio quotas de 5 al millar en formato PDF">
                                </div>   
                                <div class="col-xs-4 form-group">
                                    <label >Julio-Monto de la aportación monetaria </label>
                                    <input type="number" min="0" max="999999999999.99" class="form-control" name="preg_1007" id="preg_1007" placeholder="999999999999.99" required>
                                </div>                                                          
                            </div> 
                            <div class="row">               
                                <div class="col-xs-4 form-group">
                                    <label >Agosto - Archivo en formato PDF </label>
                                    <input type="hidden" name="doc_id1008" id="doc_id1008" value="15">
                                    <input type="file" class="text-md-center" style="color:red" name="osc_d1008" id="osc_d1008" placeholder="Subir archivo de agosto quotas de 5 al millar en formato PDF">
                                </div>   
                                <div class="col-xs-4 form-group">
                                    <label >Agosto-Monto de la aportación monetaria </label>
                                    <input type="number" min="0" max="999999999999.99" class="form-control" name="preg_1008" id="preg_1008" placeholder="999999999999.99" required>
                                </div>                                                          
                            </div> 
                            <div class="row">               
                                <div class="col-xs-4 form-group">
                                    <label >Septiembre - Archivo en formato PDF </label>
                                    <input type="hidden" name="doc_id1009" id="doc_id1009" value="15">
                                    <input type="file" class="text-md-center" style="color:red" name="osc_d1009" id="osc_d1009" placeholder="Subir archivo de septiembre quotas de 5 al millar en formato PDF">
                                </div>   
                                <div class="col-xs-4 form-group">
                                    <label >Septiembre-Monto de la aportación monetaria </label>
                                    <input type="number" min="0" max="999999999999.99" class="form-control" name="preg_1009" id="preg_1009" placeholder="999999999999.99" required>
                                </div>                                                          
                            </div>

                            <div class="row">               
                                <div class="col-xs-4 form-group">
                                    <label >Octubre - Archivo en formato PDF </label>
                                    <input type="hidden" name="doc_id1010" id="doc_id1010" value="15">
                                    <input type="file" class="text-md-center" style="color:red" name="osc_d1010" id="osc_d1010" placeholder="Subir archivo de octubre quotas de 5 al millar en formato PDF">
                                </div>   
                                <div class="col-xs-4 form-group">
                                    <label >Octubre-Monto de la aportación monetaria </label>
                                    <input type="number" min="0" max="999999999999.99" class="form-control" name="preg_1010" id="preg_1010" placeholder="999999999999.99" required>
                                </div>                                                          
                            </div> 
                            <div class="row">               
                                <div class="col-xs-4 form-group">
                                    <label >Noviembre - Archivo en formato PDF </label>
                                    <input type="hidden" name="doc_id1011" id="doc_id1011" value="15">
                                    <input type="file" class="text-md-center" style="color:red" name="osc_d1011" id="osc_d1011" placeholder="Subir archivo de noviembre quotas de 5 al millar en formato PDF">
                                </div>   
                                <div class="col-xs-4 form-group">
                                    <label >Noviembre-Monto de la aportación monetaria </label>
                                    <input type="number" min="0" max="999999999999.99" class="form-control" name="preg_1011" id="preg_1011" placeholder="999999999999.99" required>
                                </div>                                                          
                            </div> 
                            <div class="row">               
                                <div class="col-xs-4 form-group">
                                    <label >Diciembre - Archivo en formato PDF </label>
                                    <input type="hidden" name="doc_id1012" id="doc_id1012" value="15">
                                    <input type="file" class="text-md-center" style="color:red" name="osc_d1012" id="osc_d1012" placeholder="Subir archivo de diciembre quotas de 5 al millar en formato PDF">
                                </div>   
                                <div class="col-xs-4 form-group">
                                    <label >Diciembre-Monto de la aportación monetaria </label>
                                    <input type="number" min="0" max="999999999999.99" class="form-control" name="preg_1012" id="preg_1012" placeholder="999999999999.99" required>
                                </div>                                                          
                            </div>                            
                            </div>

                            <div class="row">
                                <div class="col-md-6 offset-md-5">
                                    {!! Form::submit('Registrar otros requisitos',['class' => 'btn btn-success btn-flat pull-right']) !!}
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