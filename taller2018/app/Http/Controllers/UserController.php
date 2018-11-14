<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

use App\User;

class UserController extends Controller
{

    public function createUserPropietario(){
        return view('user.createUserPropietario');
    }

    public function saveUserPropietario(Request $request){
        $validatedData = $this->validate($request,[
            'name' => 'required',
            'apellido' => 'required',
            'email' => 'required',
            'password' => 'required',
            'departamento' => 'required',
            'zona' => 'required',
            'calle' => 'required',
            'numero_puerta' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
        ]);
        $user = new User();
        $user->name = $request->input('name');
        $user->apellido = $request->input('apellido');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->tipo_usuario = 'Propietario';
        $user->departamento= $request->input('departamento');
        $user->zona = $request->input('zona');
        $user->calle = $request->input('calle');
        $user->numero_puerta = $request->input('numero_puerta');
        $user->direccion = $request->input('direccion');
        $user->telefono = $request->input('telefono');
        $user->habilitado = 'Si';
        $user->tx_usuario_id = 1;
        $user->tx_host = $_SERVER['REMOTE_ADDR'];
        $user->tx_id = 1;

        $user->save();

        return redirect()->route('home')->with(array('message'=>'El registro fue exitoso'));

    }

    public function editUserPropietario(){
            return view('user.editUserPropietario');
    }

    public function updateUserPropietario(Request $request){
        $validatedData = $this->validate($request,[
            'name' => 'required',
            'apellido' => 'required',
            'email' => 'required',
            'password' => 'required',
            'departamento' => 'required',
            'zona' => 'required',
            'calle' => 'required',
            'numero_puerta' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
        ]);

        $user = \Auth::user();
        $user->name = $request->input('name');
        $user->apellido = $request->input('apellido');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->tipo_usuario = 'Propietario';
        $user->departamento= $request->input('departamento');
        $user->zona = $request->input('zona');
        $user->calle = $request->input('calle');
        $user->numero_puerta = $request->input('numero_puerta');
        $user->direccion = $request->input('direccion');
        $user->telefono = $request->input('telefono');
        $user->habilitado = 'Si';
        $user->tx_usuario_id = 1;
        $user->tx_host = $_SERVER['REMOTE_ADDR'];
        $user->tx_id = 1;

        $user->update();

        return redirect()->route('home')->with(
            array('message' => 'Los datos del usuario se actualizaron correctamente')
        );
    }
}
