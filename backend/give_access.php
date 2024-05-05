<?php
include("dbconnect.php");
if (isset($_POST["id_num_patient"]) && isset($_POST["id_num_doctor"])) {
    $patient_id_num = $_POST['id_num_patient'];
    $doctor_id_num = $_POST['id_num_doctor'];
    // the max num of access for every patient is 6
    $sql3 = "select count(*) from patient where user_id = $patient_id_num  and dr_access IS NOT NULL ";
    $result3 = mysqli_query($conn, $sql3);
    $row3 = mysqli_fetch_array($result3);
    if ($row3['count(*)'] >= 6) {
        header("location: ../doctors_tab.php?error= you arrived to the maxmum numper of doctor that you can give access");
        exit; }
        else {
        // ---------------------------------------------
        $sql2 = "insert into patient (user_id , dr_access ) values ( $patient_id_num , $doctor_id_num)";
        if (mysqli_query($conn, $sql2)) {
            header("location: ../doctors_tab.php?done= doctor have access now");
        } else {
            header("location: ../doctors_tab.php?done= doctor don't have access");
        }
    }
}
