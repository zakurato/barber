<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>formLogin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="CSS/styleFormLogin.Css">
    <!--sweetAlet2-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.28/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.28/dist/sweetalert2.min.css" rel="stylesheet">


</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('index') }}">Inicio</a>
        </div>
    </nav>


    <section class="vh-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 text-black">

                    <div class="px-5 ms-xl-4" style="text-align: center">
                        <img src="imagenes/logo.png" alt="" style="width: 200px; height: 200px;">
                    </div>

                    <div>

                        <form action="{{ route('verificarDatos') }}" style="width: 23rem;" method="POST">
                            @csrf

                            <h3 style="color: white" class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Log in
                            </h3>

                            <div class="form-outline mb-4">
                                <input name="email" type="email" class="form-control form-control-lg" />
                                <label style="color: white" class="form-label">Correo:</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input name="password" type="password" class="form-control form-control-lg" />
                                <label style="color: white" class="form-label">Contraseña:</label>
                            </div>

                            <div class="pt-1 mb-4">
                                <button class="btn btn-info btn-lg btn-block" type="submit">Login</button>
                            </div>
                        </form>

                        @if (session()->has('errorCredenciales'))
                            <script>
                                Swal.fire({
                                    icon: "error",
                                    title: "Error",
                                    text: "{{ session('errorCredenciales') }}"
                                });
                            </script>
                        @endif

                    </div>

                </div>
                <div class="col-sm-6 px-0 d-none d-sm-block">
                    <img src="imagenes/imagenFormLogin.jpg" alt="Login image" class="w-100 vh-100"
                        style="object-fit: cover; object-position: left;">
                </div>
            </div>
        </div>
    </section>
</body>

</html>
