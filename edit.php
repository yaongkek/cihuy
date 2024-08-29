<?php
require("koneksi.php");
if(isset($_POST["update"])) {
    $userid = $_POST["txt_id"];
    $usermail=$_POST['txt_email'];
    $userpass= $_POST['txt_pass'];
    $userName= $_POST['txt_nama'];

    $query = "UPDATE user_detail SET user_password='$userpass', user_fullname='$userName', user_email='$usermail' WHERE id='$userid'";
    echo $query;
    $result = mysqli_query($koneksi, $query);
    header("location: home.php");
    exit();
}
$id = $_GET['id'];
$query = "SELECT * FROM user_detail WHERE id='$id'";
$result = mysqli_query($koneksi, $query)or die (mysqli_error());
while ($row = mysqli_fetch_array($result)){
    $id = $row['id'];
    $usermail = $row['user_email'];
    $userpass = $row['user_password'];
    $userName = $row['user_fullname'];
}
?>
<html>
    <head>
        <title>register</title>
    </head>
    <body>
        <form action="edit.php" method="POST">
            <p><input type="hidden" name="txt_id" value="<?php echo $id; ?>"></p>
            <p>email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input type="text" name="txt_email" value="<?php echo $usermail;?>"></p>
            <p>password : <input type="password" name="txt_pass" value="<?php echo $userpass;?>"></p>
            <p>nama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input type="text" name="txt_nama" value="<?php echo $userName;?>"></p>
            <button type="submit" name="update">update</button>
        </form>
        <p><a href="home.php">kembali</a></p>
    </body>
</html>