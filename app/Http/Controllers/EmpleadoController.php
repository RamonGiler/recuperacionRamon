<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
   public function store(Request $request){
    $empleado = new Empleado();
    $empleado->nombre = $request->nombre;
    $empleado->fechadecontratacion = $request->fechadecontratacion;
    $empleado->sueldo = $request->sueldo;
    $empleado->horastrabajas = $request->horastrabajas;
    $empleado->departamento = $request->departamento;
    $empleado->save();
    return back();
}
public function index(){
    $empleados = Empleado::where('salario', false)->get();
    return view('Empleados.empleado', compact('empleados'));
}
}
