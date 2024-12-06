<html lang="uk">
    <head><title>form</title></head>

<?php
/**
 * Анализ запроса (REQUEST)
 */
    if (isset($_POST['a']) && is_numeric($_POST['a'])) {
        $a = $_POST['a'];
    } else {
        $a = 10;
    }

    if (isset($_POST['b'])) {
        $b = $_POST['b'];
    } else {
        $b = 10;
    }

    $c = $a + $b;

?>

<body>
<form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">

    <label>a:
        <input type="number" value="<?= $a?>"  name="a">
    </label><br>
    <label>b:
        <input type="number" value="<?= $b?>"  name="b">
    </label><br>
    <h3>Result: <?php echo $c; ?></h3>
    <input type="submit">
</form>

<script>
    console.log("<?php echo "$a + $b = $c"; ?>");
</script>

<?php

echo "<footer><pre>";
echo "<h2>GET</h2>";
var_dump($_GET);

echo "<h2>POST</h2>";
var_dump($_POST);
?>

</body>
</html>

