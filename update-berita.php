<?php
require_once 'config.php';

session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_name'])) {
    // Redirect to the login page if not logged in
    header("Location: ./login.php");
    exit();
}

// Retrieve username from the session
$username = $_SESSION['user_name'];

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil data artikel dari database berdasarkan ID
    $query = $pdo->prepare("SELECT * FROM berita WHERE id = ?");
    $query->execute([$id]);
    $article = $query->fetch(PDO::FETCH_ASSOC);

    if (!$article) {
        // Redirect jika artikel tidak ditemukan
        header('Location: dashboard.php');
        exit();
    }
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newTitle = $_POST['judul'];
    $artikel = $_POST['artikel'];

    // Update judul artikel
    $updateQuery = $pdo->prepare("UPDATE berita SET judul = ? , artikel = ? WHERE id = ?");
    $updateQuery->execute([$newTitle, $artikel ,$id]);

    // Upload foto baru jika ada
    if ($_FILES['foto']['name']) {
        $uploadDir = 'img/';
        $uploadFile = $uploadDir . basename($_FILES['foto']['name']);

        // Simpan path foto ke database
        $fotoPath = $uploadFile;
        $updateFotoQuery = $db->prepare("UPDATE artikel SET foto = ? WHERE id = ?");
        $updateFotoQuery->execute([$fotoPath, $id]);

        // Pindahkan foto ke direktori uploads
        move_uploaded_file($_FILES['foto']['tmp_name'], $uploadFile);
    }

    // Redirect setelah update
    header('Location: dashboard.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Artikel</title>
    <!-- Tambahkan link CSS Tailwind -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="p-4 bg-gray-100">

    <div class="max-w-2xl p-8 mx-auto bg-white rounded shadow">
        <h1 class="mb-4 text-2xl font-bold">Edit Artikel</h1>

        <form method="POST" action="" enctype="multipart/form-data">
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-600">Judul Artikel</label>
                <input type="text" name="judul" id="judul" value="<?= $article['judul'] ?>" class="w-full p-2 mt-1 border rounded">
            </div>
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-600">Artikel</label>
                <input type="text" name="artikel" id="artikel" value="<?= $article['artikel'] ?>" class="w-full p-2 mt-1 border rounded">
            </div>
            
            <div class="mb-4">
                <label for="foto" class="block text-sm font-medium text-gray-600">Foto Artikel</label>
                <img src="img/<?= $article['foto'] ?>" alt="Foto Artikel" class="h-auto max-w-full mt-2">
            </div>

            <div class="mb-4">
                <label for="newFoto" class="block text-sm font-medium text-gray-600">Foto Artikel Baru</label>
                <input type="file" name="foto" id="newFoto" class="w-full p-2 mt-1 border rounded">
            </div>

            <div>
                <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded">Simpan Perubahan</button>
            </div>
        </form>
    </div>

</body>
</html>
