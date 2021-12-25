<?php
require_once("config.php");

if (isset($_POST['login'])) {

    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows == 0) {
        header("Location: index.php?status=gagal&msg=Username%20tidak%20ditemukan");
        exit();
    }

    $user = mysqli_fetch_assoc($result);

    if (password_verify($password, $user["password"])) {
        session_start();
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];
        header("Location: ./admin/index.php");
    } else {
        header("Location: index.php?status=gagal&msg=Password%20salah");
    }
}
?>
?>