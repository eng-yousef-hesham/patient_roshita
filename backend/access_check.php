<?php
include("dbconnect.php");
session_start();
if(isset($_POST["id_num_doctor"]) && isset($_POST["id_num_patient"])){
    if(!empty($_POST["id_num_patient"])){
    $patient_id_num = $_POST['id_num_patient'];
    $doctor_id_num = $_POST['id_num_doctor'];
    $sql = "select user_id from patient where user_id = $patient_id_num and dr_access = $doctor_id_num";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) == 1)
    {
        $_SESSION['patient_id']=$patient_id_num;
        header("location: ../patient_for_doctors_after_access.php?done=now you have access");
        exit();
    }
    else
    {
        header("location: ../patient_for_doctors.php?error=you don't have access for this patient");
    }
}
else{
    header("location: ../patient_for_doctors.php?error=write patient id first");
}
}
?>