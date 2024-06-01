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
        @if($Proyecto->Estado != 0)
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="proyecto d-flex justify-content-between align-items-center">
                
                <a class="d-flex justify-content-start align-items-center" href="/proyecto/{{ $Proyecto->Id }}">
                    <i class="app-menu__icon fa fa-<?= $Proyecto->Estado == '1' ? 'folder' : 'star' ?>"></i>
                    <b>{{ $Proyecto->Nombre }}</b>
                </a>
                <div class="d-flex justify-content-center align-items-center">
                    <span class="material-symbols-outlined more" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">more_vert</span>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item d-flex justify-content-start align-items-center" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-users mr-2"></i> Compartir</a>

                        <?php if($Proyecto->Estado == '1'){ ?>
                        <form action="/proyecto/editarEstado" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="txtId" value="{{ $Proyecto->Id }}">
                            <input type="hidden" name="txtEstado" value="2">
                            <button class="dropdown-item d-flex justify-content-start align-items-center" style="cursor: pointer;" type="submit"><i class="fa fa-star mr-2"></i> Añadir a Favoritos</button>
                        </form>
                        <?php } else{ ?>
                        <form action="/proyecto/editarEstado" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="txtId" value="{{ $Proyecto->Id }}">
                            <input type="hidden" name="txtEstado" value="1">
                            <button class="dropdown-item d-flex justify-content-start align-items-center" style="cursor: pointer;" type="submit"><i class="fa fa-star mr-2"></i> Quitar de Favoritos</button>
                        </form>
                        <?php } ?>
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

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Compartir Proyecto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/proyecto/compartir" method="POST">
            <div class="modal-body">
                <div class="form-group">
                    <label class="control-label">Correo</label>
                    <input class="form-control" name="txtCorreo" type="email">
                    <input type="hidden" name="txtId" value="{{ $Proyecto->Id }}">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Compartir</button>
            </div>
            </form>
            </div>
        </div>
        </div>
        @endforeach

    </div>
    
</div>

<div class="col-lg-3 col-md-9 col-sm-12">
@include('includes.chatbot')
</div>

<div>
@stop