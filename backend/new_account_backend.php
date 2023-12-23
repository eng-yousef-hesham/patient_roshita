<?php
include "dbconnect.php";
/*test for username and password with php and JS*/
if (isset($_POST['name']) && isset($_POST['password']) && isset($_POST['confirm_password']) && isset($_POST['user_type'])) {
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
  $confirm_password = validdata($_POST['confirm_password']);
  $user_type = $_POST['user_type'];
  $user_id = (int)$user_type;
  /* -----------------------------------------------------*/

  // check if it's empty
  if (empty($username)) {
    header("location: ../new_account.php?error=username is required");
    exit;
  } elseif (empty($password)) {
    header("location: ../new_account.php?error=password is required");
    exit;
  } elseif (empty($confirm_password)) {
    header("location: ../new_account.php?error=confirm the password");
    exit;
  } elseif ($user_type != 0 && $user_type != 1) {
    header("location: ../new_account.php?error=you should choose type");
    exit;
  }
  // test if password = confirm
  elseif ($confirm_password != $password) {
    header("location: ../new_account.php?error=wrong confirm password");
    exit;
  }
  /*-------------------------------------------------*/ else {
    if ($user_type == 1) {
      $specialization = validdata($_POST['specialization']);
      if (empty($specialization)) {
        header("location: ../new_account.php?error=for doctors specialization is required");
        exit;
      }
    }
    //check if there is a user with the same name
    $sql0 = "select username from user_login where username like '$username'";
    $result = mysqli_query($conn, $sql0);
    if (mysqli_num_rows($result) == 1) {
      header("location: ../new_account.php?error=username used before");

      mysqli_close($conn);
      exit;
    } else {
      // ---------------------------------------------------------- upload image
      $filename = $_FILES["uploadimage"]["name"];
      $tempname = $_FILES["uploadimage"]["tmp_name"];
      $folder = "../user_image/$filename";
      //database inseration
      $sql = "insert into user_login (user_image,username ,password ,name ,is_doctor) values ('$filename','$username' ,'$password' ,'$username' ,$user_type)";
      if (mysqli_query($conn, $sql)) {
        // ---------------------------------------------------------- save photo into folder
        move_uploaded_file($tempname, $folder);
        // -----------------------------------------------------------------------------
        if ($user_type == 0) {
          //no add to patient taple because this table for only check doctor access
          $sql1 = "select id from user_login where username like '$username'";
          $result = mysqli_query($conn, $sql1);
          $row = mysqli_fetch_assoc($result);
          $id_numper = $row["id"];
          if (empty($_FILES["uploadimage"]["name"])) {
            header("location: ../index.php?done=successfully sign up , add your photo later");
          } else {
            header("location: ../index.php?done=successfully sign up");
          }
          // --------------------------------------------
        } elseif ($user_type == 1) {
          // add to doctor table
          $sql1 = "select id from user_login where username like '$username'";
          $result = mysqli_query($conn, $sql1);
          $row = mysqli_fetch_assoc($result);
          $id_numper = $row["id"];
          $sql2 = "insert into doctor (doctor_id , specialization) values ( $id_numper ,'$specialization')";
          if (mysqli_query($conn, $sql2)) {
            if (empty($_FILES["uploadimage"]["name"])) {
              header("location: ../index.php?done=successfully sign up , add your photo later");
            } else {
              header("location: ../index.php?done=successfully sign up");
            }
          }
          // --------------------------------------------------------
        }
      } else {
        header("location: ../new_account.php?error=the user not added try again");
        exit;
      }
      mysqli_close($conn);
    }
  }

  /*-------------------------------------------------------------- */
} else {
  header("location: ../new_account.php?error=fill the fields");
}
