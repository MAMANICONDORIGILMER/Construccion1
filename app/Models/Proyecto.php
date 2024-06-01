<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Proyecto extends Model
{
    protected $primaryKey ="Id";
    protected $table = 'proyecto';
    public $timestamps = false;

    public static function Agregar(Proyecto $ObjProyecto){
        if($ObjProyecto->save()){
            return $ObjProyecto->id;
        }
        return 0 ;
    }

    public static function Editar(Proyecto $ObjProyecto)
    {
        if($ObjProyecto->update())
        {
            return $ObjProyecto->Id;
        }
        return 0;
    }

    public static function ObtenerPorId($ProyectoId){
        return Proyecto::findOrFail($ProyectoId);
    }

    public static function ListarPorJefeUsuarioId($UsuarioId){
        return Proyecto::where('UsuarioId',$UsuarioId)->get();
    }
    
}

?>