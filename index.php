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
  <link rel="stylesheet" href="css/index_style.css">
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
      <div class="row g-0 d-flex align-items-center">

        <div class="col-lg-4 d-none d-lg-flex">
          <img src="imgs/background.jpg" alt="Trendy Pants and Shoes" class="w-100 rounded-t-5 rounded-tr-lg-0 rounded-bl-lg-5" />
        </div>

        <div class="col-lg-8">
          <div class="col logo d-flex">
            <img src="imgs/logo.png" class="logo" alt="logo" style="width: 250px;">
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


            <form action="backend/index_backend.php" method="post">
              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="text" name="name" id="name" class="form-control" />
                <label class="form-label" for="name">User Name</label>
              </div>

              <!-- Password input -->
              <div class="form-outline mb-4">
                <input type="password" id="password" name="password" class="form-control" />
                <label class="form-label" for="password">Password</label>
              </div>

              <!-- 2 column grid layout for inline styling -->
              <div class="row mb-4">
                <div class="col d-flex justify-content-center">


                  <div class="col mb-2">
                    <!-- Simple link -->
                    <a href="new_account.php">sign up</a>
                  </div>
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ------------------------------------------ -->

  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/all.min.js"></script>
</body>

</html>