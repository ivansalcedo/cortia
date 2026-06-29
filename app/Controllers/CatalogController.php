<?php
namespace App\Controllers;

use App\Models\Category;
use App\Models\Product;

class CatalogController {
    protected $blade;

    public function __construct($blade) { $this->blade = $blade; }

    public function index() {
        $categories = Category::with(['products' => function($q){ $q->take(6); }])->get();
        echo $this->blade->render('catalog.index', compact('categories'));
    }

    public function category($slug) {
        $category = Category::where('slug', $slug)->first();
        if (!$category) {
            http_response_code(404);
            echo $this->blade->render('errors.404');
            return;
        }

        // Simple pagination emulación: limit + offset via query param page
        $page = max(1, (int)($_GET['page'] ?? 1));
        $perPage = 12;
        $productsQuery = $category->products()->with('mainImage');
        $total = $productsQuery->count();
        $products = $productsQuery->offset(($page-1)*$perPage)->limit($perPage)->get();

        echo $this->blade->render('catalog.category', compact('category','products','page','perPage','total'));
    }
}
