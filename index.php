<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/login_style.css?<?php echo time(); ?>">
</head>

<body>
  <div class="background">
    <img src="imgs/background.jpg" alt="background" class="background">
  </div>
  <div class="logo">
    <img src="imgs/logo.png" alt="logo">
  </div>
  <div class="all">
    <form action="index.php" method="post">
      <div class="login">
        <div class="first">
          <h1>login</h1>
        </div>
        <div class="sec">
          <label for="name">
            <p style="font-size: larger;"> username </p>
          </label>
          <input type="text" name="name" id="name" size="20px" required>
          <br>
          <label for="password">
            <p style="font-size: larger;">password </p>
          </label>
          <input type="password" required id="password" name="password">
          <br>
          <input type="submit" value="login" class="button">
           <a href="new_account.php"><input type="button" value="creat new account" class="secbutton"></a>
        </div>

      </div>

    </form>

  </div>

  <?php
  /*test for username and password with php and JS*/
  if(isset($_POST['name'])&&isset($_POST['password'])){ 
    $username = $_POST['name'];
    $password = $_POST['password'];
  
    if ($username =='admin' and $password =='1233')
    {?>

  <script>
    window.open("home.html", "_blank")
  </script>
  <?php
    }
    else
    {
        echo 'you are not the admin';
    }
  }?>

</body>

</html>