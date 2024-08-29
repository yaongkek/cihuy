<?php
require("koneksi.php");
if(isset($_POST["register"])) {
    $usermail=$_POST['txt_email'];
    $userpass= $_POST['txt_pass'];
    $username= $_POST['txt_nama'];

    $query ="INSERT INTO user_detail VALUES ('','$usermail','$userpass','$username',2)";
    $result = mysqli_query($koneksi, $query);
    header("location: login.php");
}
?>
<html>
    <head>
        <title>register</title>
    </head>
    <body>
        <form action="register.php" method="POST">
            <p>email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:<input type="text" name="txt_email" required></p>
            <p>password : <input type="password" name="txt_pass" required></p>
            <p>nama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:<input type="text" name="txt_nama" required></p>
            <button type="submit" name="register">register</button>
        </form>
        <p><a href="login.php">Kembali ke Login</a></p>
    </body>
</html>
