<?php

require_once("../../config.php");

if (isset($_POST['add'])) {

    $parent_of = $_POST['parent_of'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $date_of_birth = $_POST['date_of_birth'];
    $address = $_POST['address'];
    $phone_number = $_POST['phone_number'];

    $sql = "INSERT INTO parents (name, gender, date_of_birth, address, phone_number, parent_of) VALUE ('$name', '$gender', '$date_of_birth', '$address', '$phone_number', $parent_of)";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        header('Location: index.php?status=berhasil');
    } else {
        header('Location: index.php?status=gagal&msg=Gagal%20menambahkan%20data');
    }
} else {
    die("Forbidden");
}
