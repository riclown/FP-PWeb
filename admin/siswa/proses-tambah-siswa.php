<?php

require_once("../../config.php");

if(isset($_POST['add'])){

    $nis = $_POST['nis'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $date_of_birth = $_POST['date_of_birth'];
    $address = $_POST['address'];
    $photo = $_FILES['photo']['name'];
    $tmp = $_FILES['photo']['tmp_name'];

    $newPhoto = bin2hex(random_bytes(5))."_".$photo;
    $path = "../../uploaded_images/".$newPhoto;

    if(move_uploaded_file($tmp, $path)) {
        $sql = "INSERT INTO students (nis, name, gender, date_of_birth, address, photo) VALUE ('$nis', '$name', '$gender', '$date_of_birth', '$address', '$path')";
        $query = mysqli_query($conn, $sql);

        if( $query ) {
            header('Location: index.php?status=berhasil');
        } else {
            header('Location: index.php?status=gagal&msg=Gagal%20menambahkan%20data');
        }
    } else {
        header('Location: index.php?status=gagal&msg=Gagal%20upload%20foto');
    }
} else {
    die("Forbidden");
}
