@extends('layouts.default')
@section('content')
<!-- title -->

<div class="row">

<div class="col-lg-9 col-md-9 col-sm-12">
    <div class="app-title mb-5">
        <h1><i class="fa fa-folder"></i> Mis Proyectos</h1>
        <a href="/proyecto/agregar" class="btn btn-secondary" title="Agregar Proyecto"><i class="app-menu__icon fa fa-plus"></i> Agregar Proyecto</a>
    </div>

    <!-- content -->
    <div class="row">

        @foreach($ListadoProyecto as $Key => $Proyecto)
        <!-- col -->
        @if($Proyecto->estado == 0)
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="proyecto d-flex justify-content-between align-items-center">
                
                <a class="d-flex justify-content-start align-items-center" href="/proyecto/{{ $Proyecto->Id }}">
                    <i class="app-menu__icon fa fa-folder"></i>
                    <b>{{ $Proyecto->Nombre }}</b>
                </a>
                <div class="d-flex justify-content-center align-items-center">
                    <span class="material-symbols-outlined more" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">more_vert</span>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item d-flex justify-content-start align-items-center" href="/proyecto/compartir/{{ $Proyecto->Id }}"><i class="fa fa-users mr-2"></i> Compartir</a>
                        <a class="dropdown-item d-flex justify-content-start align-items-center" href="/proyecto/favoritos/{{ $Proyecto->Id }}"><i class="fa fa-star mr-2"></i> Añadir a Favoritos</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item d-flex justify-content-start align-items-center" href="/proyecto/papelera/{{ $Proyecto->Id }}"><i class="fa fa-trash mr-2"></i> Mover a la Papelera</a>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <!-- col -->
        @endforeach

    </div>

    
</div>

<div>
    <a href="/proyecto/agregar" class="btn-agregar" title="Agregar Proyecto"><i class="app-menu__icon fa fa-plus"></i></a>
</div>

<div class="col-lg-3 col-md-9 col-sm-12">
@include('includes.chatbot')
</div>

<div>
@stop