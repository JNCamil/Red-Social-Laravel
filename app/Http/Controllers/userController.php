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
        
        //Validación
        $id = \Auth::user()->id; //Colocando la barra no da fallo y no hace falta invocar arriba la clase

        $validate = $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'nick' => ['required', 'string', 'max:255', Rule::unique('users','nick')->ignore($id, 'id')],//**Antes importamos la clase Rule: use Illuminate\Validation\Rule;Compruebe que el campo es único pero una excepcion y es que el nick coincida con el id del objeto
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users', 'email')->ignore($id, 'id')],//lo mismo que el anterior
        ]);

       // $id = \Auth::user()->id; //Colocando la barra no da fallo y no hace falta invocar arriba la clase
        $name = $request->input('name');
        $surname = $request->input('surname');
        $nick = $request->input('nick');
        $email = $request->input('email');
        //var_dump($id); die();

        


    }
}
