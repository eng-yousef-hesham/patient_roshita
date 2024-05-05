<?php
session_start();
$user_id_session = $_SESSION['name'];
include("dbconnect.php");
if (!empty($_FILES["uploadimage"]["name"])) {
    $filename = $_FILES["uploadimage"]["name"];
    $tempname = $_FILES["uploadimage"]["tmp_name"];
    $folder = "../user_image/$filename";
    $sql = "update user_login set user_image = '$filename'  where id = $user_id_session";
    if (mysqli_query($conn, $sql)) {
        move_uploaded_file($tempname, $folder);
    }
}
if (!empty($_POST['name'])) {
    $user_name = $_POST['name'];
    $sql = "update user_login set  name = '$user_name' where id = $user_id_session";
    mysqli_query($conn, $sql);
}
if (!empty($_POST['specialization'])) {
    $specialization = $_POST['specialization'];
    $sql = "update doctor set  specialization = '$specialization' where doctor_id = $user_id_session";
    mysqli_query($conn, $sql);
}
if (!empty($_POST['description'])) {
    $description = $_POST['description'];
    $sql = "update doctor set  description = '$description' where doctor_id = $user_id_session";
    mysqli_query($conn, $sql);
}
if (empty($_FILES["uploadimage"]["name"]) && empty($_POST['name']) && empty($_POST['specialization']) && empty($_POST['description'])) {
    header("location: ../setting_for_doctors.php?error=please fill any field");
    exit;
}
mysqli_close($conn);
header("location: ../setting_for_doctors.php?done=update done");
exit;
?>
