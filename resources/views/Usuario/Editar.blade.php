@extends('layouts.default')
@section('content')
<!-- title -->
<div class="app-title">
    <div>
    <h1>{{ $Usuario->Nombre.' '.$Usuario->Apellido }}</h1>
    <p>{{ $Usuario->Correo }}</p>
    </div>
</div>
<!-- content -->
<div class="row">
    <div class="col-md-12">
        <form action="{{ url('usuario/editar') }}" method="POST">
            <div class="tile">
                <div class="w-100">
                    <h4>Editar</h4>
                </div>
                <hr>
                <div class="tile-body">     
                    <div class="form-group">
                        <label class="control-label"><b>Nombre: *</b></label>
                        <input class="form-control" name="TxtNombre" type="text" value="{{ $Usuario->Nombre }}" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label"><b>Apellido:</b></label>
                        <input class="form-control" name="TxtApellido" type="text" value="{{ $Usuario->Apellido }}" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label"><b>Correo electrónico: *</b></label>
                        <input class="form-control" name="TxtCorreo" type="email" value="{{ $Usuario->Correo }}" readonly>
                    </div>
                    <div class="form-group">
                        <label class="control-label"><b>Tipo de Usuario:</b></label>
                        <?php if($Usuario->TipoUsuarioId == 1){ ?>
                        <input class="form-control" name="TxtTipoUsuarioId" type="hidden" value="{{ $Usuario->TipoUsuarioId }}" >
                        <input class="form-control" type="text" value="Administrador" readonly>
                        <?php } else { ?>
                        <select name="TxtTipoUsuarioId" class="form-control" required>
                            @foreach($ListadoTipoUsuario as $TipoUsuario)
                            @if($TipoUsuario->Id != 1)
                            <option value="{{ $TipoUsuario->Id }}" {{$TipoUsuario->Id==$Usuario->TipoUsuarioId?'selected':''}}>{{ $TipoUsuario->Nombre }}</option>
                            @endif
                            @endforeach
                        </select>
                        <?php } ?>
                    </div>
                </div>
                <div class="tile-footer">
                    <div class="form-group">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="TxtId" value="{{ $Usuario->Id }}" required>
                        <button class="btn btn-primary text-uppercase" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Guardar Cambios</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@stop