@extends('sicinar.principal')

@section('title','Verificando Evaluación')

@section('nombre')
{{$nombre}}
@endsection

@section('usuario')
{{$usuario}}
@endsection

@section('estructura')
{{$estructura}}
@endsection

@section('content')
  <div class="content-wrapper" id="principal">
    <section class="content-header">
      <h1>
        Cédula de Evaluación en materia de Control Interno<small>con base en el Manual Administrativo de Aplicación General</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Menú</a></li>
        <li><a href="#">Cuestionario</a></li>
        <li class="active">Cédula de Evaluación</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-11">

          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"><b>Información Adicional</b></h3>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-xs-5">
                  <b style="color:red;">¡Importante!</b><br>
                Los campos marcados con un asterisco(*) son obligatorios.<br>
                Para verificar que deseas cambiar tu información, por favor elige Secretaría y Unidad responsable.
                </div>
              </div>
            </div>
          </div>
        {!! Form::open(['route' => ['verificando',$num_eval_aux], 'method' => 'PUT', 'id' => 'altaProceso']) !!}
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title"><b>Información Inicial</b></h3>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-xs-12">
                  <div class="col-xs-12">
                    <b style="color:green;">Secretaría Responsable:</b>
                      {{$estructura}}
                  </div>
                  <div class="col-xs-12">
                    <b style="color:green;">Unidad Administrativa Responsable:</b>
                      {{$dependencia}}
                  </div>
                </div>
              </div><br>
              <div class="row">
                <!--<div class="col-xs-6">
                  <label >* Unidad responsable</label>
                    <select class="form-control m-bot15" name="unidad" id="unidad" required>
                      <option disabled="disabled">Unidad Responsable</option>
                      @foreach($unidades as $unidad)
                        @if(rtrim($unidad->depen_id,' ') == $cuestionario[0]->cve_dependencia)
                         <option value="{{ $unidad->estrucgob_id }}"selected="true">{{$unidad->depen_desc}}</option>
                        @else
                          <option value="{{ $unidad->estrucgob_id }}">{{$unidad->depen_desc}}</option>
                        @endif
                      @endforeach
                    </select>
                </div>-->
                <div class="col-xs-6">
                  <label >* Proceso a evaluar</label>
                    <select class="form-control m-bot15" name="proceso" id="proceso" required>
                      <option disabled="disabled">Proceso</option>
                      @if($proc == 0)
                          <option value="">NO HAY PROCESOS DADOS DE ALTA PARA ESTA SECRETARIA.</option>
                      @else
                        @foreach($procesos as $proceso)
                          @if($proceso->cve_proceso==$cuestionario[0]->cve_proceso)
                            <option value="{{ $proceso->cve_proceso }}" selected>{{$proceso->desc_proceso}}</option>
                          @else
                            <option value="{{ $proceso->cve_proceso }}">{{$proceso->desc_proceso}}</option>
                          @endif
                        @endforeach
                      @endif
                    </select>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-xs-6">
                  <label >* Nombre del Titular de la Unidad Administrativa / Organismo Auxiliar</label>
                  <input type="text" class="form-control" name="titular" id="titular" value="{{$cuestionario[0]->responsable}}" placeholder="* Nombre del Titular de la Dependencia / Organismo Auxiliar" onkeypress="return soloAlfa(event)" required>
                </div>
                  <div class="col-xs-6">
                      <label >* Nombre del Enlace</label>
                      <input type="text" class="form-control" name="enlace" id="enlace" value="{{$cuestionario[0]->enlace}}" placeholder="* Nombre del Enlace" onkeypress="return soloAlfa(event)" required>
                  </div>
                <!--<div class="col-xs-6">
                  <label >* Objetivo de la Evaluación</label>
                  <input type="text" class="form-control" name="objetivo" id="objetivo" value="{{$cuestionario[0]->obj_eval}}" placeholder="* Objetivo General de la Evaluación" onkeypress="return general(event)" required>
                </div>-->
              </div>
              <br>
            </div>
          </div>

          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title"><b>Apartado 1.- Ambiente de Control</b></h3>
            </div>
            @foreach($cuestionario as $cuest)
              @if($cuest->num_eci >= 1 AND $cuest->num_eci <= 8)
                <div class="box-body">
                  <div class="row">
                    <div class="col-xs-5">
                      <b style="color: orange;">Elemento de Control {{$cuest->num_eci}}</b>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-5">
                      <label style="color:gray;">{{$preguntas[($cuest->num_eci)-1]->preg_eci}}</label>
                    </div>
                    <div class="col-xs-2">
                      <select class="form-control m-bot15" name="responsable{{$cuest->num_eci}}" id="responsable" required>
                        <option selected="true" disabled="disabled">Responsable</option>
                        @foreach($servidores as $servidor)
                          @if($servidor->id_sp == $cuest->id_sp)
                            <option value="{{$servidor->id_sp}}"selected>{{$servidor->unid_admon}} - {{$servidor->nombres}} {{$servidor->paterno}} {{$servidor->materno}}</option>
                          @else
                            <option value="{{$servidor->id_sp}}">{{$servidor->unid_admon}} - {{$servidor->nombres}} {{$servidor->paterno}} {{$servidor->materno}}</option>
                          @endif
                        @endforeach
                      </select>
                    </div>
                    <div class="col-xs-2">
                      <select class="form-control m-bot15" name="evaluacion{{$cuest->num_eci}}" id="evaluacion" required>
                        <option selected="false" disabled="disabled">Evaluación</option>
                        @foreach($grados as $grado)
                          @if($grado->cve_grado_cump === $cuest->num_meec)
                                  <option value="{{$grado->cve_grado_cump}}" selected>{{$grado->desc_grado_cump}}</option>
                          @else
                            <option value="{{$grado->cve_grado_cump}}">{{$grado->desc_grado_cump}}</option>
                          @endif
                        @endforeach
                      </select>
                    </div>
                      <div class="col-xs-3">
                          <input type="text" class="form-control" name="evidencia{{$cuest->num_eci}}" value="{{$cuest->evidencias}}" placeholder="* Evidencia(s)" onkeypress="return soloAlfa(event)">
                      </div>
                  </div>
                </div>
              @endif
            @endforeach
          </div>

          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title"><b>Apartado 2.- Administración de Riesgo</b></h3>
            </div>
            @foreach($cuestionario as $cuest)
              @if($cuest->num_eci >= 9 AND $cuest->num_eci <= 12)
                <div class="box-body">
                  <div class="row">
                    <div class="col-xs-5">
                      <b style="color: orange;">Elemento de Control {{$cuest->num_eci}}</b>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-5">
                        <label style="color:gray;">{{$preguntas[($cuest->num_eci)-1]->preg_eci}}</label>
                    </div>
                    <div class="col-xs-2">
                      <select class="form-control m-bot15" name="responsable{{$cuest->num_eci}}" id="responsable" required>
                        <option selected="true" disabled="disabled">Responsable</option>
                        @foreach($servidores as $servidor)
                          @if($servidor->id_sp == $cuest->id_sp)
                            <option value="{{$servidor->id_sp}}"selected>{{$servidor->unid_admon}} - {{$servidor->nombres}} {{$servidor->paterno}} {{$servidor->materno}}</option>
                          @else
                            <option value="{{$servidor->id_sp}}">{{$servidor->unid_admon}} - {{$servidor->nombres}} {{$servidor->paterno}} {{$servidor->materno}}</option>
                          @endif
                        @endforeach
                      </select>
                    </div>
                    <div class="col-xs-2">
                      <select class="form-control m-bot15" name="evaluacion{{$cuest->num_eci}}" id="evaluacion" required>
                        <option selected="false" disabled="disabled">Evaluación</option>
                        @foreach($grados as $grado)
                          @if($grado->cve_grado_cump === $cuest->num_meec)
                                  <option value="{{$grado->cve_grado_cump}}" selected>{{$grado->desc_grado_cump}}</option>
                          @else
                                  <option value="{{$grado->cve_grado_cump}}">{{$grado->desc_grado_cump}}</option>
                          @endif
                        @endforeach
                      </select>
                    </div>
                      <div class="col-xs-3">
                          <input type="text" class="form-control" name="evidencia{{$cuest->num_eci}}" value="{{$cuest->evidencias}}" placeholder="* Evidencia(s)" onkeypress="return soloAlfa(event)">
                      </div>
                  </div>
                </div>
              @endif
            @endforeach
          </div>

          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title"><b>Apartado 3.- Actividades de Control</b></h3>
            </div>
            @foreach($cuestionario as $cuest)
              @if($cuest->num_eci >= 13 AND $cuest->num_eci <= 24)
                <div class="box-body">
                  <div class="row">
                    <div class="col-xs-5">
                      <b style="color: orange;">Elemento de Control {{$cuest->num_eci}}</b>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-5">
                      <label style="color:gray;">{{$preguntas[($cuest->num_eci)-1]->preg_eci}}</label>
                    </div>
                    <div class="col-xs-2">
                      <select class="form-control m-bot15" name="responsable{{$cuest->num_eci}}" id="responsable" required>
                        <option selected="true" disabled="disabled">Responsable</option>
                        @foreach($servidores as $servidor)
                          @if($servidor->id_sp == $cuest->id_sp)
                            <option value="{{$servidor->id_sp}}"selected>{{$servidor->unid_admon}} - {{$servidor->nombres}} {{$servidor->paterno}} {{$servidor->materno}}</option>
                          @else
                            <option value="{{$servidor->id_sp}}">{{$servidor->unid_admon}} - {{$servidor->nombres}} {{$servidor->paterno}} {{$servidor->materno}}</option>
                          @endif
                        @endforeach
                      </select>
                    </div>
                    <div class="col-xs-2">
                      <select class="form-control m-bot15" name="evaluacion{{$cuest->num_eci}}" id="evaluacion" required>
                        <option selected="false" disabled="disabled">Evaluación</option>
                        @foreach($grados as $grado)
                          @if($grado->cve_grado_cump === $cuest->num_meec)
                                  <option value="{{$grado->cve_grado_cump}}" selected>{{$grado->desc_grado_cump}}</option>
                          @else
                                  <option value="{{$grado->cve_grado_cump}}">{{$grado->desc_grado_cump}}</option>
                          @endif
                        @endforeach
                      </select>
                    </div>
                      <div class="col-xs-3">
                          <input type="text" class="form-control" name="evidencia{{$cuest->num_eci}}" value="{{$cuest->evidencias}}" placeholder="* Evidencia(s)" onkeypress="return soloAlfa(event)">
                      </div>
                  </div>
                </div>
              @endif
            @endforeach
          </div>

          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title"><b>Apartado 4.- Informar y Comunicar</b></h3>
            </div>
            @foreach($cuestionario as $cuest)
              @if($cuest->num_eci >= 25 AND $cuest->num_eci <= 30)
                <div class="box-body">
                  <div class="row">
                    <div class="col-xs-5">
                      <b style="color: orange;">Elemento de Control {{$cuest->num_eci}}</b>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-5">
                      <label style="color:gray;">{{$preguntas[($cuest->num_eci)-1]->preg_eci}}</label>
                    </div>
                    <div class="col-xs-2">
                      <select class="form-control m-bot15" name="responsable{{$cuest->num_eci}}" id="responsable" required>
                        <option selected="true" disabled="disabled">Responsable</option>
                        @foreach($servidores as $servidor)
                          @if($servidor->id_sp == $cuest->id_sp)
                            <option value="{{$servidor->id_sp}}"selected>{{$servidor->unid_admon}} - {{$servidor->nombres}} {{$servidor->paterno}} {{$servidor->materno}}</option>
                          @else
                            <option value="{{$servidor->id_sp}}">{{$servidor->unid_admon}} - {{$servidor->nombres}} {{$servidor->paterno}} {{$servidor->materno}}</option>
                          @endif
                        @endforeach
                      </select>
                    </div>
                    <div class="col-xs-2">
                      <select class="form-control m-bot15" name="evaluacion{{$cuest->num_eci}}" id="evaluacion" required>
                        <option selected="false" disabled="disabled">Evaluación</option>
                        @foreach($grados as $grado)
                          @if($grado->cve_grado_cump === $cuest->num_meec)
                                  <option value="{{$grado->cve_grado_cump}}" selected>{{$grado->desc_grado_cump}}</option>
                          @else
                                  <option value="{{$grado->cve_grado_cump}}">{{$grado->desc_grado_cump}}</option>
                          @endif
                        @endforeach
                      </select>
                    </div>
                      <div class="col-xs-3">
                          <input type="text" class="form-control" name="evidencia{{$cuest->num_eci}}" value="{{$cuest->evidencias}}" placeholder="* Evidencia(s)" onkeypress="return soloAlfa(event)">
                      </div>
                  </div>
                </div>
              @endif
            @endforeach
          </div>

          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title"><b>Apartado 5.- Supervisión y Mejora Continua</b></h3>
            </div>
            @foreach($cuestionario as $cuest)
              @if($cuest->num_eci >= 31 AND $cuest->num_eci <= 33)
                <div class="box-body">
                  <div class="row">
                    <div class="col-xs-5">
                      <b style="color: orange;">Elemento de Control {{$cuest->num_eci}}</b>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-5">
                      <label style="color:gray;">{{$preguntas[($cuest->num_eci)-1]->preg_eci}}</label>
                    </div>
                    <div class="col-xs-2">
                      <select class="form-control m-bot15" name="responsable{{$cuest->num_eci}}" id="responsable" required>
                        <option selected="true" disabled="disabled">Responsable</option>
                        @foreach($servidores as $servidor)
                          @if($servidor->id_sp == $cuest->id_sp)
                            <option value="{{$servidor->id_sp}}"selected>{{$servidor->unid_admon}} - {{$servidor->nombres}} {{$servidor->paterno}} {{$servidor->materno}}</option>
                          @else
                            <option value="{{$servidor->id_sp}}">{{$servidor->unid_admon}} - {{$servidor->nombres}} {{$servidor->paterno}} {{$servidor->materno}}</option>
                          @endif
                        @endforeach
                      </select>
                    </div>
                    <div class="col-xs-2">
                      <select class="form-control m-bot15" name="evaluacion{{$cuest->num_eci}}" id="evaluacion" required>
                        <option selected="false" disabled="disabled">Evaluación</option>
                        @foreach($grados as $grado)
                          @if($grado->cve_grado_cump === $cuest->num_meec)
                                  <option value="{{$grado->cve_grado_cump}}" selected>{{$grado->desc_grado_cump}}</option>
                          @else
                                  <option value="{{$grado->cve_grado_cump}}">{{$grado->desc_grado_cump}}</option>
                          @endif
                        @endforeach
                      </select>
                    </div>
                      <div class="col-xs-3">
                          <input type="text" class="form-control" name="evidencia{{$cuest->num_eci}}" value="{{$cuest->evidencias}}" placeholder="* Evidencia(s)" onkeypress="return soloAlfa(event)">
                      </div>
                  </div>
                </div>
              @endif
            @endforeach
              <div class="row">
                <div class="col-md-12 offset-md-5">
                  <button type="submit" class="btn btn-primary btn-block">Terminar Cuentionario</button>
                </div>
              </div>
          </div>

          {!! Form::close() !!}

        </div>
      </div>

    </section>
  </div>
@endsection

@section('request')
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\cuestionarioRequest','#altaProceso') !!}
@endsection

@section('javascrpt')
<script type="text/javascript">
  $(document).ready(function(){
      $("#secretaria").on('change', function(){
        var sec = $(this).val();
        if(sec) {
          $.ajax({
            url: '/control-interno/procesos/unidades/'+sec,
            type: "GET",
            dataType: "json",
            success:function(data){
              var html_select = '<option selected="true" disabled="disabled">Unidad Responsable</option>';
              for (var i=0; i<data.length ;++i)
                html_select += '<option value="'+data[i].depen_id+'">'+data[i].depen_desc+'</option>';
              $('#unidad').html(html_select);
            }
          });
        }else{
          var html_select = '<option selected="true" disabled="disabled">Unidad Responsable</option>';
          $("#unidad").html(html_select);
        }
      });
    });
</script>

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
@endsection