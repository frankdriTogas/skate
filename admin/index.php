<?php
include "connectDb.php";

session_start();
if (isset($_SESSION['username'])) {
    header("Location: dash.php");
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "select * from user where username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        header("Location:dash.php");
    } else {
        echo "<script>alert('username atau password salah')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mystyleLogin.css">
    <title>Login | SKATE</title>
</head>

<body>
    <div class="container">
        <div class="login">
            <div class="logo">
                <img src="../img/logo.jpg" alt="">
            </div>

            <form action="" method="post" class="formLogin">
                <input type="text" class="ipt" name="username" placeholder="Username">
                <input type="password" class="ipt" name="password" placeholder="Password">
                <button class="btn" name="submit">Login</button>
            </form>

        </div>
    </div>
</body>

</html>