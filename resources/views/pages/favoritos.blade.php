@extends('layouts.default')
@section('content')
<!-- title -->

<div class="row">

<div class="col-lg-9 col-md-9 col-sm-12">
    <div class="app-title mb-5">
        <h1><i class="fa fa-star"></i> Favoritos</h1>
        <a href="/proyecto/agregar" class="btn btn-secondary" title="Agregar Proyecto"><i class="app-menu__icon fa fa-plus"></i> Agregar Proyecto</a>
    </div>

    <!-- content -->
    <div class="row">

        @foreach($ListadoProyecto as $Key => $Proyecto)
        <!-- col -->
        @if($Proyecto->Estado == 2)
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="proyecto d-flex justify-content-between align-items-center">
                
                <a class="d-flex justify-content-start align-items-center" href="/proyecto/{{ $Proyecto->Id }}">
                    <i class="app-menu__icon fa fa-star"></i>
                    <b>{{ $Proyecto->Nombre }}</b>
                </a>
                <div class="d-flex justify-content-center align-items-center">
                    <span class="material-symbols-outlined more" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">more_vert</span>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item d-flex justify-content-start align-items-center" href="/proyecto/c{{ $Proyecto->Id }}"><i class="fa fa-users mr-2"></i> Compartir</a>
                        <form action="/proyecto/editarEstado" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="txtId" value="{{ $Proyecto->Id }}">
                            <input type="hidden" name="txtEstado" value="1">
                            <button class="dropdown-item d-flex justify-content-start align-items-center" style="cursor: pointer;" type="submit"><i class="fa fa-star mr-2"></i> Quitar de Favoritos</button>
                        </form>
                        <div class="dropdown-divider"></div>
                        <form action="/proyecto/editarEstado" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="txtId" value="{{ $Proyecto->Id }}">
                            <input type="hidden" name="txtEstado" value="0">
                            <button class="dropdown-item d-flex justify-content-start align-items-center" style="cursor: pointer;" type="submit"><i class="fa fa-trash mr-2"></i> Mover a la Papelera</button>
                        </form>
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