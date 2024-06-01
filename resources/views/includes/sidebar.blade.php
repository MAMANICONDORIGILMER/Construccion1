@php
$TU = Auth::user()->TipoUsuarioId;

$actual_link = "$_SERVER[REQUEST_URI]";
$modulo = explode("/", $actual_link);
@endphp
<ul class="app-menu">

        <li><a class="app-menu__item <?= $modulo[1] == "dashboard" ? "active" : "" ?>" href="/"><i class="app-menu__icon fa fa-folder"></i><span class="app-menu__label">Mis Proyectos</span></a></li>

        <li><a class="app-menu__item <?= $modulo[1] == "compartidos" ? "active" : "" ?>" href="/compartidos"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Compartidos Conmigo</span></a></li>

        <li><a class="app-menu__item <?= $modulo[1] == "destacados" ? "active" : "" ?>" href="/favoritos"><i class="app-menu__icon fa fa-star"></i><span class="app-menu__label">Favoritos</span></a></li>

        <li><a class="app-menu__item <?= $modulo[1] == "papelera" ? "active" : "" ?>" href="/papelera"><i class="app-menu__icon fa fa-trash"></i><span class="app-menu__label">Papelera</span></a></li>

        @if($TU==1)
        <!-- Metodologia -->
        <li><a class="app-menu__item <?= $modulo[1] == "metodologia" ? "active" : "" ?>" href="/metodologia/listar"><i class="app-menu__icon fa fa-folder"></i><span class="app-menu__label">Metodologias</span></a></li>
        <!-- Metodologia -->
        <!-- Usuario -->
        <li><a class="app-menu__item <?= $modulo[1] == "usuario" ? "active" : "" ?>" href="/usuario/listar"><i class="app-menu__icon fa fa-folder"></i><span class="app-menu__label">Usuarios</span></a></li>
        <!-- Usuario -->
        @endif

</ul>