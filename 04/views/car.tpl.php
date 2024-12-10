<html lang="uk">

<?php require_once __DIR__ . '/layout/head.tpl.php'; ?>

<body>
<?php require_once __DIR__ . '/layout/header.tpl.php'; ?>

<main>
    А тут будет тело вьюхи - Partial подход
    <table>
        <thead>
            <tr>
                <th> id </th>
                <th> Name </th>
                <th> Brand </th>
                <th> Created </th>
            </tr>
        </thead>
        <tbody>
    <?php
        foreach ($data as $car) {
            echo "<tr>";
            echo "<td> {$car->id} </td>";
            echo "<td> {$car->name} </td>";
            echo "<td> {$car->brand} </td>";
            echo "<td> {$car->created_at} </td>";
            echo "</tr>";
        }
    ?>
        </tbody>
        <tfoot>
         Build at: <?php date('Y-m-d H:i:s'); ?>
        </tfoot>
    </table>

</main>

<?php require_once __DIR__ . '/layout/footer.tpl.php'; ?>
</body>
</html>
