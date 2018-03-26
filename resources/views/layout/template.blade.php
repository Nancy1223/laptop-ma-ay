<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    <title>laptop mañay</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('plantilla/bootstrap/css/bootstrap.min.css')}}">

    <!-- Third Party CSS -->
    <link rel="stylesheet" href="{{asset('plantilla/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('plantilla/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('plantilla/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('plantilla/css/owl.theme.default.min.css')}}">

    <!-- Mimity CSS -->
    <link rel="stylesheet" href="{{asset('plantilla/css/style.min.css')}}">


	 	<!-- SweeatAlert -->
    	<link rel="stylesheet" href="{{asset('mensajesAlert/sweetalert.css')}}">

      <!-- jQuery first, then Popper.js, then Bootstrap JS, then required plugins -->
    <script src="{{asset('plantilla/js/jquery-3.2.1.min.js')}}"></script>

    <script src="{{asset('plantilla/js/popper.min.js')}}"></script>
    <script src="{{asset('plantilla/bootstrap/js/bootstrap.min.js')}}"></script>

    <script src="{{asset('plantilla/js/bootstrap3-typeahead.min.js')}}"></script>
    
    </style>
    	
  </head>
    
  <body>
    <!-- Offcanvas Menu -->
    <nav class="offcanvas">
      <div class="offcanvas-content">
        <div id="list-menu" class="list-menu list-group" data-children=".sub-menu1">
          <a href="{{url('/')}}"><i class="fa fa-fw fa-home"></i> Inicio</a>
          <!-- <div class="sub-menu1">
            <a data-toggle="collapse" href="#" data-target="#sub1" role="button" aria-expanded="false" aria-controls="sub1"><i class="fa fa-fw fa-file"></i> Ver más</a>
            <div id="sub1" class="collapse" data-parent="#list-menu" role="tabpanel">
              <a href="{{url('nosotros')}}">Nosotros</a>
              <a href="{{url('preguntas')}}">Preguntas Frecuentes</a>
              <a href="{{url('contacto')}}">Contáctenos</a>
             </div>
            </div>
             <div> 
                <a style='display: {{Session::has("codigoUsario")?"none":"block"}};' href="{{url('usuario/insertar')}}"><i class="fa fa-fw fa-user-plus"></i>Registrarse</a>
                <a  id="btn" style='display: {{Session::has("codigoUsario")?"none":"block"}};' type="button" class="btn btn-outline-theme"   data-toggle="modal" data-target="#LoginModal" ><i id="btn"   class="fa fa-user-circle" ></i> Iniciar sesión</a>
             </div>
              <a   title="Ver mi perfil" href="{{url('usuario/perfil')}}" style='display: {{Session::has("codigoUsario")?"block":"none"}};' style="color: green;" class="fa fa-user-circle">    
                     <b>   @if(session()->has('codigoUsario')) {{(session()->get('codigoUsario')->nombre)}} {{(session()->get('codigoUsario')->apellidos)}}   @endif  </b>
             </a>             
          </div>           
        </div>
      </div> -->
    </nav>

    <div class="content-overlay"></div>

     <!-- Top Header -->
    

    <!-- Middle Header -->
    <div class="middle-header" style="background: #000">
      <div class="container">
        <div class="row py-2 py-lg-0">
          <div class="col-2 col-sm-1 d-block d-lg-none">
            <div class="d-flex align-items-center h-100 justify-content-center menu-btn-wrapper">
              <button class="btn btn-lg border-0 btn-link offcanvas-btn p-0" type="button">
                <i class="fa fa-bars"></i/>
              </button>
            </div>
          </div>
          <div class="col-2 col-sm-1 col-lg-3 pr-0" >
            <div class="d-flex align-items-center h-100 logo-wrapper" >
              <a href="{{url('/')}}" class="d-none d-lg-flex mb-2 mb-lg-0"><img style="width: 200px; height: 80px;" alt="Logo" src="{{asset('img/logo.jpg')}}" class="img-fluid"/></a>
            </div>
          </div>
          <div class="col-8 col-sm-8 col-md-8 col-lg-8 d-none d-sm-block">
             
            <div class="d-flex align-items-center h-100 float-right abg-secondary">
              <div class="btn-group btn-group-sm mr-3" role="group" aria-label="Login Sign Up" >
                  <button style='display: {{Session::has("codigoUsario")?"none":"block"}};' id="btn" type="button" class="btn btn-primary" data-toggle="modal" data-target="#LoginModal" >
                    <i id="btn" class="fa fa-sign-in d-none d-lg-inline-block"></i> Iniciar Sesión
                  </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="container">

      <!-- Navigation Bar -->
      <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light p-0 d-none d-lg-flex navbar-theme">
        <div class="container" >
          <div class="pos-r d-flex w-100" >
            <ul class="navbar-nav mr-auto"  >
              <li class="nav-item {{url()->current()==url('/')?'active':'' }}"><a class="nav-link" href="{{url('/')}}">INICIO</a></li>
              <li class="nav-item {{url()->current()==url('nosotros')?'active':'' }}"><a class="nav-link" href="{{url('nosotros')}}">QUIENES SOMOS</a></li>
              
              <li class="nav-item {{url()->current()==url('preguntas')?'active':'' }}"><a class="nav-link" href="{{url('preguntas')}}">PREGUNTAS FRECUENTES</a></li>
              <li class="nav-item {{url()->current()==url('contacto')?'active':'' }}"><a class="nav-link" href="{{url('contacto')}}">CONTÁCTANOS</a></li>              
            </ul>
          </div>        
        </div>
      </nav> -->

      <section id="sectionCuerpoGeneral">
         <div id="divMensajeGeneral"></div>
           @if(count($errors) > 0)
      		<div class="alert alert-danger">
	        	<ul>
	          		@foreach ($errors->all() as $error)
	             	 <li>{{ $error }}</li>
	          		@endforeach
	        	</ul>
      		</div>
    		@endif
          @if (session()->has('msj-correcto')) 
              <div class="alert alert-success" >
                {{session()->get('msj-correcto')}} 
                {{session()->forget('msj-correcto')}} 
              </div>
          @elseif(session()->has('msj-error'))
              <div class="alert alert-danger">
                {{session()->get('msj-error')}}
                {{session()->forget('msj-error')}} 
              </div>
          @endif   
          @yield('cuerpoInterno')
      </section>
        <!-- Our Clients -->
         
      <!-- Footer -->
      <div class="footer">
        <div class="text-center copyright">
          Copyright &copy; 2018 Laptop mañay
        </div>
      </div>

      <!-- Login Modal -->
      <div class="modal fade" id="LoginModal" tabindex="-1" role="dialog" aria-labelledby="LoginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
          <div class="modal-content">
            <div class="modal-header">

              <h5 class="modal-title" id="LoginModalLabel">Logeo del sistema</h5>

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
                <form id="formLogin" action="{{url('usuario/login')}}" method="post">

                   <div class="modal-body">
                      <div class="form-group">
                        <label for="InputUsername" class="font-weight-bold">Correo electronico :</label>
                        <input type="text" class="form-control" id="InputUsername" placeholder="ingrese correo electronico" name="InputUsername">
                      </div>
                      <div class="form-group">
                        <label for="InputPassword" class="font-weight-bold">Contraseña :</label>
                        <input type="password" class="form-control" id="InputPassword" placeholder="contraseña" name="InputPassword">
                        <a href="#" class="float-right text-default"><small>Olvidaste tu contraseña?</small></a>
                         <br>
                        <input type="submit" value="Ingresar" id="btnIngresar" class="btn btn-primary" >
                      </div>
                    {{csrf_field()}}              
                  </div>
                  
                </form>
          </div>
        </div>
      </div>

      <a href="#top" class="back-top text-center" onclick="$('body,html').animate({scrollTop:0},500); return false">
        <i class="fa fa-angle-double-up"></i>
      </a>

    </div>
    
     <!-- Third Party JS -->
     <script src="{{asset('plantilla/js/owl.carousel.min.js')}}"></script>
     <script src="{{asset('plantilla/js/nouislider.min.js')}}"></script>
     <script src="{{asset('plantilla/js/jquery.raty-fa.min.js')}}"></script>
     <script src="{{asset('plantilla/js/jquery.ez-plus.min.js')}}"></script>

      <!-- Mimity JS -->
      <script src="{{asset('plantilla/js/mimity.min.js')}}" ></script>

      <!-- SweetAlert -->
      <script src = "{{asset('mensajesAlert/sweetalert.js')}}"></script>

      <!-- Lcal Storage -->
      <script src = "{{asset('localStorage/carrito.js')}}"></script>
  <script>
    function VerLogin()
    {
      $(document).ready(function()
      {
        $("#LoginModal").modal("show");
      });
    }
    </script>
  
  	@if(Session::has('loguearse'))
      <?php echo 
      "<script>
          window.onload = 
            function Ir()
            {
              VerLogin();
            };
        </script>"; 
      ?>
  	@endif
  </body>
</html>
