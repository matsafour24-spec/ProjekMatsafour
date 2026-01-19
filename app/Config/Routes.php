<?php

namespace Config;

use CodeIgniter\Config\Services;

/**
 * @var RouteCollection $routes
 */
$routes = Services::routes();

/*
|--------------------------------------------------------------------------
| Router Setup
|--------------------------------------------------------------------------
*/
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('AuthController');
$routes->setDefaultMethod('login');
$routes->setTranslateURIDashes(true);
$routes->set404Override();
$routes->setAutoRoute(false);

/*
|--------------------------------------------------------------------------
| AUTH (NON-ROLE)
|--------------------------------------------------------------------------
*/
$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::authenticate');
$routes->get('logout', 'AuthController::logout');

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/
$routes->group('admin', ['filter' => 'authadmin'], static function ($routes) {

    // Dashboard
    $routes->get('dashboard', 'Admin\DashboardController::index');

    // Operator Management
    $routes->get('operators', 'Admin\UserController::index');
    $routes->get('operators/create', 'Admin\UserController::create');
    $routes->post('operators/store', 'Admin\UserController::store');
    $routes->get('operators/(:num)/edit', 'Admin\UserController::edit/$1');
    $routes->post('operators/(:num)/update', 'Admin\UserController::update/$1');
    $routes->post('operators/(:num)/deactivate', 'Admin\UserController::deactivate/$1');

    // Monitoring
    $routes->get('monitoring', 'Admin\MonitoringController::index');
});

/*
|--------------------------------------------------------------------------
| OPERATOR ROUTES
|--------------------------------------------------------------------------
*/
$routes->group('operator', ['filter' => 'authoperator'], static function ($routes) {

    // Dashboard
    $routes->get('dashboard', 'Operator\DashboardController::index');

    // Guru Search (Hybrid Data Table)
    $routes->get('guru/search', 'Operator\GuruController::search');

    // Guru Management
    $routes->get('guru', 'Operator\GuruController::index');
    $routes->get('guru/create', 'Operator\GuruController::create');
    $routes->post('guru/store', 'Operator\GuruController::store');
    $routes->get('guru/(:num)', 'Operator\GuruController::show/$1');
    $routes->post('guru/(:num)/update', 'Operator\GuruController::update/$1');
    $routes->post('guru/(:num)/deactivate', 'Operator\GuruController::deactivate/$1');

    // Export
    $routes->post('guru/export', 'Operator\ExportController::guru');
});

/*
|--------------------------------------------------------------------------
| GURU ROUTES
|--------------------------------------------------------------------------
*/
$routes->group('guru', ['filter' => 'authguru'], static function ($routes) {

    // Dashboard
    $routes->get('dashboard', 'Guru\DashboardController::index');

    // Biodata
    $routes->get('biodata', 'Guru\ProfilController::index');
    $routes->post('biodata/update', 'Guru\ProfilController::update');
    $routes->post('biodata/upload-foto', 'Guru\ProfilController::uploadFoto');

    // Kepegawaian
    $routes->get('kepegawaian', 'Guru\KepegawaianController::index');
    $routes->post('kepegawaian/update', 'Guru\KepegawaianController::update');
    $routes->post('kepegawaian/upload-sk', 'Guru\KepegawaianController::uploadSK');

    // Keluarga
    $routes->get('keluarga', 'Guru\KeluargaController::index');
    $routes->post('keluarga/update', 'Guru\KeluargaController::update');

    // Riwayat Kepegawaian
    $routes->get('riwayat-kepegawaian', 'Guru\RiwayatKepegawaianController::index');
    $routes->post('riwayat-kepegawaian/store', 'Guru\RiwayatKepegawaianController::store');
    $routes->post('riwayat-kepegawaian/upload', 'Guru\RiwayatKepegawaianController::upload');

    // Riwayat Pendidikan
    $routes->get('riwayat-pendidikan', 'Guru\RiwayatPendidikanController::index');
    $routes->post('riwayat-pendidikan/store', 'Guru\RiwayatPendidikanController::store');
    $routes->post('riwayat-pendidikan/upload', 'Guru\RiwayatPendidikanController::upload');

    // Sertifikasi
    $routes->get('sertifikasi', 'Guru\SertifikasiController::index');
    $routes->post('sertifikasi/update', 'Guru\SertifikasiController::update');
    $routes->post('sertifikasi/upload', 'Guru\SertifikasiController::upload');

    // Portofolio PDF
    $routes->get('portofolio/pdf', 'Guru\PortofolioController::pdf');
});
