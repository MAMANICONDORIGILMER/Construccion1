<!-- Navbar-->
<header class="app-header"><a class="app-header__logo" href="{{ url('dashboard') }}" title="Gestion de la Configuración de Software">SGP</a>
      <!-- Sidebar toggle button-->
      <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <!--<li><a class="dropdown-item" href=""><i class="fa fa-cog fa-lg"></i> Ajustes</a></li>-->
            <?php $TU = Auth::user(); ?>
            <li><a class="dropdown-item" href="/perfil/{{ $TU->Id }}"><i class="fa fa-user fa-lg"></i>Perfil</a></li>
            <li><a class="dropdown-item" href="{{ url('logout') }}"><i class="fa fa-sign-out fa-lg"></i>Cerrar sesión</a></li>
          </ul>
        </li>
      </ul>
</header>