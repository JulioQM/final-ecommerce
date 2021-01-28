<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <!-- <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="" alt="User Image">
        <div>
          <p class="app-sidebar__user-name">José Luis P.</p>
          <p class="app-sidebar__user-designation">Administrador</p>
        </div>
      </div> -->
      <ul class="app-menu">
        <!-- <li><a class="app-menu__item" href="<?= base_url(); ?>/dashboard"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li> -->
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-users" aria-hidden="true"></i><span class="app-menu__label">Usuarios</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <!-- <li><a class="treeview-item" href="< ?= base_url(); ?>/"><i class="icon fa fa-circle-o"></i> Crear Usuario</a></li> -->
            <li><a class="treeview-item" href="<?= base_url(); ?>/Views/Usuarios/usuarios.php"><i class="icon fa fa-circle-o"></i> Usuarios</a></li>
            <li><a class="treeview-item" href="<?= base_url(); ?>/Views/Roles/roles.php"><i class="icon fa fa-circle-o"></i> Roles</a></li>
          </ul>
        </li>

        <!-- <li><a class="app-menu__item" href="< ?= base_url(); ?>/Views/Publicidad/publicidad.php"><i class="app-menu__icon far fa-list-alt" aria-hidden="true"></i><span class="app-menu__label">Publicidades</span></a></li> -->
        
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-file-invoice" aria-hidden="true"></i><span class="app-menu__label">Reportes</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="<?= base_url(); ?>/Views/Publicidad/publicidad.php"><i class="icon fa fa-circle-o"></i> Publicidades</a></li>
            <li><a class="treeview-item" href="<?= base_url(); ?>/Views/Reportes/pedidos.php"><i class="icon fa fa-circle-o"></i> Pedidos</a></li>
          </ul>
        </li>
      </ul>
    </aside>