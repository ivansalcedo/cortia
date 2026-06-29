<?php
use Leaf\Route;

// Rutas principales
Route::get('/', 'App\\Controllers\\HomeController@index');
Route::get('/categoria/{slug}', 'App\\Controllers\\CategoryController@show');
Route::get('/producto/{slug}', 'App\\Controllers\\ProductController@show');

// Ruta estática para contacto (placeholder)
Route::get('/contacto', function(){
    echo "<h2>Contacto</h2><p>Formulario de contacto pendiente de implementación.</p>";
});
