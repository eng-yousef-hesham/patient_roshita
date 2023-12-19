<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/all.min.css">
  <link rel="stylesheet" href="css/new_account_style.css">
  <link rel="shortcut icon" href="imgs/logo.webp" type="image/x-icon" />
  <title>Document</title>
</head>

<body>
  <section class=" text-center text-lg-start">
    <style>
      .rounded-t-5 {
        border-top-left-radius: 0.5rem;
        border-top-right-radius: 0.5rem;
      }

      @media (min-width: 992px) {
        .rounded-tr-lg-0 {
          border-top-right-radius: 0;
        }

        .rounded-bl-lg-5 {
          border-bottom-left-radius: 0.5rem;
        }
      }
    </style>
    <div class="card mb-3">
      <div class="row g-0 d-flex align-items-center m-0">

        <div class="col-lg-4 d-none d-lg-flex">
          <img src="imgs/background.jpg" alt="Trendy Pants and Shoes" class="w-100 rounded-t-5 rounded-tr-lg-0 rounded-bl-lg-5" />
        </div>

        <div class="col-lg-8">
          <div class="col logo d-flex">
            <img src="imgs/logo.png" style="width: 250px;" alt="logo">
          </div>
          <div class="card-body py-5 px-md-5">
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


            <form action="backend/new_account_backend.php" method="post" enctype="multipart/form-data">
              <!-- user image -->
              <div class="form-outline mb-4">
                <label for="form_user_image" class="form-label">Add your photo</label>
                <input class="form-control" id="form_user_image" type="file" name="uploadimage" value="" />
              </div>
              <!-- name input -->
              <div class="form-outline mb-4">
                <label class="form-label" for="name">User Name</label>
                <input type="text" name="name" id="name" class="form-control" />

              </div>
              <!-- Password input -->
              <div class="form-outline mb-4">
                <label class="form-label" for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" />

              </div>
              <!-- confirm -->
              <div class="form-outline mb-4">
                <label class="form-label" for="confirm_password">Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password" class="form-control" />
              </div>
              <!--  -->
              <div class="form-outline mb-4">
                <label for="doc">doctor</label>
                <input type="radio" id="doc" class="doc" name="user_type" value="1">

                <label for="patient">patient</label>
                <input type="radio" id="patient" class="patient" name="user_type" value="0">
              </div>
              <!-- hiden when the radio button is 0 -->
              <div id="specialization" class="hidden row form-outline mb-4">
                <input type="Text" name="specialization" id="specialization" class="form-control" />
                <label class="form-label" for="specialization">specialization</label>
              </div>
              <!-- ---------------------- -->
              <!-- 2 column grid layout for inline styling -->
              <div class="row mb-4">
                <!-- Submit button -->

                <button type="submit" class="btn btn-primary btn-block mb-4">Sign up</button>
                <a href="index.php" class="btn btn-primary btn-block mb-4">back</a>

              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ------------------------------------------ -->
  <script src="js/script_for_new_account.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/all.min.js"></script>
</body>

</html>