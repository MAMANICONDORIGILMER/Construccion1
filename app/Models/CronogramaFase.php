<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CronogramaFase extends Model
{
    protected $table = 'cronograma_fase';
    public $timestamps = false;

    public static function ListarPorMetodologiaId($MetodologiaId)
    {
        $ListadoMetodologiaFase = Fase::where('MetodologiaId',$MetodologiaId)->get();
        foreach ($ListadoMetodologiaFase as $ObjMetodologiaFase){
            $ObjMetodologiaFase->ListadoElementoConfiguracion = Fase::where('Id',$ObjMetodologiaFase->Id)->get();
        }

        return $ListadoMetodologiaFase;
    }

    public static function ListarPorCronogramaId($CronogramaId){
        return CronogramaFase::where('CronogramaId',$CronogramaId)->get();
    }



}
