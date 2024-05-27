<?php
include('includes/navbar.php');
include('includes/db.php');
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    $target = 'uploads/' . basename($image);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $stmt = $conn->prepare("INSERT INTO plants (name, description, image) VALUES (?, ?, ?)");
        $stmt->execute([$name, $description, $image]);
        header('Location: view_plants.php');
    } else {
        echo "Resim yükleme başarısız!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bitki Ekle</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Bitki Ekle</h2>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Bitki Adı</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="description">Açıklama</label>
                <textarea class="form-control" id="description" name="description" required></textarea>
            </div>
            <div class="form-group">
                <label for="image">Resim</label>
                <input type="file" class="form-control-file" id="image" name="image" required>
            </div>
            <button type="submit" class="btn btn-primary">Kaydet</button>
        </form>
        <div class="mt-4">
            <a href="index.php" class="btn btn-primary">Ana Sayfaya Git</a>
            <button onclick="history.back()" class="btn btn-secondary">Geri Dön</button>
        </div>
    </div>
    <?php include('includes/footer.php'); ?>
</body>
</html>
