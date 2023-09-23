<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Horarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!--sweetAlet2-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.28/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.28/dist/sweetalert2.min.css" rel="stylesheet">


</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('loginDentro') }}">Inicio</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <li class="nav-item dropdown">
                        <a style="color: black" class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Menú
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('horarios') }}">Horarios</a></li>
                            <li><a class="dropdown-item" href="{{ route('horarios') }}">Trabajos y precios</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button
                                style="color: black; background-color: rgba(240, 248, 255, 0); border-color: rgba(240, 248, 255, 0)"
                                class="nav-link " type="submit">Cerrar sesión</button>
                        </form>

                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div style="height: 30px"></div>
    <h1 style="text-align: center">Horarios</h1>
    <div style="height: 30px"></div>
    <a href="{{ route('crearHorario') }}">
        <button type="button" class="btn btn-primary">Crear horario</button>
    </a>
    <div style="height: 30px"></div>

    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th scope="col">Dia</th>
                <th scope="col">Hora de inicio</th>
                <th scope="col">Hora final</th>
                <th scope="col">Acción</th>
                <th scope="col">Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($horarios as $item)
                <tr>
                    <td>{{ $item->dia }}</td>
                    <td>{{ $item->horaInicio }}</td>
                    <td>{{ $item->horaFin }}</td>
                    <td>
                        <form action="{{route("editarHorario")}}" method="GET">
                            <input type="hidden" name="idEditar" value="{{$item->id}}">
                            <button class="btn btn-success" type="submit">Editar</button>
                        </form>
                    </td>
                    <td>
                        <form id="deleteForm" action="{{ route('deleteHorario') }}" method="POST">
                            @csrf
                            <input id="inputDia" type="hidden" name="diaDelete" value="">
                            <button class="btn btn-danger" type="button" onclick="confirmDelete('{{ $item->dia }}')">Eliminar</button>
                        </form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

<script>
    //mjs de confirmacion para eliminar horario
    function confirmDelete(dia) {
        Swal.fire({
            title: 'Seguro que desea eliminar el horario del día ' + dia + '?',
            text: 'You won\'t be able to revert this!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Si, eliminar horario!',
            cancelButtonText: 'No, calcelar!',
            confirmButtonColor: '#d33',
        }).then((result) => {
            if (result.isConfirmed) {
                // User confirmed, submit the form
                var inputDia = document.getElementById("inputDia")
                inputDia.value = dia;
                document.getElementById('deleteForm').submit();
            }
        });

        return false; // Evita el envío automático del formulario
    }
</script>

@if (session()->has('horarioEliminadoCorrectamente'))
<script>
    Swal.fire({
        icon: "success", // Usar "success" para notificación de éxito
        title: "Éxito", // Cambiar "Sugerencia" a "Éxito" u otro mensaje apropiado
        text: "{{ session('horarioEliminadoCorrectamente') }}"
    });
</script>
@endif



@if (session()->has('horarioEditadoCorrectamente'))
<script>
    Swal.fire({
        icon: "success", // Cambiar "error" a "success" para indicar éxito
        title: "Correcto", // Cambiar "Error" a "Correcto" o el texto deseado
        text: "{{ session('horarioEditadoCorrectamente') }}"
    });
</script>
@endif

@if (session()->has('existeDia'))
<script>
    Swal.fire({
        icon: "warning", // Cambiar "error" a "warning"
        title: "Advertencia", // Cambiar "Error" a "Advertencia" si lo deseas
        text: "{{ session('existeDia') }}"
    });
</script>
@endif
</html>
