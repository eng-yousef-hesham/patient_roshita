<?php
session_start();
include("dbconnect.php");
$id_num_patient = $_POST["id_num_patient"];
$heart_rate = $_POST["heart_rate"];
$systolic_blood_pressure =  $_POST["systolic_blood_pressure"];
$diastolic_blood_pressure = $_POST["diastolic_blood_pressure"];
$roshita = $_POST["roshita"];
$id_num_doctor = $_POST["id_num_doctor"];
if (empty($heart_rate)) {
    $heart_rate = 70;
}
if (empty($systolic_blood_pressure)) {
    $systolic_blood_pressure = 120;
}
if (empty($diastolic_blood_pressure)) {
    $diastolic_blood_pressure = 80;
}
if (empty($roshita)) {
    $roshita = "The doctor did not write the prescription";
}
$sql = "insert into `roshita` (`patient_id`, `roshita`, `heart rate`, `systolic_blood_pressure`, `diastolic_blood_pressure`, `doctor_id`) 
values ($id_num_patient , '$roshita' , $heart_rate , $systolic_blood_pressure , $diastolic_blood_pressure  , $id_num_doctor )";
if (mysqli_query($conn, $sql)) {
    $sql2 = "delete from patient where user_id = $id_num_patient and dr_access = $id_num_doctor";
    unset($_SESSION['patient_id']);
    if (mysqli_query($conn, $sql2)) {
        header("location: ../patient_for_doctors.php?done= prescription added");
    } else {
        header("location: ../patient_for_doctors.php?error= try again");
    }
} else {
    header("location: ../patient_for_doctors.php?error= try again");
}
