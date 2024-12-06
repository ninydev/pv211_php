<?php

require_once('lib.php');
someName('Before Header ');
    $SITE['SiteName'] = 'O Nykytin Blog';
    $SITE['PageName'] = 'Index';
?>

<html lang="uk">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>

<?php someName('Before Header '); ?>

<?php include 'header.php'; ?>

<main>
    <h2> Welcome </h2>
    <?php
        for ($i = 1; $i <= 3; $i++) {
            include ('article.php');
        }
    ?>
</main>

<?php include 'footer.php'; ?>
</body>
</html>
