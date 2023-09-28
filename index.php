<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Homepage</title>
</head>
<body>
    <?php
        // @include('./elements/navbar.php');
        include_once('./elements/navbar.php');
    ?>
    <main>
        <h1>Homepage</h1>
    </main>
    <?php
        // require('./elements/footer.php');
        require_once('./elements/footer.php');
    ?>
</body>
</html>
<!-- @ przed include - nie wywala errora -->