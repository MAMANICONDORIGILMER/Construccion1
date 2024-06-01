@extends('layouts.default')
@section('content')

<!-- title -->
<div class="app-title mb-3">
    <h1><i class="fa fa-folder"></i> Listado de Usuarios</h1>
    <a href="/usuario/agregar" class="btn btn-secondary" title="Agregar Usuario"><i class="app-menu__icon fa fa-plus"></i> Agregar Usuario</a>
</div>
<!-- content -->
<div class="row">
  <div class="col-md-12">
    <div class="tile">
      <div class="tile-body table-responsive">
        <table class="table table-hover table-bordered" id="TableData">
          <thead>
            <tr>
              <th class="text-center" width="25px">N°</th>
              <th>NOMBRE</th>
              <th>CORREO ELECTRÓNICO</th>
              <th class="text-center" width="100px">ACCIONES</th>
            </tr>
          </thead>
          <tbody>
            @foreach($ListadoUsuario as $key => $Usuario)
                <tr>
                    <td class="text-center">{{$key+1}}</td>
                    <td>{{$Usuario->Nombre}}</td>
                    <td>{{$Usuario->Correo}}</td>
                    <td class="text-center">
                        <a href="/usuario/editar/{{ $Usuario->Id }}" class="btn btn-success btn-sm text-uppercase">Editar</a>
                    </td>
                </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<div>
    <a href="/usuario/agregar" class="btn-agregar2" title="Agregar Usuario"><i class="app-menu__icon fa fa-plus"></i></a>
</div>
@stop