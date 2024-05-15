<nav class="p-4 bg-gray-800">
        <div class="container flex items-center justify-between mx-auto">
            <!-- Brand/logo -->
            <a href="#" class="text-lg font-bold text-white">SA[]ARUA</a>

            <!-- Profile and Logout -->
            <div class="flex items-center space-x-4">
                <?php
                // Assuming you have a session variable named 'user_name' with the user's name
           
                if (isset($_SESSION['user_name'])) {
                    echo '<span class="text-white">' . $username . '</span>';
                    echo '<a href="logout.php" class="text-white">Logout</a>';
                } else {
                    // Redirect to login page if not logged in
                    header('Location: login.php');
                    exit();
                }
                ?>
            </div>
        </div>
    </nav>