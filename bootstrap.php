<?php
// bootstrap.php
use Illuminate\Database\Capsule\Manager as Capsule;
use Jenssegers\Blade\Blade;

require __DIR__ . '/vendor/autoload.php';

// Configuración Eloquent
$capsule = new Capsule;
$capsule->addConnection([
    'driver'    => getenv('DB_DRIVER') ?: 'sqlite',
    'database'  => getenv('DB_DATABASE') ?: __DIR__ . '/database/database.sqlite',
    'prefix'    => '',
    'charset'   => 'utf8mb4',
    'collation' => 'utf8mb4_unicode_ci',
]);
$capsule->setAsGlobal();
$capsule->bootEloquent();

// Configuración Blade
$views = __DIR__ . '/resources/views';
$cache = __DIR__ . '/storage/framework/views';
if (!is_dir($cache)) { mkdir($cache, 0755, true); }
$blade = new Blade($views, $cache);

return compact('capsule', 'blade');
