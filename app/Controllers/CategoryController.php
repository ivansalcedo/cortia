<?php
namespace App\Controllers;

use App\Models\Database;

class CategoryController
{
    public function show($params)
    {
        $slug = $params['slug'] ?? null;
        if (!$slug) {
            http_response_code(404);
            include __DIR__ . '/../../resources/views/404.php';
            return;
        }
        $db = Database::get();
        $stmt = $db->prepare('SELECT id, name, slug FROM categories WHERE slug = :s LIMIT 1');
        $stmt->execute(['s' => $slug]);
        $cat = $stmt->fetch();
        if (!$cat) {
            http_response_code(404);
            include __DIR__ . '/../../resources/views/404.php';
            return;
        }

        $stmt = $db->prepare('SELECT p.id, p.name, p.slug, p.price, pi.path as image FROM products p LEFT JOIN product_images pi ON pi.product_id = p.id AND pi.is_main = 1 WHERE p.category_id = :cid GROUP BY p.id');
        $stmt->execute(['cid' => $cat['id']]);
        $products = $stmt->fetchAll();

        $categories = $db->query('SELECT id, name, slug FROM categories ORDER BY name')->fetchAll();
        $title = 'Categoría - ' . $cat['name'];
        include __DIR__ . '/../../resources/views/catalog.php';
    }
}
