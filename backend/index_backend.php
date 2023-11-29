<?php
  /*test for username and password with php and JS*/
  if(isset($_POST['name'])&&isset($_POST['password'])){ 
    $username = $_POST['name'];
    $password = $_POST['password'];
  
    if ($username =='admin' and $password =='1233')
    {?>

  <script>
    window.open("../home.html", "_self")
  </script>
  <?php
    }
    else
    {
        echo 'you are not the admin';
    }
  }?>