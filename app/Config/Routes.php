<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('clave_nueva', 'Home::generate_hash');
$routes->get('login', 'LoginController::index');  // Ruta para mostrar el formulario de login
$routes->post('login/authenticate', 'LoginController::authenticate');  // Ruta para procesar el formulario de login
$routes->get('logout', 'LoginController::logout');
$routes->get('/login/selectCondominio', 'LoginController::index');
$routes->post('/login/selectCondominio', 'LoginController::selectCondominio');
$routes->get('/dashboard', 'HomeController::index', ['filter' => 'auth']);

// Condominios
$routes->get('condominios', 'CondominioController::index');
$routes->get('condominios/create', 'CondominioController::create');
$routes->post('condominios/store', 'CondominioController::store');
$routes->get('condominios/edit/(:segment)', 'CondominioController::edit/$1');
$routes->post('condominios/update/(:segment)', 'CondominioController::update/$1');
$routes->get('condominios/delete/(:segment)', 'CondominioController::delete/$1');

//Usuarios
// $routes->get('usuarios', 'UsuarioController::index');
// $routes->get('usuarios/create', 'UsuarioController::create');
// $routes->post('usuarios/store', 'UsuarioController::store');
// $routes->get('usuarios/edit/(:segment)', 'UsuarioController::edit/$1');
// $routes->post('usuarios/update/(:segment)', 'UsuarioController::update/$1');
// $routes->get('usuarios/delete/(:segment)', 'UsuarioController::delete/$1');
// $routes->get('usuarios/change_password', 'UsuarioController::changePassword');
// $routes->post('usuarios/updatePassword', 'UsuarioController::updatePassword');

//Usuario_Condominio
$routes->get('/condominio_usuario', 'CondominioUsuarioController::index');
$routes->get('/condominio_usuario/create', 'CondominioUsuarioController::create');
$routes->post('/condominio_usuario/store', 'CondominioUsuarioController::store');
$routes->get('/condominio_usuario/edit/(:num)/(:num)', 'CondominioUsuarioController::edit/$1/$2');
$routes->post('/condominio_usuario/update/(:num)/(:num)', 'CondominioUsuarioController::update/$1/$2');
$routes->get('/condominio_usuario/delete/(:num)/(:num)', 'CondominioUsuarioController::delete/$1/$2');

// Torres
$routes->get('/torre', 'TorreController::index');
$routes->get('/torre/create', 'TorreController::create');
$routes->post('/torre/store', 'TorreController::store');
$routes->get('/torre/edit/(:num)/(:num)', 'TorreController::edit/$1/$2');
$routes->post('/torre/update/(:num)/(:num)', 'TorreController::update/$1/$2');
$routes->get('/torre/delete/(:num)/(:num)', 'TorreController::delete/$1/$2');

//tipo_residente
$routes->group('tipo_residente', function($routes) {
    $routes->get('/', 'TipoResidenteController::index');
    $routes->get('create', 'TipoResidenteController::create');
    $routes->post('edit', 'TipoResidenteController::edit');
    $routes->post('store', 'TipoResidenteController::store');
    $routes->get('delete/(:num)', 'TipoResidenteController::delete/$1');
    
});
// $routes->get('/tipo_residente/delete/(:num)', 'TipoResidenteController::delete/$1');

// Departamentos
$routes->group('departamento', function($routes) {
    $routes->get('/', 'DepartamentoController::index');
    $routes->get('create', 'DepartamentoController::create');
    $routes->post('store', 'DepartamentoController::store');
    $routes->post('store_residente', 'DepartamentoController::store_residente');
    // $routes->get('delete/(:num)/(:num)/(:num)/(:num)', 'DepartamentoController::delete/$1/$2/$3/$4');
    $routes->get('delete/(:num)/(:num)', 'DepartamentoController::delete/$1/$2');
});

// Permiso Entrada
$routes->group('permiso_entrada', function($routes) {
    $routes->get('/', 'PermisoEntradaController::index');
    $routes->get('create', 'PermisoEntradaController::create');
    $routes->post('store', 'PermisoEntradaController::store');
    $routes->get('delete/(:num)', 'PermisoEntradaController::delete/$1');
});

// condominio_usuario_permiso_entrada
$routes->group('condominio_usuario_permiso_entrada', function($routes) {
    $routes->get('/', 'CondominioUsuarioPermisoEntradaController::index');
    $routes->get('create', 'CondominioUsuarioPermisoEntradaController::create');
    $routes->post('store', 'CondominioUsuarioPermisoEntradaController::store');
    $routes->get('delete/(:num)/(:num)/(:num)', 'CondominioUsuarioPermisoEntradaController::delete/$1/$2/$3');
});

// Visita
$routes->group('visita', function($routes) {
    $routes->get('/', 'VisitaController::index');
    $routes->get('create', 'VisitaController::create');
    $routes->post('store', 'VisitaController::store');
    $routes->get('invitar', 'VisitaController::invitar');
    $routes->post('invitar', 'VisitaController::sendInvitation');
    $routes->get('registrar', 'VisitaController::registrar');
    $routes->post('guardar', 'VisitaController::guardar');

});
// Usuario_Departamento
$routes->group('usuario_departamento', function($routes) {
    $routes->get('/', 'UsuarioDepartamentoController::index');
    $routes->get('create', 'UsuarioDepartamentoController::create');
    $routes->post('store', 'UsuarioDepartamentoController::store');
    $routes->get('edit/(:num)/(:num)', 'UsuarioDepartamentoController::edit/$1/$2');
    $routes->post('update/(:num)/(:num)', 'UsuarioDepartamentoController::update/$1/$2');
    $routes->get('delete/(:num)/(:num)', 'UsuarioDepartamentoController::delete/$1/$2');
});

// Camara
//creame las rutas para camara
$routes->group('camara', function($routes) {
    $routes->get('/', 'CamaraController::index');
    $routes->get('create', 'CamaraController::create');
    $routes->post('store', 'CamaraController::store');
    $routes->get('edit/(:num)', 'CamaraController::edit/$1');
    $routes->post('update/(:num)', 'CamaraController::update/$1');
    $routes->get('delete/(:num)', 'CamaraController::delete/$1');
});


//Forgot Password
$routes->get('/login/forgot_password', 'LoginController::forgot_password');
$routes->post('/login/reset_password', 'LoginController::reset_password');

// ----------------------------------------------------------------------------------------------------------------
// Rutas para ZonaController
$routes->get('zona', 'ZonaController::index');
$routes->get('zona/create', 'ZonaController::create');
$routes->post('zona/store', 'ZonaController::store');
$routes->get('zona/edit/(:num)', 'ZonaController::edit/$1');
$routes->post('zona/update/(:num)', 'ZonaController::update/$1');
$routes->delete('zona/delete/(:num)', 'ZonaController::delete/$1');

// Rutas para TipoZonaController
$routes->get('tipo_zona', 'TipoZonaController::index');
$routes->get('tipo_zona/create', 'TipoZonaController::create');
$routes->post('tipo_zona/store', 'TipoZonaController::store');
$routes->get('tipo_zona/edit/(:num)', 'TipoZonaController::edit/$1');
$routes->post('tipo_zona/update/(:num)', 'TipoZonaController::update/$1');
$routes->delete('tipo_zona/delete/(:num)', 'TipoZonaController::delete/$1');

// Tipo_usuario
$routes->get('tipo_usuario', 'TipoUsuarioController::index');
$routes->get('tipo_usuario/create', 'TipoUsuarioController::create');
$routes->post('tipo_usuario/store', 'TipoUsuarioController::store');
$routes->get('tipo_usuario/edit/(:num)', 'TipoUsuarioController::edit/$1');
$routes->post('tipo_usuario/update/(:num)', 'TipoUsuarioController::update/$1');
$routes->delete('tipo_usuario/delete/(:num)', 'TipoUsuarioController::delete/$1');

// Motivo alarma

$routes->get('motivo_alarma', 'MotivoAlarmaController::index');
$routes->get('motivo_alarma/create', 'MotivoAlarmaController::create');
$routes->post('motivo_alarma/store', 'MotivoAlarmaController::store');
$routes->get('motivo_alarma/edit/(:num)', 'MotivoAlarmaController::edit/$1');
$routes->post('motivo_alarma/update/(:num)', 'MotivoAlarmaController::update/$1');
$routes->delete('motivo_alarma/delete/(:num)', 'MotivoAlarmaController::delete/$1');

// Alarma
$routes->get('alarma', 'AlarmaController::index');
$routes->get('alarma/create', 'AlarmaController::create');
$routes->post('alarma/store', 'AlarmaController::store');
$routes->get('alarma/edit/(:num)', 'AlarmaController::edit/$1');
$routes->post('alarma/update/(:num)', 'AlarmaController::update/$1');
$routes->delete('alarma/delete/(:num)', 'AlarmaController::delete/$1');

// permiso_alarma
$routes->get('permisos_alarma', 'PermisosAlarmaController::index');
$routes->get('permisos_alarma/create', 'PermisosAlarmaController::create');
$routes->post('permisos_alarma/store', 'PermisosAlarmaController::store');
$routes->delete('permisos_alarma/delete/(:num)/(:num)', 'PermisosAlarmaController::delete/$1/$2');

// Unidad
$routes->get('unidad', 'UnidadController::index');
$routes->get('unidad/create', 'UnidadController::create');
$routes->post('unidad/store', 'UnidadController::store');
$routes->get('unidad/edit/(:num)', 'UnidadController::edit/$1');
$routes->post('unidad/update/(:num)', 'UnidadController::update/$1');
$routes->delete('unidad/delete/(:num)', 'UnidadController::delete/$1');

// TipoZonaHasUnidad
$routes->get('tipo_zona_has_unidad', 'TipoZonaHasUnidadController::index');
$routes->get('tipo_zona_has_unidad/create', 'TipoZonaHasUnidadController::create');
$routes->post('tipo_zona_has_unidad/store', 'TipoZonaHasUnidadController::store');
$routes->delete('tipo_zona_has_unidad/delete/(:num)/(:num)', 'TipoZonaHasUnidadController::delete/$1/$2');

// usuario
$routes->get('usuario', 'UsuarioController::index');
$routes->get('usuario/create', 'UsuarioController::create');
$routes->post('usuario/store', 'UsuarioController::store');
$routes->get('usuario/edit/(:num)', 'UsuarioController::edit/$1');
$routes->post('usuario/update/(:num)', 'UsuarioController::update/$1');
$routes->delete('usuario/delete/(:num)', 'UsuarioController::delete/$1');


// Alarma hostorial

$routes->post('alarma/historial', 'AlarmController::createHistorial');
$routes->get('alarmas/usuario/(:num)', 'AlarmaController::getAlarmasByUsuario/$1');
$routes->post('alarmas/activate', 'AlarmaController::activateAlarma');

// Historial
$routes->get('historial', 'HistorialAlarmaController::getAllHistorial');

