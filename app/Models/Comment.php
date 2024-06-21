<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;


    protected $table = 'comments';

    //Relación de muchos a uno 

    public function user(){
        //BelongsTo: Pertenece a: segundo parámetro para relacionar
        return $this->belongsTo('App\User', 'user_id'); //Vamos a sacar el objeto usuario que ha creado esa imagen
    }

    //Relación de muchos a uno 

    public function image(){
        //BelongsTo: Pertenece a: segundo parámetro para relacionar
        return $this->belongsTo('App\Image', 'image_id'); //Vamos a sacar el objeto usuario que ha creado esa imagen
    }
        
}
