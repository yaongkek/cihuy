<?php
    session_start();
    require('koneksi.php');
    $sesName = $_SESSION['name'];
    if (!isset($_SESSION['id'])){
        echo "<script>alert('Anda harus login!!');</script>";
        header('location: login.php');
        exit();
    }
?>
<html>
<head>
    <title>Home</title>
</head>
<body>
    <h1>Selamat Datang <?php echo $sesName?></h1>
    <table border="1">
        <tr>
            <td>No</td>
            <td>Email</td>
            <td>Nama</td>
        </tr>
        <?php
        $query = "SELECT * FROM user_detail";
        $result = mysqli_query($koneksi, $query);
        $no = 1;
        while ($row = mysqli_fetch_array($result)) {
            $userMail = $row['user_email'];
            $userName = $row["user_fullname"];
            ?>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $userMail; ?></td>
                <td><?php echo $userName;?></td>
                <td>
                    <a href="edit.php?id=<?php echo $row['id']; ?>">edit</a>
                    <a href="hapus.php?id=<?php echo $row['id'];?>">hapus</a>
                </td>
            </tr>
            <?php
            $no++;
        }
        ?>
    </table>
    <p><a href="logout.php">logout</a></p>
</body>
</html>
