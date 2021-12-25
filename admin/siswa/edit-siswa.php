<?php
require_once "../check-login.php";
require_once "../../config.php";

$id = $_GET["id"];

$sql = "SELECT * FROM students WHERE id=$id";
$query = mysqli_query($conn, $sql);

if (mysqli_num_rows($query) < 1) {
    header("Location: list-siswa.php?status=gagal&msg=Data%20tidak%20ditemukan");
}

$siswa = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Goes To School</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../../styles/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body class="bg-light text-dark d-flex flex-column">

    <header class="text-center text-primary title p-2 top-left">
        <h1>Edit student</h1>
    </header>

    <div class="container-fluid content flex-grow-1 d-flex flex-column justify-content-center  mt-5">
        <section class="mb-4 d-flex flex-column align-items-center justify-content-center">
            <article class="col-md-6 text-left">
                <form class="d-flex justify-content-between" action="proses-edit-siswa.php" onsubmit="return validateForm();" method="POST" enctype="multipart/form-data">
                    <div class="col-3">
                        <div class="form-group my-2">
                            <label for="photo" class="form-label">Photo</label>
                            <div>
                                <img id="preview_photo" width="100px" src="<?php echo $siswa["photo"]; ?>" alt="preview" />
                                <input class="form-control mt-2" type="file" name="photo" id="photo" onchange="PreviewImage();">
                            </div>
                        </div>
                    </div>

                    <div class="col-8">
                        <div class="form-group my-2">
                            <label for="nis">NIS</label>
                            <input type="text" name="nis" id="nis" class="form-control rounded" placeholder="NIS" value="<?php echo $siswa["nis"]; ?>" required />
                        </div>

                        <div class="form-group my-2">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control rounded" placeholder="Name" value="<?php echo $siswa["name"]; ?>" required />
                        </div>

                        <div class="form-group my-2">
                            <?php $jk = $siswa["gender"]; ?>
                            <label for="gender">Gender</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="gender1" value="laki-laki" <?php echo $jk ==
                                                                                                                                "laki-laki"
                                                                                                                                ? "checked"
                                                                                                                                : ""; ?> required>
                                <label class="form-check-label" for="gender">
                                    Laki-laki
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="gender2" value="perempuan" <?php echo $jk ==
                                                                                                                                "perempuan"
                                                                                                                                ? "checked"
                                                                                                                                : ""; ?> required>
                                <label class="form-check-label" for="gender">
                                    Perempuan
                                </label>
                            </div>
                        </div>

                        <div class="form-group my-2">
                            <label for="date_of_birth">Date of Birth</label>
                            <input class="form-control" type="date" name="date_of_birth" placeholder="Date of Birth" value="<?php echo $siswa["date_of_birth"]; ?>" required></input>
                        </div>

                        <div class="form-group my-2">
                            <label for="address">Address</label>
                            <textarea name="address" class="form-control" placeholder="Address" style="width: 100%; height: 150px" required><?php echo $siswa["address"]; ?></textarea>
                        </div>

                        <input type="hidden" name="id" value="<?php echo $siswa["id"]; ?>" required />

                        <div class="form-group my-3 form-buttons">
                            <input class="btn btn-success" type="submit" value="Save" name="save" />
                            <a class="btn btn-danger" href="proses-hapus-siswa.php?id=<?php echo $siswa["id"]; ?>" onclick="return confirm('Yakin ingin menghapus?');">Delete</a>
                        </div>
                    </div>

                </form>
            </article>
        </section>

        <a class="btn btn-primary btn-bottom-left" href="./list-siswa.php"><i class="fas fa-arrow-left"></i>Back</a>

        <footer class="mt-5 mb-5 d-flex justify-content-center align-items-center">
            <h1>Goes To School</h1>
        </footer>
    </div>

</body>

<script>
    function PreviewImage() {
        const oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("photo").files[0]);

        oFReader.onload = function(oFREvent) {
            document.getElementById("preview_photo").src = oFREvent.target.result;
        };
    };

    function validateForm() {
        const nis = document.getElementById("nis").value;

        if (isNaN(nis)) {
            alert("NIS harus angka");
            return false;
        }

        if (nis.length != 5) {
            alert("NIS harus 5 character");
            return false;
        }

        return true;
    }
</script>

</html>