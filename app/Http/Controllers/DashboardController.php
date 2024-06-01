<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Proyecto as Proyecto;

class DashboardController extends Controller
{
    
    public function Reportes()
    {
        return view('pages.home');
    }
}
?>