<?php

include("../../config.php");

if(isset($_POST['save'])){

    $id = $_POST['id'];
    $nis = $_POST['nis'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $date_of_birth = $_POST['date_of_birth'];
    $address = $_POST['address'];
    $photo = $_FILES['photo']['name'];
    $tmp = $_FILES['photo']['tmp_name'];

    if(empty($photo)) {
        $sql = "UPDATE students SET nis='$nis', name='$name', gender='$gender', date_of_birth='$date_of_birth', address='$address' WHERE id=$id";
        $query = mysqli_query($conn, $sql);

        if( $query ) {
            header('Location: list-siswa.php?status=berhasil');
        } else {
            header('Location: list-siswa.php?status=gagal&msg=Gagal%20mengedit%20data');
        }
    } else {
        $newPhoto = bin2hex(random_bytes(5))."_".$photo;
        $path = "../../uploaded_images/".$newPhoto;
        
        if(move_uploaded_file($tmp, $path)) {
            $selectSql = "SELECT foto FROM calon_siswa WHERE id=$id";
            $selectQuery = mysqli_query($conn, $selectSql);
            $data = mysqli_fetch_array($selectQuery);

            if(is_file($data['photo'])) {
                unlink($data['photo']);
            }

            $sql = "UPDATE students SET nis='$nis', name='$name', gender='$gender', date_of_birth='$date_of_birth', address='$address', photo='$path' WHERE id=$id";
            $query = mysqli_query($conn, $sql);

            if( $query ) {
                header('Location: list-siswa.php?status=berhasil');
            } else {
                header('Location: list-siswa.php?status=gagal&msg=Gagal%20mengedit%20data');
            }
        } else {
            header('Location: list-siswa.php?status=gagal&msg=Gagal%20mengupload%20foto');
        }
    }

} else {
    die("Forbidden");
}

?>