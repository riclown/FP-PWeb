<?php

include("../../config.php");

if (isset($_POST['save'])) {

    $id = $_POST['id'];
    $parent_of = $_POST['parent_of'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $date_of_birth = $_POST['date_of_birth'];
    $address = $_POST['address'];
    $phone_number = $_POST['phone_number'];

    $sql = "UPDATE parents SET name='$name', gender='$gender', date_of_birth='$date_of_birth', address='$address', phone_number='$phone_number', parent_of=$parent_of WHERE id=$id";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        header('Location: list-orang-tua.php?status=berhasil');
    } else {
        header('Location: list-orang-tua.php?status=gagal&msg=Gagal%20mengedit%20data');
    }
} else {
    die("Forbidden");
}
