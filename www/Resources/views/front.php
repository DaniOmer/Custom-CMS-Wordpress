<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mon site MVC</title>
    <meta name="description" content="mon super site en MVC from scratch">
    <link rel="stylesheet" href="<?= \Core\Router::assets("/css/main.css") ?>">
</head>
<body>
<?php include $this->view; ?>
</body>
</html>
