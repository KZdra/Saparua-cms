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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <style>* {
        font-family:  Helvetica, sans-serif;
        color: white;
    }
    body {
        background-color: gray;
    }</style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Saparua</a>

            <!-- Tautan Nama Pengguna di Sebelah Kanan -->
            <div class="navbar-text ml-auto">
            <?php
                // Assuming you have a session variable named 'user_name' with the user's name
           
                if (isset($_SESSION['user_name'])) {
                    echo '<span class="text-white"><a href="logout.php" class="text-white">'. $username .'</a></span>';
               
                } else {
                    // Redirect to login page if not logged in
                    header('Location: ./login.php');
                    exit();
                }
                ?>
            </div>

        </div>
    </nav>

    <div class="container p-4">
        <section>
            <h2 class="mb-4 text-2xl font-bold">CRUD Articles</h2>
            <a href="create-galeri.php" class="btn btn-primary btn-lg mb-3">ADD ARTICLE</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Article</th>
                        <th>Photo</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require "config.php";
                    $read = $pdo->prepare("SELECT * FROM artikel");
                    $read->execute();
                    while ($data = $read->fetch(PDO::FETCH_ASSOC)) {
                        $id = $data['id'];
                        $judul = $data['judul'];
                        $artikel = $data['artikel'];
                        $foto = $data['foto'];
                        echo "
                        <tr>
                            <td>$id</td>
                            <td>$judul</td>
                            <td>$artikel</td>
                            <td><img src='img/$foto' class='img-fluid' alt=''></td>
                            <td>
                                <a href='update-galeri.php?id=$id' class='btn btn-primary btn-sm'>Edit</a>
                                <a href='./process/delete.php?id=$id' class='btn btn-danger btn-sm'>Delete</a>
                            </td>
                        </tr>
                        ";
                    }
                    ?>
                </tbody>
            </table>
        </section>

        <section>
            <h2 class="mb-4 text-2xl font-bold">CRUD Beritaatas</h2>
            <a href="create-sejarah.php" class="btn btn-primary btn-lg mb-3">ADD ARTICLE</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Article</th>
                        <th>Photo</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $read = $pdo->prepare("SELECT * FROM sedikitberita");
                    $read->execute();
                    while ($data = $read->fetch(PDO::FETCH_ASSOC)) {
                        $id = $data['id'];
                        $judul = $data['judul'];
                        $artikel = $data['artikel'];
                        $foto = $data['foto'];
                        echo "
                        <tr>
                            <td>$id</td>
                            <td>$judul</td>
                            <td>$artikel</td>
                            <td><img src='img/$foto' class='img-fluid' alt=''></td>
                            <td>
                                <a href='update-sejarah.php?id=$id' class='btn btn-primary btn-sm'>Edit</a>
                                <a href='./process/delete-b.php?id=$id' class='btn btn-danger btn-sm'>Delete</a>
                            </td>
                        </tr>
                        ";
                    }
                    ?>
                </tbody>
            </table>
        </section>

        <section>
            <h2 class="mb-4 text-2xl font-bold">CRUD Documentasi</h2>
            <a href="create-video.php" class="btn btn-primary btn-lg mb-3">ADD ARTICLE & Video</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Article</th>
                        <th>Video</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $read = $pdo->prepare("SELECT * FROM docvid");
                    $read->execute();
                    while ($data = $read->fetch(PDO::FETCH_ASSOC)) {
                        $id = $data['id'];
                        $judul = $data['judul'];
                        $artikel = $data['artikel'];
                        $vid = $data['vid'];
                        echo "
                        <tr>
                            <td>$id</td>
                            <td>$judul</td>
                            <td>$artikel</td>
                            <td><iframe class='embed-responsive-item' src='$vid' title='YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share' allowfullscreen></iframe></td>
                            <td>
                                <a href='./process/delete-d.php?id=$id' class='btn btn-danger btn-sm'>Delete</a>
                            </td>
                        </tr>
                        ";
                    }
                    ?>
                </tbody>
            </table>
        </section>
        <section>
            <h2 class="mb-4 text-2xl font-bold">CRUD Berita</h2>
            <a href="create-berita.php" class="btn btn-primary btn-lg mb-3">ADD ARTICLE</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Article</th>
                        <th>Photo</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $read = $pdo->prepare("SELECT * FROM berita");
                    $read->execute();
                    while ($data = $read->fetch(PDO::FETCH_ASSOC)) {
                        $id = $data['id'];
                        $judul = $data['judul'];
                        $artikel = $data['artikel'];
                        $foto = $data['foto'];
                        echo "
                        <tr>
                            <td>$id</td>
                            <td>$judul</td>
                            <td>$artikel</td>
                            <td><img src='img/$foto' class='img-fluid' alt=''></td>
                            <td>
                                <a href='update-berita.php?id=$id' class='btn btn-primary btn-sm'>Edit</a>
                                <a href='./process/delete-br.php?id=$id' class='btn btn-danger btn-sm'>Delete</a>
                            </td>
                        </tr>
                        ";
                    }
                    ?>
                </tbody>
            </table>
        </section>
    </div>
    
    </div>


    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
