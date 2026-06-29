<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title><?php echo isset($title) ? $title : 'Cortinas'; ?></title>
  <link rel="stylesheet" href="/css/app.css">
</head>
<body class="theme-bg">
  <?php echo $blade->render('partials.header'); ?>
  <main class="container">
    <?php echo $slot ?? ''; ?>
  </main>
  <?php echo $blade->render('partials.footer'); ?>
</body>
</html>
