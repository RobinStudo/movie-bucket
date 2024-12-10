<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Bucket</title>

    <link rel="stylesheet" href="<?php echo __BASE_URL__ . '/css/app.css'; ?>">
</head>
<body>
    <header>
        Movie Bucket
    </header>

    <main>
        <?php require $contentPath; ?>
    </main>

    <footer>
        Movie Bucket - <?php echo date('Y'); ?>
    </footer>
</body>
</html>
