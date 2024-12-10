<html lang="uk">

<?php require_once __DIR__ . '/layout/head.tpl.php'; ?>

<body>
<?php require_once __DIR__ . '/layout/header.tpl.php'; ?>

<main>
    А тут будет тело вьюхи - Partial подход
    <pre>
        <?php
        var_dump($data);
        ?>
    </pre>
</main>

<?php require_once __DIR__ . '/layout/footer.tpl.php'; ?>
</body>
</html>
