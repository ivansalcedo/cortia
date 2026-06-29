INSERT INTO categories (name, slug, description) VALUES
('Cortinas Blackout', 'blackout', 'Cortinas opacas ideales para dormitorios'),
('Cortinas Térmicas', 'termicas', 'Cortinas con aislante térmico'),
('Paneles Japoneses', 'paneles-japoneses', 'Paneles modernos para puertas y ventanas');

INSERT INTO products (category_id, name, slug, description, price, width, height, material, sku) VALUES
(1, 'Blackout Gris', 'blackout-gris', 'Blackout opaco para dormitorio', 120.00, 140, 260, 'Poliéster', 'BKG-001'),
(2, 'Térmica Naranja', 'termica-naranja', 'Cortina térmica aislante', 150.00, 160, 270, 'Microfibra', 'TRM-002');

INSERT INTO product_images (product_id, path, alt, is_main) VALUES
(1, '/images/placeholder.svg', 'Blackout Gris', 1),
(2, '/images/placeholder.svg', 'Térmica Naranja', 1);
