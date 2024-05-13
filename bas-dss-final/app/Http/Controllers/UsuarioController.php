<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Persona;
use App\Models\Rol;
use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id) {
        //
    }

    public function login(Request $request)
    {
        $cuenta = $request->cuenta;
        $clave = $request->clave;
        
        //sentinela para empleado
        $abreviatura = '';

        //Check para usuario/empleado activo
        $estado = 'Activo';

        //Operador
        $op = '';

        //Patrones
        $patronDui = '/^[[0-9]{9}]$/';
        $patronUserEmpleado = '/^[A-Za-z{3}[0-9]{9}]$/';

        if (strpos($cuenta, '@') !== false) {
            $op = 'correo';
        } else if (preg_match($patronDui, $cuenta)) {
            $op = 'dui';
        } else if (preg_match($patronUserEmpleado, $cuenta)) {
            $op = 'empleado';
        } else {
            $op = 'cliente';
        }

        switch ($op) {
            case 'correo':
                $user = Persona::where('Correo', $cuenta)->first();

                $dui = '';

                if ($user) {
                    $dui = $user->DUI;

                    $user = Usuario::where('DUI_Persona', $dui)->where('EstadoUsuario', $estado)->first();

                    if ($user) {
                        if ($clave == $user->Contrasenia) {
                            return view('usuario.home', compact('user'));
                        } else {
                            return redirect()->route('login')->with('status', ['level' => 'danger', 'parameter' => 'Error', 'message' => 'Contraseña incorrecta']);
                        }
                    } else {
                        $user = Empleado::where('DUI_Persona', $dui)->where('Estado', $estado)->first();
    
                        if ($user) {
                            if ($clave == $user->Contrasenia) {
                                return view('usuario.home', compact('user'));
                            } else {
                                return redirect()->route('login')->with('status', ['level' => 'danger', 'parameter' => 'Error', 'message' => 'Contraseña incorrecta']);
                            }
                        }
                        return redirect()->route('login')->with('status', ['level' => 'danger', 'parameter' => 'Error', 'message' => $cuenta . ', no registrado o inactivo']);
                    }
                } else {
                    return redirect()->route('login')->with('status', ['level' => 'danger', 'parameter' => 'Error', 'message' => $cuenta . ', no registrado']);
                }
            break;

            case 'dui':
                $user = Usuario::where('DUI_Persona', $cuenta)->where('EstadoUsuario', $estado)->first();

                if ($user) {
                    if ($clave == $user->Contrasenia) {
                        return view('usuario.home', compact('user'));
                    } else {
                        return redirect()->route('login')->with('status', ['level' => 'danger', 'parameter' => 'Error', 'message' => 'Contraseña incorrecta']);
                    }
                } else {
                    $user = Empleado::where('DUI_Persona', $cuenta)->where('Estado', $estado)->first();

                    if ($user) {
                        if ($clave == $user->Contrasenia) {
                            return view('usuario.home', compact('user'));
                        } else {
                            return redirect()->route('login')->with('status', ['level' => 'danger', 'parameter' => 'Error', 'message' => 'Contraseña incorrecta']);
                        }
                    }

                    return redirect()->route('login')->with('status', ['level' => 'danger', 'parameter' => 'Error', 'message' => $cuenta . ', no registrado o inactivo']);
                }
            break;

            case 'empleado':
                $abreviatura = substr($cuenta, 0, 3);
                $abreviatura = strtoupper($abreviatura);
                $dui = substr($cuenta, 3, 9);
                
                $rol = Rol::where('Abreviatura', $abreviatura)->first();
                $idRol = $rol->ID;

                $user = Empleado::where('DUI_Persona', $dui)->where('ID_Rol', $idRol)->where('Estado', $estado)->first();

                if ($user) {
                    if ($clave == $user->Contrasenia) {
                        return view('usuario.home', compact('user'));
                    } else {
                        return redirect()->route('login')->with('status',['level' => 'danger', 'parameter' => 'Error', 'message' => 'Contraseña incorrecta']);
                    }
                } else {
                    return redirect()->route('login')->with('status', ['level' => 'danger','parameter' => 'Error' , 'message' => $cuenta . ', empleado no registrado o inactivo']);
                }
            break;

            case 'cliente':
                $user = Usuario::where('Nombre_Usuario', $cuenta)->where('EstadoUsuario', $estado)->first();

                if ($user) {
                    if ($clave == $user->Contrasenia) {
                        return view('usuario.home', compact('user'));
                    } else {
                        return redirect()->route('login')->with('status', ['level' => 'danger', 'parameter' => 'Error', 'message' => 'Contraseña incorrecta']);
                    }
                } else {
                    return redirect()->route('login')->with('status', ['level' => 'danger', 'parameter' => 'Error', 'message' => $cuenta . ', usuario no registrado o inactivo']);
                }
            break;
            
            default:
                # code...
            break;
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
