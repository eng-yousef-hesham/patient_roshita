
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
  /*-------------------------------------------------*/
  else {
    //database inseration
    $sql = "insert into user_login (username ,password ,name ,is_doctor) values ('$username' ,'$password' ,'$username' ,$user_type)";
    if (mysqli_query($conn, $sql)) {
      header("location: ../index.php?done=successfully sign up");
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
    
  }
  /*-------------------------------------------------------------- */
} else {
  header("location: ../new_account.php");
}
?>