<?php
namespace App\Controllers;

use App\Models\Database;

class HomeController
{
    public function index()
    {
        $db = Database::get();

        $cats = $db->query('SELECT id, name, slug FROM categories ORDER BY name')->fetchAll();
        $products = $db->query('SELECT p.id, p.name, p.slug, p.price, pi.path as image FROM products p LEFT JOIN product_images pi ON pi.product_id = p.id AND pi.is_main = 1 GROUP BY p.id ORDER BY p.created_at DESC LIMIT 24')->fetchAll();

        $title = 'Catálogo';
        include __DIR__ . '/../../resources/views/catalog.php';
    }
}
