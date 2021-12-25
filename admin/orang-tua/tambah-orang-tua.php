<?php
require_once "../check-login.php";
require_once "../../config.php";
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
    <header class="text-center mt-4 title p-2 top-left">
        <h1>Add parent</h1>
    </header>

    <div class="container-fluid content flex-grow-1 d-flex flex-column justify-content-center mt-5">
        <section class="mb-4 d-flex flex-column align-items-center justify-content-center">
            <article class="col-md-6 text-left">
                <form action="proses-tambah-orang-tua.php" onsubmit="return submitForm()" method="POST">
                    <div class="form-group my-2">
                        <label for="parent_of_suggestion" class="form-label">Parent Of</label>
                        <input class="form-control" list="parent_of_options" id="parent_of_suggestion" placeholder="Type to search by NIS or Name" required>
                        <datalist id="parent_of_options">
                            <?php
                            $sql = "SELECT * FROM students";
                            $query = mysqli_query($conn, $sql);

                            while ($siswa = mysqli_fetch_array($query)) {
                                echo "<option data-value='$siswa[id]'>$siswa[nis] - $siswa[name]</option>";
                            }
                            ?>
                        </datalist>
                    </div>

                    <input type="hidden" name="parent_of" id="parent_of">

                    <div class="form-group my-2">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control rounded" placeholder="Name" required />
                    </div>

                    <div class="form-group my-2">
                        <label for="gender">Gender</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="gender1" value="laki-laki" required>
                            <label class="form-check-label" for="gender">
                                Laki-laki
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="gender2" value="perempuan" required>
                            <label class="form-check-label" for="gender">
                                Perempuan
                            </label>
                        </div>
                    </div>

                    <div class="form-group my-2">
                        <label for="date_of_birth">Date of Birth</label>
                        <input class="form-control" type="date" name="date_of_birth" placeholder="Date of Birth" required></input>
                    </div>

                    <div class="form-group my-2">
                        <label for="address">Address</label>
                        <textarea name="address" class="form-control" placeholder="Address" style="width: 100%; height: 150px" required></textarea>
                    </div>

                    <div class="form-group my-2">
                        <label for="phone_number">Phone Number</label>
                        <input class="form-control" type="tel" name="phone_number" placeholder="Phone Number" required></input>
                    </div>

                    <div class="form-group my-3 form-buttons">
                        <input class="btn btn-success" type="submit" value="Add" name="add" />
                    </div>

                </form>
            </article>
        </section>
        <a class="btn btn-primary btn-bottom-left" href="./index.php"><i class="fas fa-arrow-left"></i>Back</a>

        <footer class="mt-5 mb-5 d-flex justify-content-center align-items-center">
            <h1>Goes To School</h1>
        </footer>
    </div>

</body>

<script>
    function submitForm() {
        const suggestion = document.getElementById('parent_of_options').children;
        const picked = document.getElementById('parent_of_suggestion').value;

        for (const opt of suggestion) {
            if (opt.value === picked) {
                document.getElementById('parent_of').value = opt.getAttribute('data-value');
                return true;
            }
        }

        alert('Data anak tidak valid');
        return false;
    }
</script>

</html>