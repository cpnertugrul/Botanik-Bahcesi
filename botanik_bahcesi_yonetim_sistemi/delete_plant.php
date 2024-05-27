<?php
include('includes/navbar.php');
include('includes/db.php');
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$id = $_GET['id'];
$stmt = $conn->prepare("DELETE FROM plants WHERE id = ?");
$stmt->execute([$id]);

header('Location: view_plants.php');
exit;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bitki Sil</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Bitki Sil</h2>
        <p>Bitki başarıyla silindi.</p>
        <div class="mt-4">
            <a href="index.php" class="btn btn-primary">Ana Sayfaya Git</a>
            <button onclick="history.back()" class="btn btn-secondary">Geri Dön</button>
        </div>
    </div>
    <?php include('includes/footer.php'); ?>
</body>
</html>
