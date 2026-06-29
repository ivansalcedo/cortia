<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title><?= htmlspecialchars($title ?? 'Cortinas') ?></title>
  <link rel="stylesheet" href="/css/style.css">
</head>
<body>
  <header class="container header">
    <div class="logo"><a href="/" style="color:inherit; text-decoration:none">CortinasCo</a></div>
    <nav>
      <?php if(!empty($categories)): ?>
        <?php foreach($categories as $navc): ?>
          <a href="/categoria/<?= htmlspecialchars($navc['slug']) ?>" class="category-pill"><?= htmlspecialchars($navc['name']) ?></a>
        <?php endforeach; ?>
      <?php endif; ?>
    </nav>
  </header>

  <main class="container">
    <?= $content ?? '' ?>
  </main>

  <footer class="container" style="padding:24px 0; color:var(--muted)">
    © <?= date('Y') ?> CortinasCo — Contacto: info@cortinasco.local
  </footer>
</body>
</html>
