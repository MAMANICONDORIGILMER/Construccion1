@extends('layouts.default')
@section('content')
<!-- title -->
<div class="app-title mb-5">
    <h1><i class="fa fa-pie-chart"></i> Nombre del Proyecto</h1>
</div>

<!-- content -->
<div class="row">

    @for ($i = 0; $i < 12; $i++)
    <!-- col -->
    <div class="col-lg-2 col-md-4 col-sm-6 mb-4">
        <a class="proyecto">
            <i class="app-menu__icon fa fa-folder"></i>
            <b>Nombre</b>
    </a>
    </div>
    <!-- col -->
    @endfor

</div>
@stop