<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
	{
		if(auth()->user()->isAdmin()){
			return view('admin.usuarios.index', [ 'usuarios'=> User::where('id','!=',1)->get()]);
		}
		return redirect()->route('admin');
		
	}

	public function create()
	{
		if(auth()->user()->isAdmin()){
			return view('admin.usuarios.create');
		}
		
		return redirect()->route('admin');
	}

	public function edit(User $usuario)
	{
		if(auth()->user()->isAdmin() || $usuario->id == auth()->id()){
			return view('admin.usuarios.edit', compact('usuario') );
		}
		return redirect()->route('admin');
	}

	public function update(Request $request, User $usuario)
	{
		$rules =  [
			'nombre' => ['required', 'string', 'max:150','unique:users,nombre,'. $usuario->id],
			'telefono' => ['nullable'],
			'email' => ['nullable','unique:users,email,'. $usuario->id],
            'username' => ['required', 'string',  'max:150', 'unique:users,username,'. $usuario->id],
		];
		if ($request->filled('password')) {
			$rules['password'] =  ['required', 'string', 'min:5', 'confirmed'];
		}
		$data = $this->validate($request,$rules);
		if($data['password']) $data['password']  = Hash::make($data['password']);
		// if(! is_null($data['password'])) $usuario->update([
        //     'nombre' => $data['nombre'],
		// 	'telefono' => $data['telefono'],
		// 	'email' => $data['email'],
		// 	'username' => $data['username'],
        // ]);
		$usuario->update($data);
		return redirect()->route('usuarios.index')->withSuccess('Usuario actualizado correctamente! ');
	}

	public function destroy(User $usuario)
	{
		
	}
}
