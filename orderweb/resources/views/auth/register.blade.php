<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro</title>
    <!-- Custom fonts for this template-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet" />
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet"> 
    

</head>

<body>

    <div class="bg-gradient-primary">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-12 col-md-9">
                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-lg-6 d-none d-lg-block">
                                    <img src="{{ asset('img/supervisor.jpg') }}" alt="registro" class="img-fluid">
                                </div>
                                <div class="col-lg-6">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Registro</h1>
                                        </div>
                                        @include('templates.messages')
                                        <form class="user" action="{{ route('auth.store') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-user"
                                                id="name" name="name" placeholder="Nombre Completo" required
                                                value="{{ old('name') }}">
                                            </div>
                                            <div class="form-group">
                                                <input type="email" class="form-control form-control-user"
                                                id="email" name="email" placeholder="Correo electronico" required
                                                value="{{ old('email') }}">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Contraseña" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control form-control-user" id="password_confirmation" name="password_confirmation" placeholder="Confirmar Contraseña" required>
                                            </div>
                                            <input type="hidden" id="role_id" name="role_id " value="2">
                                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                                Registrarse
                                            </button>
                                            
                                        </form>
                                        <hr>
                                        <div class="text-center">
                                            <a href="{{ route('auth.index') }}" class="small">Iniciar sesion</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
        </div>
    </div>

    <script src="{{ asset('jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js"></script>
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

</body>
</html>