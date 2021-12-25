<?php

include("../../config.php");

if( isset($_GET['id']) ){
    $id = $_GET['id'];

    $selectSql = "SELECT photo FROM students WHERE id=$id";
    $selectQuery = mysqli_query($conn, $selectSql);
    $data = mysqli_fetch_array($selectQuery);

    if(is_file($data['photo']) && strcmp($data['photo'], "../../uploaded_images/default.jpg"))
        unlink($data['photo']);

    $sql = "DELETE FROM students WHERE id=$id";
    $query = mysqli_query($conn, $sql);

    if( $query ){
        header('Location: list-siswa.php?status=berhasil&msg=Berhasil%20menghapus%20siswa');
    } else {
        header('Location: list-siswa.php?status=gagal&msg=Gagal%20menghapus%20siswa');
    }

} else {
    die("Forbidden");
}

?>