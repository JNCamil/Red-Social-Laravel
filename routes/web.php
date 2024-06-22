<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//PARA INSTANCIAR EL OBJECTO:

use App\Models\Image;

Route::get('/', function () {

    $images = Image::all(); //Saco todas las imágenes
    //Es decir no tenemos que hacer un query builder
    foreach($images as $image){
        echo $image->image_path. "<br>";
        echo $image->description. "<br>";

        //Para sacar el usuario que ha creado esa imagen:
        //var_dump( $image->user);
        echo $image->user->name. " " . $image->user->surname . "<br>";

        echo "<h4>Comentarios</h4>";


        //Para mostrar los comentarios asociados
        foreach($image->comments as $comment ){

            echo $comment->content. "<br>";



        }




        //var_dump($image); //Objecto image


    }
die();


    return view('welcome');
});
