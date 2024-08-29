<?php
require('koneksi.php');
session_start();

// Inisialisasi pesan
$msg = "";

if (isset($_POST['submit'])) {
    $email = $_POST['txt_email'];
    $pass = $_POST['txt_pass'];

    if (!empty(trim($email)) && !empty(trim($pass))) {

        $query = "SELECT * FROM user_detail WHERE user_email = '$email'";
        $result = mysqli_query($koneksi, $query);
        
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $id = $row['id'];
            $userval = $row['user_email'];
            $passval = $row['user_password'];
            $username = $row['user_fullname'];
            $level = $row['level'];

            // Periksa apakah password cocok
            if ($userval == $email && $passval == $pass) {
                $_SESSION['id'] = $id;
                $_SESSION['name'] = $username;
                $_SESSION['level'] = $level;
                header('location: home.php');
                exit();
            } else {
                // Password salah
                $msg = "Password salah.";
            }
        } else {
            // Username tidak ditemukan
            $msg = "Username tidak ditemukan.";
        }
    }
}          

?>

<html>

<head>
    <title>Login Page</title>
</head>

<body>
    <!-- Tampilkan pesan kesalahan -->
    <?php if (!empty($msg)): ?>
        <p style="color: red;"><?php echo $msg; ?></p>
    <?php endif; ?>

    <form action="login.php" method="post">
        <input type="text" name="txt_email" placeholder="Email"><br>
        <input type="password" name="txt_pass" placeholder="Password"><br>
        <input type="submit" name="submit" value="Login">
    </form>

</body>

</html>
