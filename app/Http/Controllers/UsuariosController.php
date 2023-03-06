<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios;
use Illuminate\Support\Facades\Validator;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuarios::with(['getCategoria'])->get();
        return response()->json([
            'usuarios' => $usuarios,
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'nombres' => 'required|min:5|max:100',
            'apellidos' => 'required|min:5|max:100',
            'cedula' => 'required|unique:App\Models\Usuarios,cedula',
            'email' => 'required|email|max:150|unique:App\Models\Usuarios,email',
            'pais' => 'required',
            'direccion' => 'required|max:180',
            'celular' => 'required|min:10|max:10',
            'categoria' => 'required',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'errores' => $validate,
            ], 204);
        }

        $usuario = new Usuarios;

        $usuario->nombres = $request->nombres;
        $usuario->apellidos = $request->apellidos;
        $usuario->cedula = $request->cedula;
        $usuario->email = $request->email;
        $usuario->pais = $request->pais;
        $usuario->direccion = $request->direccion;
        $usuario->celular = $request->celular;
        $usuario->categoria_id = $request->categoria;

        $usuario->save();

        return response()->json([
            'usuario' => $usuario,
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = Usuarios::find($id);
        if (!$usuario) {
            return response()->json([
                'mensaje' => 'El usuario indicado no existe',
            ], 404);
        }
        return response()->json([
            'usuario' => $usuario,
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'cedula' => 'required',
            'email' => 'required',
            'pais' => 'required',
            'direccion' => 'required',
            'celular' => 'required',
            'categoria_id' => 'required',
        ]);

        $usuario = Usuarios::find($id);

        if (!$usuario) {
            return response()->json([
                'mensaje' => 'El usuario para actualizar no existe',
            ], 404);
        }

        $usuario->nombres = $request->nombres;
        $usuario->apellidos = $request->apellidos;
        $usuario->cedula = $request->cedula;
        $usuario->email = $request->email;
        $usuario->pais = $request->pais;
        $usuario->direccion = $request->direccion;
        $usuario->celular = $request->celular;
        $usuario->categoria_id = $request->categoria_id;

        $usuario->save();

        return response()->json([
            'usuario' => $usuario,
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = Usuarios::find($id);
        if (!$usuario) {
            return response()->json([
                'mensaje' => 'El usuario a eliminar no existe',
            ], 404);
        }

        $usuario->delete();
        return response()->json([
            'mensaje' => 'El usuario fue eliminado',
        ], 200);
    }
}
