<?php

include "dbconnect.php";
/*test for username and password with php */
if (isset($_POST['name']) && isset($_POST['password'])) {
  // data validation
  function validdata($data)
  {
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  $username = validdata($_POST['name']);
  $password = validdata($_POST['password']);
  /*--------------------------------------------*/
  // check if it's empty
  if (empty($username)) {
    header("location: ../index.php?error=username is required");
    exit;
  } elseif (empty($password)) {
    header("location: ../index.php?error=password is required");
    exit;
  } else {
    //database search
    $sql = "select is_doctor , username , password from user_login where username like '$username' and password = '$password' ";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_assoc($result);
      //sign in for patient
      if ($row['is_doctor'] == 0) {
        //patient pages
        header("location: ../home.php");
      }
      //sign in for doctor
      elseif ($row["is_doctor"] == 1) {
        // ----------------
        // ----------------
        // ----------------
        //doctor pages
      }
    } else {
      header("location: ../index.php?error=wrong user name or password or poth");
    }
    mysqli_close($conn);
  }
} else {
  header("location: ../new_account.php");
}
