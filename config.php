<?php

$server = "localhost";
$user = "root";
$pass = "";
$database = "fp-pweb";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("Gagal tersambung dengan database");
}
