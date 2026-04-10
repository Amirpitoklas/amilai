<?php include 'config.php'; ?>
<h2>Активные аукционы</h2>
<table border="1">
    <tr>
        <th>Товар</th>
        <th>Начальная цена</th>
        <th>Фото</th>
        <th>Действие</th>
    </tr>
<?php
$query = "SELECT * FROM barang WHERE status='open'";
$result = mysqli_query($conn, $query);
while($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
            <td>{$row['nama_barang']}</td>
            <td>{$row['harga_awal']}</td>
            <td><img src='assets/{$row['foto']}' width='100'></td>
            <td><a href='detail.php?id={$row['id']}'>Посмотреть и сделать ставку</a></td>
          </tr>";
}
?>
</table>
