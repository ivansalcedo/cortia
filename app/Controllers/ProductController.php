<?php
namespace App\Controllers;

use App\Models\Product;

class ProductController {
    protected $blade;

    public function __construct($blade) { $this->blade = $blade; }

    public function show($slug) {
        $product = Product::where('slug', $slug)->with('images','category')->first();
        if (!$product) {
            http_response_code(404);
            echo $this->blade->render('errors.404');
            return;
        }
        echo $this->blade->render('product.show', compact('product'));
    }
}
