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
                                <div class="col-xs-4 form-group" style="color:green;">
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
                                <div class="col-xs-4 form-group">
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
                                <div class="col-xs-4 form-group">
                                    <label >$ Ingreso estimado  </label>
                                    <input type="number" min="0" max="999999999999.99" step=".01" class="form-control" name="preg_003" id="preg_003" placeholder="999999999999.99" value="{{$regcontable->preg_003}}" required>
                                </div>                                                                        
                                <div class="col-xs-4 form-group">
                                    <label >$ Egreso estimado </label>
                                    <input type="number" min="0" max="999999999999.99" step=".01" class="form-control" name="preg_004" id="preg_004" placeholder="999999999999.99" value="{{$regcontable->preg_004}}" required>
                                </div>  
                                <div class="col-xs-4 form-group">
                                    <label >$ Inversiones proyectadas </label>
                                    <input type="number" min="0" max="999999999999.99" step=".01" class="form-control" name="preg_005" id="preg_005" placeholder="999999999999.99" value="{{$regcontable->preg_005}}" required>
                                </div>                                  
                            </div>                                           

                            <div class="row">               
                                <div class="col-xs-4 form-group">
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

                            <div class="box box-success">
                            <div class="row">               
                                  <div class="col-xs-12 form-group">
                                    <label > *** Quotas de 5 al millar en formato PDF ***</label>
                                </div>                                                                      
                            </div>                            

                            <div class="row">               
                                <div class="col-xs-4 form-group">
                                    @if(!empty($regcontable->osc_d10) || !is_null($regcontable->osc_d10))
                                        <label >Enero archivo en formato PDF </label><br>
                                        <a href="/images/{{$regcontable->osc_d10}}" class="btn btn-danger" title="Enero cuotas 5 al millar"><i class="fa fa-file-pdf-o"></i><small>PDF</small>
                                        </a>{{$regcontable->osc_d10}}
                                        <input type="hidden" name="doc_id10" id="doc_id10" value="15">
                                    @else
                                        <label >Enero archivo en formato PDF </label><br>
                                        <b style="color:darkred;">** Pendiente **</b>
                                        <input type="hidden" name="doc_id10" id="doc_id10" value="15">
                                    @endif
                                </div>  
                                <div class="col-xs-4 form-group">
                                    <label >Enero - Monto de aportación monetaria </label>
                                    <input type="number" min="0" max="999999999999.99" step=".01" class="form-control" name="preg_006" id="preg_006" placeholder="999999999999.99" value="{{$regcontable->preg_006}}" required>
                                </div>                                                                        
                            </div>
                            <div class="row">               
                                <div class="col-xs-4 form-group">
                                    @if(!empty($regcontable->osc_d1002) || !is_null($regcontable->osc_d1002))
                                        <label >Febrero archivo en formato PDF </label><br>
                                        <a href="/images/{{$regcontable->osc_d1002}}" class="btn btn-danger" title="Febrero cuotas 5 al millar"><i class="fa fa-file-pdf-o"></i><small>PDF</small>
                                        </a>{{$regcontable->osc_d1002}}
                                        <input type="hidden" name="doc_id1002" id="doc_id1002" value="15">
                                    @else
                                        <label >Febrero archivo en formato PDF </label><br>
                                        <b style="color:darkred;">** Pendiente **</b>
                                        <input type="hidden" name="doc_id1002" id="doc_id1002" value="15">
                                    @endif
                                </div>  
                                <div class="col-xs-4 form-group">
                                    <label >Febrero - Monto de aportación monetaria </label>
                                    <input type="number" min="0" max="999999999999.99" step=".01" class="form-control" name="preg_1002" id="preg_1002" placeholder="999999999999.99" value="{{$regcontable->preg_1002}}" required>
                                </div>                                                                        
                            </div>  
                            <div class="row">               
                                <div class="col-xs-4 form-group">
                                    @if(!empty($regcontable->osc_d1003) || !is_null($regcontable->osc_d1003))
                                        <label >Marzo archivo en formato PDF </label><br>
                                        <a href="/images/{{$regcontable->osc_d1003}}" class="btn btn-danger" title="Marzo cuotas 5 al millar"><i class="fa fa-file-pdf-o"></i><small>PDF</small>
                                        </a>{{$regcontable->osc_d1003}}
                                        <input type="hidden" name="doc_id1003" id="doc_id1003" value="15">
                                    @else
                                        <label >Marzo archivo en formato PDF </label><br>
                                        <b style="color:darkred;">** Pendiente **</b>
                                        <input type="hidden" name="doc_id1003" id="doc_id1003" value="15">
                                    @endif
                                </div>  
                                <div class="col-xs-4 form-group">
                                    <label >Marzo - Monto de aportación monetaria </label>
                                    <input type="number" min="0" max="999999999999.99" step=".01" class="form-control" name="preg_1003" id="preg_1003" placeholder="999999999999.99" value="{{$regcontable->preg_1003}}" required>
                                </div>                                                                        
                            </div>                                                              

                            <div class="row">               
                                <div class="col-xs-4 form-group">
                                    @if(!empty($regcontable->osc_d1004) || !is_null($regcontable->osc_d1004))
                                        <label >Abril archivo en formato PDF </label><br>
                                        <a href="/images/{{$regcontable->osc_d1004}}" class="btn btn-danger" title="Abril cuotas 5 al millar"><i class="fa fa-file-pdf-o"></i><small>PDF</small>
                                        </a>{{$regcontable->osc_d1004}}
                                        <input type="hidden" name="doc_id1004" id="doc_id1004" value="15">
                                    @else
                                        <label >Abril archivo en formato PDF </label><br>
                                        <b style="color:darkred;">** Pendiente **</b>
                                        <input type="hidden" name="doc_id1004" id="doc_id1004" value="15">
                                    @endif
                                </div>  
                                <div class="col-xs-4 form-group">
                                    <label >Abril - Monto de aportación monetaria </label>
                                    <input type="number" min="0" max="999999999999.99" step=".01" class="form-control" name="preg_1004" id="preg_1004" placeholder="999999999999.99" value="{{$regcontable->preg_1004}}" required>
                                </div>                                                                        
                            </div>    
                            <div class="row">               
                                <div class="col-xs-4 form-group">
                                    @if(!empty($regcontable->osc_d1005) || !is_null($regcontable->osc_d1005))
                                        <label >Mayo archivo en formato PDF </label><br>
                                        <a href="/images/{{$regcontable->osc_d1005}}" class="btn btn-danger" title="Mayo cuotas 5 al millar"><i class="fa fa-file-pdf-o"></i><small>PDF</small>
                                        </a>{{$regcontable->osc_d1005}}
                                        <input type="hidden" name="doc_id1005" id="doc_id1005" value="15">
                                    @else
                                        <label >Mayo archivo en formato PDF </label><br>
                                        <b style="color:darkred;">** Pendiente **</b>
                                        <input type="hidden" name="doc_id1005" id="doc_id1005" value="15">
                                    @endif
                                </div>  
                                <div class="col-xs-4 form-group">
                                    <label >Mayo - Monto de aportación monetaria </label>
                                    <input type="number" min="0" max="999999999999.99" step=".01" class="form-control" name="preg_1005" id="preg_1005" placeholder="999999999999.99" value="{{$regcontable->preg_1005}}" required>
                                </div>                                                                        
                            </div>    
                            <div class="row">               
                                <div class="col-xs-4 form-group">
                                    @if(!empty($regcontable->osc_d1006) || !is_null($regcontable->osc_d1006))
                                        <label >Junio archivo en formato PDF </label><br>
                                        <a href="/images/{{$regcontable->osc_d1006}}" class="btn btn-danger" title="Junio cuotas 5 al millar"><i class="fa fa-file-pdf-o"></i><small>PDF</small>
                                        </a>{{$regcontable->osc_d1006}}
                                        <input type="hidden" name="doc_id1006" id="doc_id1006" value="15">
                                    @else
                                        <label >Junio archivo en formato PDF </label><br>
                                        <b style="color:darkred;">** Pendiente **</b>
                                        <input type="hidden" name="doc_id1006" id="doc_id1006" value="15">
                                    @endif
                                </div>  
                                <div class="col-xs-4 form-group">
                                    <label >Junio - Monto de aportación monetaria </label>
                                    <input type="number" min="0" max="999999999999.99" step=".01" class="form-control" name="preg_1006" id="preg_1006" placeholder="999999999999.99" value="{{$regcontable->preg_1006}}" required>
                                </div>                                                                        
                            </div>

                            <div class="row">               
                                <div class="col-xs-4 form-group">
                                    @if(!empty($regcontable->osc_d1007) || !is_null($regcontable->osc_d1007))
                                        <label >Julio archivo en formato PDF </label><br>
                                        <a href="/images/{{$regcontable->osc_d1007}}" class="btn btn-danger" title="Julio cuotas 5 al millar"><i class="fa fa-file-pdf-o"></i><small>PDF</small>
                                        </a>{{$regcontable->osc_d1007}}
                                        <input type="hidden" name="doc_id1007" id="doc_id1007" value="15">
                                    @else
                                        <label >Julio archivo en formato PDF </label><br>
                                        <b style="color:darkred;">** Pendiente **</b>
                                        <input type="hidden" name="doc_id1007" id="doc_id1007" value="15">
                                    @endif
                                </div>  
                                <div class="col-xs-4 form-group">
                                    <label >Julio - Monto de aportación monetaria </label>
                                    <input type="number" min="0" max="999999999999.99" step=".01" class="form-control" name="preg_1007" id="preg_1007" placeholder="999999999999.99" value="{{$regcontable->preg_1007}}" required>
                                </div>                                                                        
                            </div>    
                            <div class="row">               
                                <div class="col-xs-4 form-group">
                                    @if(!empty($regcontable->osc_d1008) || !is_null($regcontable->osc_d1008))
                                        <label >Agosto archivo en formato PDF </label><br>
                                        <a href="/images/{{$regcontable->osc_d1008}}" class="btn btn-danger" title="Agosto cuotas 5 al millar"><i class="fa fa-file-pdf-o"></i><small>PDF</small>
                                        </a>{{$regcontable->osc_d1008}}
                                        <input type="hidden" name="doc_id1008" id="doc_id1008" value="15">
                                    @else
                                        <label >Agosto archivo en formato PDF </label><br>
                                        <b style="color:darkred;">** Pendiente **</b>
                                        <input type="hidden" name="doc_id1008" id="doc_id1008" value="15">
                                    @endif
                                </div>  
                                <div class="col-xs-4 form-group">
                                    <label >Agosto - Monto de aportación monetaria </label>
                                    <input type="number" min="0" max="999999999999.99" step=".01" class="form-control" name="preg_1008" id="preg_1008" placeholder="999999999999.99" value="{{$regcontable->preg_1008}}" required>
                                </div>                                                                        
                            </div>    
                            <div class="row">               
                                <div class="col-xs-4 form-group">
                                    @if(!empty($regcontable->osc_d1009) || !is_null($regcontable->osc_d1009))
                                        <label >Septiembre archivo en formato PDF </label><br>
                                        <a href="/images/{{$regcontable->osc_d1009}}" class="btn btn-danger" title="Septiembre cuotas 5 al millar"><i class="fa fa-file-pdf-o"></i><small>PDF</small>
                                        </a>{{$regcontable->osc_d1009}}
                                        <input type="hidden" name="doc_id1009" id="doc_id1009" value="15">
                                    @else
                                        <label >Septiembre archivo en formato PDF </label><br>
                                        <b style="color:darkred;">** Pendiente **</b>
                                        <input type="hidden" name="doc_id1009" id="doc_id1009" value="15">
                                    @endif
                                </div>  
                                <div class="col-xs-4 form-group">
                                    <label >Septiembre - Monto de aportación monetaria </label>
                                    <input type="number" min="0" max="999999999999.99" step=".01" class="form-control" name="preg_1009" id="preg_1009" placeholder="999999999999.99" value="{{$regcontable->preg_1009}}" required>
                                </div>                                                                        
                            </div>   

                            <div class="row">               
                                <div class="col-xs-4 form-group">
                                    @if(!empty($regcontable->osc_d1010) || !is_null($regcontable->osc_d1010))
                                        <label >Octubre archivo en formato PDF </label><br>
                                        <a href="/images/{{$regcontable->osc_d1010}}" class="btn btn-danger" title="Octubre cuotas 5 al millar"><i class="fa fa-file-pdf-o"></i><small>PDF</small>
                                        </a>{{$regcontable->osc_d1007}}
                                        <input type="hidden" name="doc_id1010" id="doc_id1010" value="15">
                                    @else
                                        <label >Octubre archivo en formato PDF </label><br>
                                        <b style="color:darkred;">** Pendiente **</b>
                                        <input type="hidden" name="doc_id1010" id="doc_id1010" value="15">
                                    @endif
                                </div>  
                                <div class="col-xs-4 form-group">
                                    <label >Octubre - Monto de aportación monetaria </label>
                                    <input type="number" min="0" max="999999999999.99" step=".01" class="form-control" name="preg_1010" id="preg_1010" placeholder="999999999999.99" value="{{$regcontable->preg_1010}}" required>
                                </div>                                                                        
                            </div>    
                            <div class="row">               
                                <div class="col-xs-4 form-group">
                                    @if(!empty($regcontable->osc_d1011) || !is_null($regcontable->osc_d1011))
                                        <label >Noviembre archivo en formato PDF </label><br>
                                        <a href="/images/{{$regcontable->osc_d1011}}" class="btn btn-danger" title="Noviembre cuotas 5 al millar"><i class="fa fa-file-pdf-o"></i><small>PDF</small>
                                        </a>{{$regcontable->osc_d1011}}
                                        <input type="hidden" name="doc_id1011" id="doc_id1011" value="15">
                                    @else
                                        <label >Noviembre archivo en formato PDF </label><br>
                                        <b style="color:darkred;">** Pendiente **</b>
                                        <input type="hidden" name="doc_id1011" id="doc_id1011" value="15">
                                    @endif
                                </div>  
                                <div class="col-xs-4 form-group">
                                    <label >Noviembre - Monto de aportación monetaria </label>
                                    <input type="number" min="0" max="999999999999.99" step=".01" class="form-control" name="preg_1011" id="preg_1011" placeholder="999999999999.99" value="{{$regcontable->preg_1011}}" required>
                                </div>                                                                        
                            </div>    
                            <div class="row">               
                                <div class="col-xs-4 form-group">
                                    @if(!empty($regcontable->osc_d1012) || !is_null($regcontable->osc_d1012))
                                        <label >Diciembre archivo en formato PDF </label><br>
                                        <a href="/images/{{$regcontable->osc_d1012}}" class="btn btn-danger" title="Diciembre cuotas 5 al millar"><i class="fa fa-file-pdf-o"></i><small>PDF</small>
                                        </a>{{$regcontable->osc_d1012}}
                                        <input type="hidden" name="doc_id1012" id="doc_id1012" value="15">
                                    @else
                                        <label >Diciembre archivo en formato PDF </label><br>
                                        <b style="color:darkred;">** Pendiente **</b>
                                        <input type="hidden" name="doc_id1012" id="doc_id1012" value="15">
                                    @endif
                                </div>  
                                <div class="col-xs-4 form-group">
                                    <label >Diciembre - Monto de aportación monetaria </label>
                                    <input type="number" min="0" max="999999999999.99" step=".01" class="form-control" name="preg_1012" id="preg_1012" placeholder="999999999999.99" value="{{$regcontable->preg_1012}}" required>
                                </div>                                                                        
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