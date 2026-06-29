<header class="site-header">
  <div class="container header-inner">
    <a href="/" class="logo">Cortinas</a>
    <nav>
      <a href="/">Inicio</a>
      <?php foreach(\App\Models\Category::all() as $c): ?>
        <a href="/categoria/<?php echo $c->slug; ?>"><?php echo $c->name; ?></a>
      <?php endforeach; ?>
    </nav>
  </div>
</header>
