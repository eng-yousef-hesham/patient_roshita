<?php // connect.php
$sname = 'localhost';

$uname = 'root';

$pass = '';

$charset = 'utf8mb4';

$database_name = 'patient_roshita';

$conn = mysqli_connect($sname, $uname, $pass, $database_name);

if (!$conn) {
    echo "connection faild !";
}
