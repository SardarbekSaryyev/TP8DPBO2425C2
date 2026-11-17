<?php $current = $_GET['page'] ?? 'lecturers'; ?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="assets/bootstrap.min.css" rel="stylesheet">
  <title>Campus - <?= e(ucfirst($current)) ?></title>
</head>

<body>
  <nav class="navbar navbar-expand navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Campus</a>
      <ul class="navbar-nav">
        <?php foreach (['lecturers' => 'Lecturers', 'departments' => 'Departments', 'courses' => 'Courses'] as $key => $label): ?>
          <li class="nav-item">
            <a class="nav-link <?= $current === $key ? 'active' : '' ?>" href="index.php?page=<?= $key ?>"><?= $label ?></a>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </nav>
  <div class="container my-4">
    <?php if (!empty($flash)): ?>
      <div class="alert alert-success"><?= e($flash) ?></div>
    <?php endif; ?>
