 <!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="overflow-x: hidden;">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
      <img src="{{ url('/') }}/views/img/icono.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Blog Admin </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ url('/') }}/views/img/opinions/anonimo.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Antonio</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ url('/') }}" class="nav-link">
              <i class="nav-icon fa fa-home"></i>
              <p>
                 Blog
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/administradores') }}" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
                 Administradores
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/categorias') }}" class="nav-link">
              <i class="nav-icon fa fa-list"></i>
              <p>
                 Categorias
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/articulos') }}" class="nav-link">
              <i class="nav-icon fa fa-sticky-note"></i>
              <p>
                 Artículos
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/opiniones') }}" class="nav-link">
              <i class="nav-icon fa fa-user-check"></i>
              <p>
                Opiniones
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/banners') }}" class="nav-link">
              <i class="nav-icon fa fa-images"></i>
              <p>
                Banners
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/anuncios') }}" class="nav-link">
              <i class="nav-icon fa fa-bullhorn"></i>
              <p>
                Anuncios
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ substr(url(''),0,-11 )}}" class="nav-link">
              <i class="nav-icon fa fa-globe"></i>
              <p>
                Ver Blog
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>