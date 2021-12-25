<?php

include("../../config.php");

if( isset($_GET['id']) ){
    $id = $_GET['id'];

    $sql = "DELETE FROM parents WHERE id=$id";
    $query = mysqli_query($conn, $sql);

    if( $query ){
        header('Location: list-orang-tua.php?status=berhasil&msg=Berhasil%20menghapus%20orang%20tua');
    } else {
        header('Location: list-orang-tua.php?status=gagal&msg=Gagal%20menghapus%20orang%20tua');
    }

} else {
    die("Forbidden");
}

?>