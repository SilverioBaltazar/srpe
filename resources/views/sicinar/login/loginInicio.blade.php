@extends('main')

@section('title','Iniciar Sesión')

@section('content')
<!--<body class="hold-transition login-page">-->
<body class="hold-transition">
  <img src="{{ asset('images/Logo-Gobierno.png') }}" border="0" width="200" height="60" style="margin-left: 200px;margin-right: 50%">
  <!--<img src="{{ asset('images/japem.jpg') }}"  border="0" width="110" height="70">-->
  <img src="{{ asset('images/Edomex.png') }}" border="0" width="80" height="60">
  <!--
  <style type="text/css">
    body{
    background-image: url("{{asset('images/japem.jpg')}}"); 
    height: 100%;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    }
    
  </style> -->
  <!--<img src="{{ asset('images/Logo-Gobierno.png') }}" border="1" width="200" height="60" style="margin-right: 1000px;">-->
  <!--<img src="{{ asset('images/Edomex.png') }}" border="1" width="80" height="60" style="position: relative;">-->
  <div class="login-logo">
      <h4 style="color:green;" width="80">
          <b>SECRETARIA DE DESARROLLO SOCIAL <br> DIRECCIÓN GENERAL DE BIENESTAR SOCIAL Y FORTALECIMIENTO FAMILIAR</b>
      </h4>
      <h4 style="color:orange;"><b>SISTEMA DE REGISTRO DEL PADRÓN ESTATAL <br>(SRPE v.1)</b></h4>
  </div>

  <div class="login-box">
    <!--<img src="{{ asset('images/Logo-Gobierno.png') }}" border="1" width="200" height="60" style="margin-right: 20px;">
    <img src="{{ asset('images/Edomex.png') }}" border="1" width="80" height="60">-->
    <!-- /.login-logo -->
    <div class="login-box-body">
      <p class="login-box-msg">Ingresa tus datos para iniciar sesión</p>

      {!! Form::open(['route' => 'login', 'method' => 'POST', 'id' => 'logeo']) !!}
        <div class="form-group has-feedback">
            <input type="text" class="form-control" name="folio" placeholder="folio asignado por sistema">    
        </div>      
        <div class="form-group has-feedback">
            <input type="text" class="form-control" name="usuario" placeholder="Usuario">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="Contraseña">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        @if(count($errors) > 0)
          <div class="alert alert-danger" role="alert">
            <ul>
              @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
        <div class="row">
            <div class="col-md-12 offset-md-5">
                <button type="submit" class="btn btn-primary btn-block btn-success">Iniciar</button>
                <!--{!! Form::submit('Mostrar',['class' => 'btn btn-success']) !!}-->
            </div>
            <!-- /.col -->
        </div>
        <br>

        <div class="col-md-12 offset-md-5">
          <p style="font-family:'Arial, Helvetica, sans-serif'; font-size:14px; text-align:center;">          
          <a href="{{route('autoregusu')}}" class="btn btn-primary btn_xs" title="Autoregistrse para generar un folio">
              <i class="fa fa-file-new-o"></i>   
              <span class="glyphicon glyphicon-plus"></span>Autoregistrse
          </a></p>
        </div>        
      {!! Form::close() !!}
    </div>
    <!-- /.login-box-body -->

    
    </div>
      <div class="lockscreen-footer text-center">
          <a href="/images/AVISO_PRIVACIDAD.pdf"> Aviso de privacidad</a></p>
        <b>Copyright &copy; 2021. Derechos reservados. Secretaría de Desarrollo Social - Dirección General de Bienestar Social y Fortalecimiento Familiar.</b>
        <br><br>
    </div>

  <!--<div class="login-box">
    <div class="login-logo">
      <a href="#"><b>SEDESEM</b></a>
      <h4 style="color:gray;">SECRETARIA DE DESARROLLO SOCIAL</h4>
    </div>
  </div>-->

  <!-- /.login-box -->

  <!-- Javascript Requirements -->
  <!--<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>-->

  <!-- Laravel Javascript Validation -->
  <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>

  {!! JsValidator::formRequest('App\Http\Requests\usuarioRequest','#logeo') !!}
</body>
@endsection