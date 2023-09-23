<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $horarios = Horario::orderByRaw("FIELD(dia, 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo')")->get();
        return view("Index.index",compact("horarios"));
    }

    public function formLogin(){
        return view("Login.formLogin");
    }

    public function verificarDatos(Request $request){
        $request =  request()->only("email","password");
        if(Auth::attempt($request)){
            request()->session()->regenerate();
            //return "logeado correctamente";
            return redirect()->route("loginDentro");
        }else{
            session()->flash("errorCredenciales", "El correo o la contraseña están incorrectas");
            return redirect()->route("formLogin");
        }
    }

    public function loginDentro(){
        return view("Login.loginDentro");
    }

    public function logout(){
        Auth::logout();
        return redirect('formLogin'); // Puedes redirigir a cualquier página después de cerrar sesión
    }

    public function horarios(){
        $horarios = Horario::orderByRaw("FIELD(dia, 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo')")->get();
        return view("Horarios.horarios",compact("horarios"));
    }

    public function crearHorario(){
        return view("Horarios.crearHorario");
    }
    public function storeHorario(Request $request){

        //return $request;
        if($request->inputDia == null || $request->inputHoraInicio == null || $request->inputHoraFin == null){
            //return "estoy aqui";
            session()->flash("errorLLenarCampos", "Debe seleccionar el dia, la fecha de inicio y la fecha de fin");
            return redirect()->route("crearHorario");
        }else{
            //verificar que si el dia ya existe en la base de datos no deje
            $existe = 0;
            $horarios = Horario::all();
            foreach($horarios as $item){
                if($item->dia == $request->inputDia){
                    $existe = 1;
                    break;
                }
            }
            if($existe == 1){
                //returnar de nuevo a crearHorario advertiendo que ya existe un horario con ese dia
                session()->flash("existeDia", "El día que selecciono ya existe en la tabla de horarios");
                return redirect()->route("crearHorario");
            }else{
                $storeHorario = new Horario();
                $storeHorario->dia = $request->inputDia;
                $storeHorario->horaInicio = $request->inputHoraInicio;
                $storeHorario->horaFin = $request->inputHoraFin;
                $storeHorario->save();

                session()->flash("horarioCreadoCorrectamente", "Horario creado correctamente");
                return redirect()->route("crearHorario");

            }

        }
    }
    public function deleteHorario(Request $request){
        //return $request;
        $delete = Horario::where([["dia","=",$request->diaDelete]])->delete();
        session()->flash("horarioEliminadoCorrectamente", "Horario eliminado correctamente");
        return redirect()->route("horarios");
    }

    public function editarHorario(Request $request){
        $horarioEditar = Horario::where([["id","=",$request->idEditar]])->first();
        return view("Horarios.formEditarHorario",compact("horarioEditar"));
    }


    public function storeEditarHorario(Request $request){

        //return $request;
        //buscar el horario que se va editar
        $horarioEditar = Horario::where([["id","=",$request->idEditar]])->first();
        //el dia no se cambio
        if($request->oldDay == $request->inputDia){
            $horarioEditar->horaInicio = $request->inputHoraInicio;
            $horarioEditar->horaFin = $request->inputHoraFin;
            $horarioEditar->save();
            session()->flash("horarioEditadoCorrectamente", "Horario editado correctamente");
            return redirect()->route("horarios");
        }else{
            //el dia si se cambio y si se cambio debo verificar que el el dia que se va cambiar no exista en los horarios
            //verificar que si el dia ya existe en la base de datos no deje
            $existe = 0;
            $horarios = Horario::all();
            foreach($horarios as $item){
                if($item->dia == $request->inputDia){
                    $existe = 1;
                    break;
                }
            }

            if($existe == 1){
                //returnar de nuevo a crearHorario advertiendo que ya existe un horario con ese dia
                session()->flash("existeDia", "El día que intento editar ya existe en la tabla de horarios");
                return redirect()->route("horarios");
            }else{

                $horarioEditar->dia = $request->inputDia;
                $horarioEditar->horaInicio = $request->inputHoraInicio;
                $horarioEditar->horaFin = $request->inputHoraFin;
                $horarioEditar->save();
                session()->flash("horarioEditadoCorrectamente", "Horario editado correctamente");
                return redirect()->route("horarios");

            }





        }
        
    }

}
