<?php
require __DIR__ . '/../vendor/autoload.php';

// Carga variables de entorno si existe
if (file_exists(__DIR__ . '/../.env')) {
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
    $dotenv->load();
}

use Leaf\Route;

// Carga rutas
require __DIR__ . '/../routes.php';

// Inicia el router de Leaf (Route::run hace dispatch automáticamente en Leaf v3)
Route::run();
