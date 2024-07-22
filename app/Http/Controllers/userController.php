<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class userController extends Controller
{
    //
    public function config(){
        return view('user.config');
    }

    public function update(Request $request){//Recibe un objeto request del form
        //Conseguir usuario identificado, si no hubiera, habría que hacer un find a la bbdd
        $user =\Auth::user();

        // $id = \Auth::user()->id; //Colocando la barra no da fallo y no hace falta invocar arriba la clase
        $id = $user->id; //Colocando la barra no da fallo y no hace falta invocar arriba la clase

        //Validación del formulario
        $validate = $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'nick' => ['required', 'string', 'max:255', Rule::unique('users','nick')->ignore($id, 'id')],//**Antes importamos la clase Rule: use Illuminate\Validation\Rule;Compruebe que el campo es único pero una excepcion y es que el nick coincida con el id del objeto
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users', 'email')->ignore($id, 'id')],//lo mismo que el anterior
        ]);

        //Recoger los datos del formulario
        $name = $request->input('name');
        $surname = $request->input('surname');
        $nick = $request->input('nick');
        $email = $request->input('email');
        //var_dump($id); die();

        //Setear/Asignar los valores al objeto usuario
        $user->name = $name;
        $user->surname = $surname;
        $user->nick = $nick;
        $user->email = $email;

        //Ejecutar consulta y cambio en la bbdd
        $user->update();

        return redirect()->route('config')
                         ->with(['message'=>'Usuario actualizado correctamente']);
        


    }
}
