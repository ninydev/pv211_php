<?php
require_once "autoload.php";
?>
<html>
<head>
    <title>Translate</title>
</head>
<?php
$result = 'Немае перекладу';

    if(isset($_POST['submit'])) {
        $text = $_POST['text'];
        if (!empty($text)) {
            $result = Azure::translateText($text);
        }
    } else {
        $text = '';
    }
?>

<body>
<?php require_once 'form.php'?>
<hr>
<?php echo $result; ?>

<?php require_once 'footer.php'?>
</body>
</html>

