<?php

namespace Config;

$routes = Services::routes();

if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

$routes->get('/', 'Alunos::index');
$routes->match(['get', 'post'], 'alunos/inserir', 'Alunos::inserir');
$routes->match(['get', 'post'], 'alunos/gravar', 'Alunos::gravar');
$routes->match(['get', 'post'], 'alunos/editar/(:num)', 'Alunos::editar/$1');
$routes->match(['get', 'post'], 'alunos/excluir/(:num)', 'Alunos::excluir/$1');
$routes->get('alunos', 'Alunos::index');
$routes->get('alunos/(:segment)', 'Alunos::item/$1');

if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}