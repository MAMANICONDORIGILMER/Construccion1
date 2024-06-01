<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chatbot extends Model
{
    protected  $primaryKey ="Id";
    protected $table = 'chatbot';
    public $timestamps = false;

    public static function ObtenerSalida($Entrada)
    {
        return Chatbot::where('Entrada',$Entrada)->get();
    }
    
}

?>