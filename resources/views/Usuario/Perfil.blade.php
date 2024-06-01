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
                    <h4>Perfil de Usuario</h4>
                </div>
                <hr>
                <div class="tile-body">     
                    <div class="form-group">
                        <label class="control-label"><b>Nombre: *</b></label>
                        <input class="form-control" name="TxtNombre" type="text" value="{{ $Usuario->Nombre }}" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label"><b>Correo electrónico: *</b></label>
                        <input class="form-control" name="TxtCorreo" type="email" value="{{ $Usuario->Correo }}" readonly>
                    </div>
                    <div class="form-group">
                        <label class="control-label"><b>Contraseña:</b></label>
                        <input class="form-control" name="TxtPassword" type="password">
                    </div>
                    <div class="hiddenradio">
                        <label class="control-label"><b>Avatar:</b></label><br>
                        <label>
                            <input type="radio" name="TxtAvatar" value="1" <?= $Usuario->avatar == 1 ? 'checked' : '' ?>>
                            <img width="100px" height="100px" src="../assets/img/avatar-1.jpg">
                        </label>

                        <label>
                            <input type="radio" name="TxtAvatar" value="2" <?= $Usuario->avatar == 2 ? 'checked' : '' ?>>
                            <img width="100px" height="100px" src="../assets/img/avatar-2.jpg">
                        </label>
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