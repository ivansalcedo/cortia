<?php
// public/index.php - front controller (simple)
require __DIR__ . '/../bootstrap.php';
$bootstrap = require __DIR__ . '/../bootstrap.php';
$blade = $bootstrap['blade'];

// Basic router fallback (for simple deployments). Replace with Leaf router when available.
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

// Simple route matching
if ($uri === '/' && $method === 'GET') {
    (new App\Controllers\CatalogController($blade))->index();
    exit;
}

if (preg_match('#^/categoria/([^/]+)$#', $uri, $m) && $method === 'GET') {
    $slug = $m[1];
    (new App\Controllers\CatalogController($blade))->category($slug);
    exit;
}

if (preg_match('#^/producto/([^/]+)$#', $uri, $m) && $method === 'GET') {
    $slug = $m[1];
    (new App\Controllers\ProductController($blade))->show($slug);
    exit;
}

// 404
http_response_code(404);
echo $blade->render('errors.404');
