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

require "../config.php";

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    
    try {
        // Prepare statement untuk menghapus data siswa berdasarkan nis
        $delete = $pdo->prepare("DELETE FROM artikel WHERE id = :id");
        $delete->bindParam(':id', $id, PDO::PARAM_STR);
        
        // Eksekusi statement delete
        $delete->execute();
        
        // Redirect ke halaman utama setelah berhasil menghapus data
        header("Location: ../dashboard.php");
        exit();
    } catch(PDOException $e) {
        // Tangani kesalahan jika terjadi
        echo "Error: " . $e->getMessage();
    }
} else {
    // Redirect ke halaman utama jika parameter nis tidak ada atau kosong
    header("Location: ../dashboard.php");
    exit();
}

?>
