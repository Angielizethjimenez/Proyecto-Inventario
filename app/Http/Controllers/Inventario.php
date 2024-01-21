<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Equipo;

class Inventario
{
    public function index() {
      $equipos = Equipo::with('users')->get();
      $usuarios = User::with('equipos')->get();
      return view('dashboard', compact('equipos', 'usuarios'));
  }


    public function formularioAsignar() {
      $usuarios = User::all();
      $equipos = Equipo::all(); // Asumiendo que solo quieres mostrar equipos disponibles
  
      return view('asignar', compact('usuarios', 'equipos'));
  }
    
  public function asignar(Request $request) {
    $userId = $request->input('userId');
    $equipoId = $request->input('equipo_id');
    $accion = $request->input('accion');

    $user = User::find($userId);
    $equipo = Equipo::find($equipoId);

    if ($accion == 'asignar' && $equipo->estado == 'disponible') {
        $user->equipos()->attach($equipoId, ['estado' => 'asignado']);
        $equipo->estado = 'asignado';
        $equipo->save();
    } elseif ($accion == 'devolver' && $equipo->estado == 'asignado') {
        $user->equipos()->detach($equipoId);
        $equipo->estado = 'disponible';
        $equipo->save();
    }

    return redirect()->route('dashboard');
}


      public function crearUsuario() {
        return view('crear-usuario');
  }

  public function guardarUsuario(Request $request) {
    // Validación de los datos del formulario
    $validatedData = $request->validate([
        'nombre' => 'required|string|max:255',
        'documento' => 'required|string|unique:users,documento',
        'password' => 'required|string|min:6',
    ]);

    // Creación del nuevo usuario
    $user = new User();
    $user->nombre = $validatedData['nombre'];
    $user->documento = $validatedData['documento'];
    $user->password = bcrypt($validatedData['password']); // Asegúrate de encriptar la contraseña
    $user->save();

    // Redireccionar al dashboard con un mensaje de éxito
    return redirect()->route('dashboard')->with('success', 'Usuario creado con éxito.');
}


      public function crearEquipo() {
          return view('crear-equipo');
  }

  public function guardarEquipo(Request $request) {
    // Validación de los datos del formulario
    $validatedData = $request->validate([
        'nombre' => 'required|string|max:255',
        'descripcion' => 'nullable|string',
        'estado' => 'required|in:disponible,asignado',
    ]);

    // Creación del nuevo equipo
    $equipo = new Equipo();
    $equipo->nombre = $validatedData['nombre'];
    $equipo->descripcion = $validatedData['descripcion'];
    $equipo->estado = $validatedData['estado'];
    $equipo->save();

    // Redireccionar al dashboard con un mensaje de éxito
    return redirect()->route('dashboard')->with('success', 'Equipo creado con éxito.');
}


    
}
