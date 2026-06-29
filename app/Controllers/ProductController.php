<?php
namespace App\Controllers;

use App\Models\Database;

class ProductController
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
        $stmt = $db->prepare("SELECT p.*, c.name as category_name, c.slug as category_slug
            FROM products p
            JOIN categories c ON p.category_id = c.id
            WHERE p.slug = :slug LIMIT 1");
        $stmt->execute(['slug' => $slug]);
        $product = $stmt->fetch();

        if (!$product) {
            http_response_code(404);
            include __DIR__ . '/../../resources/views/404.php';
            return;
        }

        $stmt = $db->prepare('SELECT path, alt, is_main FROM product_images WHERE product_id = :pid ORDER BY is_main DESC, sort_order ASC');
        $stmt->execute(['pid' => $product['id']]);
        $images = $stmt->fetchAll();

        $title = $product['name'];
        include __DIR__ . '/../../resources/views/product.php';
    }
}
