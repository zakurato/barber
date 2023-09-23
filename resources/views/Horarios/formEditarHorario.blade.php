<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Horario</title>
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
                </ul>
            </div>
        </div>
    </nav>
    <div style="height: 30px"></div>
    <h1 style="text-align: center">Editar horario de trabajo</h1>
    <div style="height: 30px"></div>

    <select id="selectDia" class="form-select" aria-label="Default select example">
        <option selected>{{$horarioEditar->dia}}</option>
        <option value="Lunes">Lunes</option>
        <option value="Martes">Martes</option>
        <option value="Miércoles">Miércoles</option>
        <option value="Jueves">Jueves</option>
        <option value="Viernes">Viernes</option>
        <option value="Sábado">Sábado</option>
        <option value="Domingo">Domingo</option>
    </select>
    <div style="height: 30px"></div>

    <div style="display: flex;">
        <select id="selectHoraInicio" class="form-select" aria-label="Default select example" style="width: 250px">
            <option selected>{{$horarioEditar->horaInicio}}</option>
            <option value="1 am.">1 am.</option>
            <option value="2 am.">2 am.</option>
            <option value="3 am.">3 am.</option>
            <option value="4 am.">4 am.</option>
            <option value="5 am.">5 am.</option>
            <option value="6 am.">6 am.</option>
            <option value="7 am.">7 am.</option>
            <option value="8 am.">8 am.</option>
            <option value="9 am.">9 am.</option>
            <option value="10 am.">10 am.</option>
            <option value="11 am.">11 am.</option>
            <option value="2 am.">12 am.</option>
            <option value="1 pm.">1 pm.</option>
            <option value="2 pm.">2 pm.</option>
            <option value="3 pm.">3 pm.</option>
            <option value="4 pm.">4 pm.</option>
            <option value="5 pm.">5 pm.</option>
            <option value="6 pm.">6 pm.</option>
            <option value="7 pm.">7 pm.</option>
            <option value="8 pm.">8 pm.</option>
            <option value="9 pm.">9 pm.</option>
            <option value="10 pm.">10 pm.</option>
            <option value="11 pm.">11 pm.</option>
            <option value="12 pm.">12 pm.</option>
            <option value="Cerrado">Cerrado</option>

        </select>

        <select id="selectHoraFin" class="form-select" aria-label="Default select example" style="width: 250px">
            <option selected>{{$horarioEditar->horaFin}}</option>
            <option value="1 am.">1 am.</option>
            <option value="2 am.">2 am.</option>
            <option value="3 am.">3 am.</option>
            <option value="4 am.">4 am.</option>
            <option value="5 am.">5 am.</option>
            <option value="6 am.">6 am.</option>
            <option value="7 am.">7 am.</option>
            <option value="8 am.">8 am.</option>
            <option value="9 am.">9 am.</option>
            <option value="10 am.">10 am.</option>
            <option value="11 am.">11 am.</option>
            <option value="2 am.">12 am.</option>
            <option value="1 pm.">1 pm.</option>
            <option value="2 pm.">2 pm.</option>
            <option value="3 pm.">3 pm.</option>
            <option value="4 pm.">4 pm.</option>
            <option value="5 pm.">5 pm.</option>
            <option value="6 pm.">6 pm.</option>
            <option value="7 pm.">7 pm.</option>
            <option value="8 pm.">8 pm.</option>
            <option value="9 pm.">9 pm.</option>
            <option value="10 pm.">10 pm.</option>
            <option value="11 pm.">11 pm.</option>
            <option value="12 pm.">12 pm.</option>
            <option value="Cerrado">Cerrado</option>

        </select>
    </div>

    <form action="{{ route('storeEditarHorario') }}" method="POST">
        @csrf
        <div style="height: 30px"></div>

        <div>
            <label id="labelDia"></label>
            <label id="labelHoraInicio"></label>
            <label id="labelHoraFin"></label>
        </div>

        <div>
            <input type="hidden" id="inputDia" name="inputDia">
            <input type="hidden" id="inputHoraInicio" name="inputHoraInicio">
            <input type="hidden" id="inputHoraFin" name="inputHoraFin">
            <input type="hidden" name="idEditar" value="{{$horarioEditar->id}}">
            <input type="hidden" name="oldDay" value="{{$horarioEditar->dia}}">
        </div>


        <div style="height: 30px"></div>

        <button type="submit" class="btn btn-success">Editar horario</button>
    </form>


    <script>
        function actualizarSeleccion() {
            var selectDia = document.getElementById("selectDia");
            var diaSeleccionado = selectDia.value;
            var labelDia = document.getElementById("labelDia");
            var inputDia = document.getElementById("inputDia");
            labelDia.innerText = diaSeleccionado;
            inputDia.value = diaSeleccionado;
        }
    
        // Llamar a la función al cargar la página
        window.addEventListener("load", actualizarSeleccion);
    
        // Agregar un evento de cambio al elemento select
        var selectDia = document.getElementById("selectDia");
        selectDia.addEventListener("change", actualizarSeleccion);
    </script>
    

    <script>
        function actualizarHora(selectElement, labelElement, inputElement) {
            var horaSeleccionada = selectElement.value;
            labelElement.innerText = "de " + horaSeleccionada;
            inputElement.value = horaSeleccionada;
        }
    
        // Llamar a la función al cargar la página para la hora de inicio
        window.addEventListener("load", function() {
            var selectHoraInicio = document.getElementById("selectHoraInicio");
            var labelHoraInicio = document.getElementById("labelHoraInicio");
            var inputHoraInicio = document.getElementById("inputHoraInicio");
            actualizarHora(selectHoraInicio, labelHoraInicio, inputHoraInicio);
        });
    
        // Agregar un evento de cambio al elemento select para la hora de inicio
        var selectHoraInicio = document.getElementById("selectHoraInicio");
        var labelHoraInicio = document.getElementById("labelHoraInicio");
        var inputHoraInicio = document.getElementById("inputHoraInicio");
        selectHoraInicio.addEventListener("change", function() {
            actualizarHora(selectHoraInicio, labelHoraInicio, inputHoraInicio);
        });
    
        // Llamar a la función al cargar la página para la hora de fin
        window.addEventListener("load", function() {
            var selectHoraFin = document.getElementById("selectHoraFin");
            var labelHoraFin = document.getElementById("labelHoraFin");
            var inputHoraFin = document.getElementById("inputHoraFin");
            actualizarHora(selectHoraFin, labelHoraFin, inputHoraFin);
        });
    
        // Agregar un evento de cambio al elemento select para la hora de fin
        var selectHoraFin = document.getElementById("selectHoraFin");
        var labelHoraFin = document.getElementById("labelHoraFin");
        var inputHoraFin = document.getElementById("inputHoraFin");
        selectHoraFin.addEventListener("change", function() {
            actualizarHora(selectHoraFin, labelHoraFin, inputHoraFin);
        });
    </script>    
</body>


@if (session()->has('errorLLenarCampos'))
<script>
    Swal.fire({
        icon: "info", // Cambiar "error" a "info" para sugerencia
        title: "Sugerencia", // Cambiar "Error" a "Sugerencia" si lo deseas
        text: "{{ session('errorLLenarCampos') }}"
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

@if (session()->has('horarioCreadoCorrectamente'))
<script>
    Swal.fire({
        icon: "success", // Cambiar "error" a "success" para indicar éxito
        title: "Correcto", // Cambiar "Error" a "Correcto" o el texto deseado
        text: "{{ session('horarioCreadoCorrectamente') }}"
    });
</script>
@endif


</html>
