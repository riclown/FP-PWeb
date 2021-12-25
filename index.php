<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Goes To School</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <style>
        .container form {
            width: 200px;
            margin-left: -75px;
            margin-top: 50px;
            border-bottom: 2px solid;
        }

        .btn {
            width: 100px;
            border: none;
            border-radius: 20px;
            background-color: #9799ce;
        }

        .btn:hover {
            color: lightgray;
            background-color: blueviolet;
        }
    </style>
</head>

<body class="bg-purple text-dark d-flex flex-column">
    <div class="container-fluid content flex-grow-1 d-flex flex-column justify-content-center">

        <div class="container">
            <header class="text-center mt-4">
                <h1>Goes to School</h1>
                <hr style="width:100%;text-align:right;margin:auto">
            </header>

            <section class="row-mb-4 d-flex  align-items-center justify-content-center">
                <article class="col-md-2 text-left align-items-center justify-content-center">
                    <form action="proses-login.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group my-2">
                            <label form="username">Username</label>
                            <input type="text" name="username" class="form-control rounded" placeholder="Username" required />
                        </div>

                        <div class="form-group my-2">
                            <label form="password">Password</label>
                            <input type="password" name="password" class="form-control rounded" placeholder="Password" required />
                        </div>

                        <div class="form-group my-3 text-center">
                            <input class="btn btn-primary" type="submit" value="Login" name="login" />
                        </div>
                    </form>
                </article>
            </section>

            <?php if (
                isset($_GET["status"]) &&
                $_GET["status"] == "gagal" &&
                isset($_GET["msg"])
            ) {
                echo "<p class=\"text-danger text-center\">$_GET[msg]</p>";
            } ?>
        </div>

    </div>

</body>

</html>