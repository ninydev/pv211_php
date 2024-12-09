<html>
<head>
    <title>Translate</title>
</head>
<?php
$result = 'Немае перекладу';

    if(isset($_POST['submit'])) {
        $text = $_POST['text'];
        if (!empty($text)) {
            require_once 'send.php';
            $result = send($_POST['text']);
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

