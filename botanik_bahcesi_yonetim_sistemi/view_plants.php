<?php
include('includes/navbar.php');
include('includes/db.php');
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$stmt = $conn->prepare("SELECT * FROM plants");
$stmt->execute();
$plants = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bitki Listesi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Bitki Listesi</h2>
        <div class="row">
            <?php foreach ($plants as $plant): ?>
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="uploads/<?php echo $plant['image']; ?>" class="card-img-top" alt="<?php echo $plant['name']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $plant['name']; ?></h5>
                        <p class="card-text"><?php echo $plant['description']; ?></p>
                        <a href="edit_plant.php?id=<?php echo $plant['id']; ?>" class="btn btn-secondary">Düzenle</a>
                        <a href="delete_plant.php?id=<?php echo $plant['id']; ?>" class="btn btn-danger" onclick="return confirm('Bu bitkiyi silmek istediğinizden emin misiniz?')">Sil</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="mt-4">
            <a href="index.php" class="btn btn-primary">Ana Sayfaya Git</a>
            <button onclick="history.back()" class="btn btn-secondary">Geri Dön</button>
        </div>
    </div>
    <?php include('includes/footer.php'); ?>
</body>
</html>
