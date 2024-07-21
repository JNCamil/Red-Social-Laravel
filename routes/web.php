<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

//PARA INSTANCIAR EL OBJECTO: use App\Models\Image;

// use App\Models\Image;

Route::get('/', function () {

    return view('welcome');

    // $images = Image::all(); //Saco todas las imágenes
    // //Es decir no tenemos que hacer un query builder
    // foreach ($images as $image) {
    //     echo $image->image_path . "<br>";
    //     echo $image->description . "<br>";

    //     //Para sacar el usuario que ha creado esa imagen:
    //     //var_dump( $image->user);
    //     echo $image->user->name . " " . $image->user->surname . "<br>";

    //     echo "<h4>Comentarios</h4>";

    //     if (count($image->comments) >= 1) {


    //         //Para mostrar los comentarios asociados
    //         foreach ($image->comments as $comment) {

    //             //Quién ha comentado:

    //             echo $comment->user->name . " " . $comment->user->surname . ":";

    //             echo $comment->content . "<br>";
    //         }
    //     }


    //     echo "LIKES: ". COUNT($image->likes). "<br>";




    //     //var_dump($image); //Objecto image


    // }
    // die();
    
});
//Lo genera el php artisan make:auth y la ruta del controlador para el login y registro de usuarios
Auth::routes();

//Nombre ruta, controlador, función ->nombre
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/configuracion', [App\Http\Controllers\userController::class, 'config'])->name('config');
Route::post('/user/update', [App\Http\Controllers\userController::class, 'update'])->name('user.update');