<html lang="uk">

<?php require_once __DIR__ . '/head.tpl.php'; ?>

<body>
<?php require_once __DIR__ . '/header.tpl.php'; ?>

<main>
    <?php
    require_once __DIR__ . '/../' . $this->templateName . '.tpl.php';
    ?>
</main>

<?php require_once __DIR__ . '/footer.tpl.php'; ?>
</body>
</html>
