<?php
include('includes/navbar.php');
include('includes/db.php');
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM plants WHERE id = ?");
$stmt->execute([$id]);
$plant = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    $target = 'uploads/' . basename($image);

    if (!empty($image)) {
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $stmt = $conn->prepare("UPDATE plants SET name = ?, description = ?, image = ? WHERE id = ?");
            $stmt->execute([$name, $description, $image, $id]);
        } else {
            echo "Resim yükleme başarısız!";
        }
    } else {
        $stmt = $conn->prepare("UPDATE plants SET name = ?, description = ? WHERE id = ?");
        $stmt->execute([$name, $description, $id]);
    }

    header('Location: view_plants.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bitki Düzenle</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Bitki Düzenle</h2>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Bitki Adı</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $plant['name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="description">Açıklama</label>
                <textarea class="form-control" id="description" name="description" required><?php echo $plant['description']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="image">Resim</label>
                <input type="file" class="form-control-file" id="image" name="image">
            </div>
            <button type="submit" class="btn btn-primary">Güncelle</button>
        </form>
        <div class="mt-4">
            <a href="index.php" class="btn btn-primary">Ana Sayfaya Git</a>
            <button onclick="history.back()" class="btn btn-secondary">Geri Dön</button>
        </div>
    </div>
    <?php include('includes/footer.php'); ?>
</body>
</html>
