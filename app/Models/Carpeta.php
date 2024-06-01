<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Carpeta extends Model
{
    protected $table = 'carpeta';
    public $timestamps = false;

    public static function Agregar(Carpeta $ObjProyecto){
        if($ObjProyecto->save()){
            return $ObjProyecto->id;
        }
        return 0 ;
    }

    public static function ObtenerPorId($ProyectoId){
        return Carpeta::findOrFail($ProyectoId);
    }

    public static function ListarPorProyectoId($ProyectoId){
        return Carpeta::where('ProyectoId',$ProyectoId)->get();
    }

    public function ListarTodo(){
        return Carpeta::all();
    }
    
}

?>