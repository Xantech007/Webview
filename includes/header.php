<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Modern web application">
    <title><?= htmlspecialchars($page_title ?? SITE_NAME) ?></title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Your custom CSS -->
    <link rel="stylesheet" href="<?= SITE_URL ?>assets/css/style.css">

    <!-- Favicon (optional) -->
    <link rel="icon" href="<?= SITE_URL ?>favicon.ico" type="image/x-icon">
</head>
<body>

<!-- Navigation -->
<?php include __DIR__ . '/navbar.php'; ?>

<main class="container mt-4">
