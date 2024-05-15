<?php

session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_name'])) {
    // Redirect to the login page if not logged in
    header("Location: ./login.php");
    exit();
}

// Retrieve username from the session
$username = $_SESSION['user_name'];

require('config.php');

// Check if the form fields are set
if (isset($_POST['judul'], $_POST['artikel'], $_FILES['foto'])) {
    $judul = $_POST['judul'];
    $artikel = $_POST['artikel'];
    
    // Process the file upload
    $filename = $_FILES['foto']['name'];
    $folder = "img/" . $filename;
    move_uploaded_file($_FILES['foto']['tmp_name'], $folder);

    // Use prepared statements to prevent SQL injection
    $proses = $pdo->prepare("INSERT INTO artikel (judul, artikel, foto) VALUES (?, ?, ?)");

    try {
        // Bind parameters and execute the query
        $proses->bindParam(1, $judul);
        $proses->bindParam(2, $artikel);
        $proses->bindParam(3, $filename);
        $proses->execute();

        // Redirect after successful execution
        header("Location: dashboard.php");
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
echo "";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <title>ADD GALERI</title>
</head>
<body class="bg-gray-100">
<?php include('component/navbar.php')?>
<div class="container p-8 mx-auto">
    <form  method="post" enctype="multipart/form-data" class="max-w-md p-8 mx-auto bg-white border rounded-md shadow-md">

        <h2 class="mb-6 text-2xl font-semibold">Add New Article</h2>

        <!-- Article Title -->
        <div class="mb-4">
            <label for="judul" class="block mb-2 text-sm font-medium text-gray-600">Title</label>
            <input type="text" name="judul" id="judul" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" required>
        </div>

        <!-- Article Content -->
        <div class="mb-4">
            <label for="artikel" class="block mb-2 text-sm font-medium text-gray-600">Article Content</label>
            <textarea name="artikel" id="artikel" rows="4" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" required></textarea>
        </div>

        <!-- Article Photo -->
        <div class="mb-4">
            <label for="foto" class="block mb-2 text-sm font-medium text-gray-600">Article Photo</label>
            <input type="file" name="foto" id="foto" class="w-full" accept="image/*" required>
        </div>

        <!-- Submit Button -->
        <div class="flex items-center justify-end">
            <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Submit</button>
        </div>

    </form>
</div>

</body>
</html>
