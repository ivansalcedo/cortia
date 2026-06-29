<?php ob_start(); ?>
<a href="/categoria/<?= htmlspecialchars($product['category_slug']) ?>" class="category-pill"><?= htmlspecialchars($product['category_name']) ?></a>

<div class="product-main" style="margin-top:12px;">
  <div class="gallery">
    <?php if(!empty($images)): ?>
      <img src="<?= htmlspecialchars($images[0]['path']) ?>" alt="<?= htmlspecialchars($images[0]['alt'] ?? $product['name']) ?>" style="width:100%; height:420px; object-fit:cover; border-radius:6px;">
    <?php else: ?>
      <img src="/images/placeholder.svg" alt="Sin imagen" style="width:100%; height:420px; object-fit:cover; border-radius:6px;">
    <?php endif; ?>
  </div>

  <aside class="details">
    <h1 style="margin-top:0"><?= htmlspecialchars($product['name']) ?></h1>
    <div class="price" style="font-size:20px; margin-bottom:8px">$<?= number_format($product['price'],2) ?></div>
    <p style="color:var(--muted)"><?= nl2br(htmlspecialchars($product['description'])) ?></p>

    <ul style="margin:12px 0; padding-left:18px; color:var(--muted)">
      <?php if(!empty($product['width'])): ?><li>Ancho: <?= htmlspecialchars($product['width']) ?> cm</li><?php endif; ?>
      <?php if(!empty($product['height'])): ?><li>Alto: <?= htmlspecialchars($product['height']) ?> cm</li><?php endif; ?>
      <?php if(!empty($product['material'])): ?><li>Material: <?= htmlspecialchars($product['material']) ?></li><?php endif; ?>
      <?php if(!empty($product['sku'])): ?><li>SKU: <?= htmlspecialchars($product['sku']) ?></li><?php endif; ?>
    </ul>

    <a class="btn" href="/contacto?producto=<?= urlencode($product['slug']) ?>">Pedir/Consultar</a>
  </aside>
</div>
<?php $content = ob_get_clean(); ?>
<?php include __DIR__.'/layout.php'; ?>
