<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
include('includes/navbar.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Botanik Bahçesi Yönetim Sistemi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4 text-center">
        <h1>Botanik Bahçesi Yönetim Sistemine Hoşgeldiniz!</h1>
        <div class="mt-4">
            <a href="view_plants.php" class="btn btn-primary">Bitkileri Görüntüle</a>
            <a href="add_plant.php" class="btn btn-success">Bitki Ekle</a>
            <a href="edit_plant.php" class="btn btn-warning">Bitki Düzenle</a>
            <a href="delete_plant.php" class="btn btn-danger">Bitki Sil</a>
            <a href="logout.php" class="btn btn-secondary">Çıkış Yap</a>
        </div>
    </div>
    <?php include('includes/footer.php'); ?>
</body>
</html>
