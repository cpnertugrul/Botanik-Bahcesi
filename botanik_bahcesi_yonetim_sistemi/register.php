<?php
include('includes/navbar.php');
include('includes/db.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->execute([$username, $password]);

    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Kayıt Ol</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Kayıt Ol</h2>
        <form method="POST">
            <div class="form-group">
                <label for="username">Kullanıcı Adı</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Şifre</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Kayıt Ol</button>
        </form>
        <div class="mt-4">
            <a href="login.php" class="btn btn-success">Giriş Yap</a>
        </div>
        <div class="mt-4">
            <a href="index.php" class="btn btn-primary">Ana Sayfaya Git</a>
            <button onclick="history.back()" class="btn btn-secondary">Geri Dön</button>
        </div>
    </div>
    <?php include('includes/footer.php'); ?>
</body>
</html>
