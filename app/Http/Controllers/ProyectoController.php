<?php

namespace App\Http\Controllers;

use App\Models\Metodologia;
use Illuminate\Http\Request;
use App\Models\Proyecto;
use App\Models\Carpeta;
use App\Models\Chatbot;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class ProyectoController extends Controller
{
    public function Index()
    {
        $objUsuario = Auth::user();
        $ListadoProyecto = Proyecto::ListarPorJefeUsuarioId($objUsuario->Id);
        return view('pages.home',[
            'ListadoProyecto' => $ListadoProyecto
        ]);

        //return view('pages.home');
    }
    
    public function Compartidos()
    {
        $objUsuario = Auth::user();
        $ListadoProyecto = Proyecto::ListarPorJefeUsuarioId($objUsuario->Id);
        return view('pages.compartidos',[
            'ListadoProyecto' => $ListadoProyecto
        ]);

        //return view('pages.home');
    }

    public function Favoritos()
    {
        $objUsuario = Auth::user();
        $ListadoProyecto = Proyecto::ListarPorJefeUsuarioId($objUsuario->Id);
        return view('pages.favoritos',[
            'ListadoProyecto' => $ListadoProyecto
        ]);

        //return view('pages.home');
    }

    public function Papelera()
    {
        $objUsuario = Auth::user();
        $ListadoProyecto = Proyecto::ListarPorJefeUsuarioId($objUsuario->Id);
        return view('pages.papelera',[
            'ListadoProyecto' => $ListadoProyecto
        ]);

        //return view('pages.home');
    }

    public function Ver($ProyectoId)
    {
        $Proyecto = Proyecto::ObtenerPorId($ProyectoId);
        $carpetas = Carpeta::ListarPorProyectoId($ProyectoId);
        return view('Proyecto.Ver',[
            'Proyecto' => $Proyecto,
            'Carpetas' => $carpetas
        ]);
    }

    public function CU($ProyectoId)
    {
        $Proyecto = Proyecto::ObtenerPorId($ProyectoId);
        $Cronograma = Cronograma::ObtenerPorProyectoId($ProyectoId);
        $Modulo = Modulo::ObtenerPorProyectoId($ProyectoId);
        $casouso = DB::table('cu')
                   ->join('modulo', 'modulo.Id', '=', 'cu.ModuloId')
                   ->select('cu.*', 'modulo.Nombre as Modulo')
                   ->where('cu.ProyectoId', $ProyectoId)
                   ->get();
        $ListadoElementos = DB::table('proyecto')
                            ->join('cu', 'cu.ProyectoId', '=', 'proyecto.Id')
                            ->join('cu_ecs', 'cu_ecs.CUId', '=', 'cu.Id')
                            ->join('cronograma_elemento_configuracion', 'cronograma_elemento_configuracion.Id', '=', 'cu_ecs.ECSId')
                            ->select('cu_ecs.*', 'cronograma_elemento_configuracion.Nombre as Nombre_ECS')
                            ->where('proyecto.Id', $ProyectoId)
                            ->get();
        $ListElementosPorCU = DB::table('cronograma_elemento_configuracion')
                            ->join('cu_ecs', 'cu_ecs.ECSId', '=', 'cronograma_elemento_configuracion.Id')
                            ->join('cu', 'cu.Id', '=', 'cu_ecs.CUId')
                            ->join('modulo', 'modulo.Id', '=', 'cu.ModuloId')
                            ->select('cronograma_elemento_configuracion.Id as EId', 'cu.*', 'modulo.Nombre as Modulo')
                            ->where('cu.ProyectoId', $ProyectoId)
                            ->orderBy('cu.Nombre','ASC')
                            ->get();
        return view('Proyecto.CU',[
            'Proyecto' => $Proyecto,
            'ListadoModulo' => $Modulo,
            'ListaCasoUso' => $casouso,
            'ListadoElementos' => $ListadoElementos,
            'ListElementosPorCU' => $ListElementosPorCU,
            'ListadoFase' => CronogramaFase::ListarPorCronogramaId($Cronograma->Id)
        ]);
    }

    public function FrmAgregar(){
        $ListadoMetodoliga = Metodologia::Listar();
        return view('Proyecto.agregar',[
            'ListadoMetodologia' => $ListadoMetodoliga
        ]);
    }

    public function ActAgregar(Request $request){
        $ObjProyecto = new Proyecto();
        $ObjProyecto->Nombre = $request->input('Nombre');
        $ObjProyecto->UsuarioId = $request->input('UsuarioJefeId');
        $ObjProyecto->FechaInicio = $request->input('FechaInicio');
        $ObjProyecto->MetodologiaId = $request->input('MetodologiaId');
        $ObjProyecto->Descripcion = $request->input('Descripcion');
        $ObjProyecto->Estado = 'En Progreso';
        $UsuarioId = $ObjProyecto->UsuarioJefeId;
        if(Proyecto::Agregar($ObjProyecto) > 0){ //PROYECTO
            return redirect()->route('home');
        }
        return redirect()->route('proyecto.listar');
    }

    public function EditarEstado(Request $request)
    {
        $ObjProyecto = Proyecto::ObtenerPorId($request->input('txtId'));
        $ObjProyecto->Estado = $request->input('txtEstado');
        if(Proyecto::Editar($ObjProyecto) > 0)
        {
            return redirect()->action('ProyectoController@Index');
        }
    }

    public function ConsultarChatbot($Entrada)
    {
        $Consulta = Chatbot::ObtenerSalida($Entrada);
        return view('Proyecto.Consultar',[
            'Consulta' => $Consulta
        ]);
    }

}

?>