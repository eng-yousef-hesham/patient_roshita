<?php
include("dbconnect.php");
if (isset($_POST["id_num_patient"]) && isset($_POST["id_num_doctor"])) {
    $patient_id_num = $_POST['id_num_patient'];
    $doctor_id_num = $_POST['id_num_doctor'];
    $sql2 = "delete from patient where user_id = $patient_id_num and dr_access = $doctor_id_num";
    if (mysqli_query($conn, $sql2)) {
        header("location: ../doctors_tab.php?done= doctor don't have access now");
    } else {
        header("location: ../doctors_tab.php?done= doctor still have access now");
    }
}
