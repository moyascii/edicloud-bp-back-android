<?php
$userData = session()->get();
$currentUrl = current_url();
$baseUrl = base_url();
$relativeUrl = str_replace($baseUrl, '', $currentUrl); // Obtén la URL relativa
$relativeUrl = str_replace('index.php', '', $relativeUrl); // Elimina 'index.php/' si está presente
function isActive($route, $relativeUrl)
{
  return strpos($relativeUrl, $route) === 0; // Verifica si la URL relativa comienza con la ruta base
}
?>
<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
  <!-- LOGO -->
  <div class="navbar-brand-box">
    <!-- Dark Logo-->
    <a href="<?= base_url('/dashboard') ?>" class="logo logo-dark">
      <span class="logo-sm">
        <img src="<?= base_url('/images/favicon.png') ?>" alt="" height="40">
      </span>
      <span class="logo-lg">
        <img src="<?= base_url('images/logo-edicloud.png') ?>" alt="" height="55">
      </span>
    </a>
    <!-- Light Logo-->
    <a href="<?= base_url('/dashboard') ?>" class="logo logo-light">
      <span class="logo-sm">
        <img src="<?= base_url('/images/favicon.png') ?>" alt="" height="40">
      </span>
      <span class="logo-lg">
        <img src="<?= base_url('images/logo-edicloud.png') ?>" alt="" height="55">
      </span>
    </a>
    <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
      <i class="ri-record-circle-line"></i>
    </button>
  </div>

  <div id="scrollbar">
    <div class="container-fluid">

      <div id="two-column-menu">
      </div>

        <ul class="navbar-nav" id="navbar-nav">
          <li class="menu-title"><span data-key="t-menu">Menú</span></li>
          <li class="nav-item">
            <a class="nav-link <?= isActive('/dashboard', $relativeUrl) ? 'active' : '' ?>" href="<?= base_url('/dashboard') ?>">
              <i class="ri-home-4-line"></i> <span data-key="t-dashboards">Inicio</span>
            </a>
            <a class="nav-link <?= isActive('usuarios/change_password', $relativeUrl) ? 'active' : '' ?>" href="<?= base_url('usuarios/change_password') ?>">
              <i class="ri-lock-line"></i> <span data-key="t-dashboards">Cambiar contraseña</span>
            </a>
          </li>

          <!-- Administración -->
          <?php if ($userData['user_type'] === 'Administrador Web') :  ?>
            <a class="nav-link <?= isActive('/usuario', $relativeUrl) ? 'active' : '' ?>" href="<?= base_url('/usuario') ?>">
              <i class="ri-user-line"></i> <span data-key="t-dashboards">Usuario</span>
            </a>
          <?php endif; ?>
          <li class="menu-title"><i class="ri-settings-3-line"></i> <span data-key="t-pages">Administración</span></li>
          <?php if ($userData['user_type'] === 'Administrador Web') :  ?>
            <a class="nav-link <?= isActive('/tipo_zona', $relativeUrl) ? 'active' : '' ?>" href="<?= base_url('/tipo_zona') ?>">
              <i class="ri-map-pin-line"></i> <span data-key="t-dashboards">Tipo de Zona</span>
            </a>
          <?php endif; ?>
          <?php if ($userData['user_type'] === 'Administrador Web' || $userData['user_type'] === 'Administrador Zona') :  ?>
            <a class="nav-link <?= isActive('/zona', $relativeUrl) ? 'active' : '' ?>" href="<?= base_url('/zona') ?>">
              <i class="ri-community-line"></i> <span data-key="t-dashboards">Zona</span>
            </a>
          <?php endif; ?>
          <?php if ($userData['user_type'] === 'Administrador Web') :  ?>
            <a class="nav-link <?= isActive('/tipo_usuario', $relativeUrl) ? 'active' : '' ?>" href="<?= base_url('/tipo_usuario') ?>">
              <i class="ri-user-settings-line"></i> <span data-key="t-dashboards">Tipo de Usuario</span>
            </a>
          <?php endif; ?>
          <?php if ($userData['user_type'] === 'Administrador Web' || $userData['user_type'] === 'Administrador Zona') :  ?>
            <a class="nav-link <?= isActive('/motivo_alarma', $relativeUrl) ? 'active' : '' ?>" href="<?= base_url('/motivo_alarma') ?>">
              <i class="ri-alarm-warning-line"></i> <span data-key="t-dashboards">Motivo Alarma</span>
            </a>
          <?php endif; ?>
          <?php if ($userData['user_type'] === 'Administrador Web') :  ?>
            <a class="nav-link <?= isActive('/alarma', $relativeUrl) ? 'active' : '' ?>" href="<?= base_url('/alarma') ?>">
              <i class="ri-notification-3-line"></i> <span data-key="t-dashboards">Alarma</span>
            </a>
          <?php endif; ?>
          <?php if ($userData['user_type'] === 'Administrador Web' || $userData['user_type'] === 'Administrador Zona') :  ?>
            <a class="nav-link <?= isActive('/permisos_alarma', $relativeUrl) ? 'active' : '' ?>" href="<?= base_url('/permisos_alarma') ?>">
              <i class="ri-shield-user-line"></i> <span data-key="t-dashboards">Permisos Alarma</span>
            </a>
          <?php endif; ?>
          <?php if ($userData['user_type'] === 'Administrador Web' || $userData['user_type'] === 'Administrador Zona') :  ?>
            <a class="nav-link <?= isActive('/unidad', $relativeUrl) ? 'active' : '' ?>" href="<?= base_url('/unidad') ?>">
              <i class="ri-home-4-line"></i> <span data-key="t-dashboards">Unidad</span>
            </a>
          <?php endif; ?>
          <?php if ($userData['user_type'] === 'Administrador Web' || $userData['user_type'] === 'Administrador Zona') :  ?>
            <a class="nav-link <?= isActive('/tipo_zona_has_unidad', $relativeUrl) ? 'active' : '' ?>" href="<?= base_url('/tipo_zona_has_unidad') ?>">
              <i class="ri-building-4-line"></i> <span data-key="t-dashboards">Zona Unidad</span>
            </a>
          <?php endif; ?>
          
          <?php if ($userData['user_type'] === 'Administrador Web') :  ?>
            <!-- <a class="nav-link <?= isActive('/visita', $relativeUrl) ? 'active' : '' ?>" href="<?= base_url('/visita') ?>">
              <i class="ri-user-follow-line"></i> <span data-key="t-dashboards">Visitas</span>
            </a> -->

            <!-- ./ Administración -->
            <li class="menu-title"><span data-key="t-menu">Programación</span></li>
            <a class="nav-link <?= strpos($currentUrl, 'https://themesbrand.com/velzon/html/default/index.html') !== false ? 'active' : '' ?>" target="_blank" href="https://themesbrand.com/velzon/html/default/index.html">
              <i class="ri-external-link-line"></i> <span data-key="t-dashboards">Velzon</span>
            </a>

          <?php endif; ?>
        </ul>
    </div>
    <!-- Sidebar -->
  </div>

  <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
