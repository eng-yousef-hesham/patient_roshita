<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/login_style.css?<?php echo time(); ?>">
  <link rel="shortcut icon" href="imgs/logo.png" type="image/x-icon" />

</head>

<body>
  <div class="background">
    <img src="imgs/background.jpg" alt="background" class="background">
  </div>
  <div class="logo">
    <img src="imgs/logo.png" alt="logo">
  </div>
  <div class="all">
    <form action="backend/index_backend.php" method="post">
      <div class="login">
        <div class="first">
          <h1>login</h1>
        </div>
        <!-- show error -->
        <?php if (isset($_GET['error'])) { ?>
          <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <!-- ----------------------------------------- -->
        <!-- show successfil sign up -->
        <?php if (isset($_GET['done'])) { ?>
          <p class="done"><?php echo $_GET['done']; ?></p>
        <?php } ?>
        <!-- ----------------------------------------- -->

        <div class="sec">
          <label for="name">
            <p style="font-size: larger;"> username </p>
          </label>
          <input type="text" name="name" id="name" size="20px">
          <br>
          <label for="password">
            <p style="font-size: larger;">password </p>
          </label>
          <input type="password" id="password" name="password">
          <br>
          <input type="submit" value="login" class="button">
          <a href="new_account.php"><input type="button" value="creat new account" class="secbutton"></a>
        </div>

      </div>

    </form>

  </div>



</body>

</html>