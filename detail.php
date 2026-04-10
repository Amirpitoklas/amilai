<?php 
include 'config.php';
$id = $_GET['id'];
$barang = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM barang WHERE id=$id"));

if(isset($_POST['bid'])) {
    $harga = $_POST['harga'];
    $user_id = $_SESSION['id']; // сохрани id при логине
    
    mysqli_query($conn, "INSERT INTO lelang (id_barang, id_user, harga_akhir) 
                        VALUES ($id, $user_id, $harga)");
    
    // Обновить текущую цену
    mysqli_query($conn, "UPDATE barang SET harga_awal=$harga WHERE id=$id");
    echo "<script>alert('Ставка принята!');</script>";
}
?>

<h1><?= $barang['nama_barang'] ?></h1>
<img src="assets/<?= $barang['foto'] ?>" width="300">
<p>Текущая цена: <?= $barang['harga_awal'] ?> ₸</p>

<form method="POST">
    <input type="number" name="harga" placeholder="Ваша ставка" required>
    <button type="submit" name="bid">Сделать ставку</button>
</form>
