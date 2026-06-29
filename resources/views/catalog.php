<?php ob_start(); ?>
<h1>Catálogo</h1>

<div class="categories">
  <?php if(!empty($categories)): foreach($categories as $c): ?>
    <a href="/categoria/<?= htmlspecialchars($c['slug']) ?>" class="category-pill"><?= htmlspecialchars($c['name']) ?></a>
  <?php endforeach; endif; ?>
</div>

<div class="grid">
  <?php foreach($products as $p): ?>
  <article class="card">
    <a href="/producto/<?= htmlspecialchars($p['slug']) ?>">
      <img src="<?= htmlspecialchars($p['image'] ?? '/images/placeholder.svg') ?>" alt="<?= htmlspecialchars($p['name']) ?>">
    </a>
    <div class="body">
      <h3 class="title"><?= htmlspecialchars($p['name']) ?></h3>
      <div class="price">$<?= number_format($p['price'], 2) ?></div>
    </div>
  </article>
  <?php endforeach; ?>
</div>

<?php $content = ob_get_clean(); ?>
<?php include __DIR__.'/layout.php'; ?>
