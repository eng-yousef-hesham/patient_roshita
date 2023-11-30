<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/new_account_css.css">
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
    <form action="backend/new_account_backend.php" method="post">
      <div class="login">
        <div class="first">
          <h1>creat new user</h1>
        </div>
        <!-- show error -->
        <?php if (isset($_GET['error'])) { ?>
          <p class="error"><?php echo $_GET['error']; ?></p>
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
          <label for="confirm_password">
            <p style="font-size: larger;">confirm password </p>
          </label>
          <input type="password" id="confirm_password" name="confirm_password">
          <br>
          <br>
          <label for="doc">doctor</label>
          <input type="radio" id="doc" class="doc" name="user_type" value="1">

          <label for="patient">patient</label>
          <input type="radio" id="patient" class="patient" name="user_type" value="0">
          <br>
          <br>
          <input type="submit" value="creat" class="button">
          <a href="index.php"><input type="button" value="back" class="secbutton"></a>

        </div>

      </div>

    </form>

  </div>

</body>

</html>