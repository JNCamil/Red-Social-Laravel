<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class userController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        /*Si aplico un middleware auth, bloquearé el acceso al resto 
        de métodos que yo tenga
        Para verlo, vamos a kernel -> middlewareAliases -> auth, 
        con esto los métodos serán privados*/
    }
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

        //SUBIR LA IMAGEN
        $image_path =  $request->file('image_path');
        //var_dump($image_path);die();

        if($image_path){
            //Utilizamos el objeto storage y el disco, use storage
            //Le agrego la fun time() para que sea único
            $image_path_name = time().$image_path->getClientOriginalName();

            //Guardar en la carpeta storage app/users
            Storage::disk('users')->put($image_path_name, File::get($image_path));//Recibe dos parámetros, el nombre del archivo y el fichero(para esto cargamos el objeto file)

            //Setear el nombre de la imagen en el objeto user
            $user->image = $image_path_name;

        }



        //Ejecutar consulta y cambio en la bbdd
        $user->update();

        return redirect()->route('config')
                         ->with(['message'=>'Usuario actualizado correctamente']);
        


    }

    public function getImage($filename){ //Recuperar la foto por url, la que llega por la ruta en routes web.php
        $file = Storage::disk('users')->get($filename);
        return new Response($file, 200);
    }
}
