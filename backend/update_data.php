<?php
session_start();
$user_id_session = $_SESSION['name'];
include("dbconnect.php");
if (!empty($_FILES["uploadimage"]["name"]) && !empty($_POST['name'])) {
    $user_name = $_POST['name'];
    $filename = $_FILES["uploadimage"]["name"];
    $tempname = $_FILES["uploadimage"]["tmp_name"];
    $folder = "../user_image/$filename";
    $sql = "update user_login set user_image = '$filename' , name = '$user_name' where id = $user_id_session";
    if (mysqli_query($conn, $sql)) {
        move_uploaded_file($tempname, $folder);
        header("location: ../setting.php?done=your account name and user img has been updated");
        exit;
    }
    header("location: ../setting.php?error=no update done");
    exit;
} elseif (empty($_FILES["uploadimage"]["name"]) && !empty($_POST['name'])) {
    $user_name = $_POST['name'];
    $sql = "update user_login set  name = '$user_name' where id = $user_id_session";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
    header("location: ../setting.php?done=your account name has been updated");
    exit;
} elseif (!empty($_FILES["uploadimage"]["name"]) && empty($_POST['name'])) {
    $filename = $_FILES["uploadimage"]["name"];
    $tempname = $_FILES["uploadimage"]["tmp_name"];
    $folder = "../user_image/$filename";
    $sql = "update user_login set user_image = '$filename'  where id = $user_id_session";
    if (mysqli_query($conn, $sql)) {
        move_uploaded_file($tempname, $folder);
        mysqli_close($conn);
        header("location: ../setting.php?done=your image has been updated");
        exit;
    }
} else {
    header("location: ../setting.php?error=please fill any field");
    exit;
}
