<table>
    <thead>
    <tr>
        <th> id</th>
        <th> Name</th>
        <th> Brand</th>
        <th> Created</th>
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
    <tr>
        <td>    Build at: <?php echo date('Y-m-d H:i:s'); ?></td>
    </tr>
    </tfoot>
</table>