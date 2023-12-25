<?php
include "backend/dbconnect.php";
session_start();
$user_id_session = $_SESSION['name'];
if (empty($_SESSION['name'])) {
    header("location: index.php?error=login firist");
}
$sql = "select user_image , name , username from user_login where id = $user_id_session";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
// ---------------------------------
$sql2 = "select * from roshita where doctor_id = $user_id_session";
$result2 = mysqli_query($conn, $sql2);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrab -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <!-- --------------------- -->
    <link rel="stylesheet" href="css/patient_for_doctors_style.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="imgs/logo.webp" type="image/x-icon" />
    <title>Document</title>
</head>

<body>
    <!-- Navbar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary">
        <div class="container-fluid justify-content-between">
            <!-- Left elements -->
            <div class="d-flex">
                <!-- Brand -->
                <a class="navbar-brand me-0 mb-0 d-flex align-items-center" href="#">
                    <img src="imgs/logo.webp" height="70px" alt="Logo" loading="lazy" style="margin: 0px;" />
                </a>

                <!-- Search form -->
                <form class="input-group w-auto my-auto d-none d-sm-flex">

                </form>
            </div>
            <!-- Left elements -->

            <!-- Center elements -->
            <ul class="navbar-nav flex-row d-none d-md-flex d-sm-none">
                <li class="nav-item me-1 me-lg-1 active">
                    <a class="nav-link" href="home_for_doctors.php">
                        <span><i class="fas fa-home fa-lg fa-2xl"></i></span>
                        <p>home</p>
                    </a>
                </li>

                <li class="nav-item me-1 me-lg-1">
                    <a class="nav-link" href="patient_for_doctors.php">
                        <span><i class="fa-solid fa-hospital-user fa-2xl"></i></span>
                        <p class="h6edit">patient</p>
                    </a>
                </li>
                <li class="nav-item me-1 me-lg-1">
                    <a class="nav-link" href="setting_for_doctors.php">
                        <span><i class="fa-solid fa-gear fa-2xl"></i></span>

                        <p class="h6edit">settings</p>
                    </a>
                </li>
            </ul>

            <!-- Center elements -->

            <!-- Right elements -->
            <ul class="navbar-nav flex-row d-none d-md-flex d-sm-none">
                <li class="nav-item me-md-1 me-lg-1  d-sm-none  d-lg-flex d-md-flex">
                    <a class="nav-link d-sm-none  d-lg-flex d-md-flex " href="#">
                        <!-- user image retrive from database using session using id -->
                        <!-- photo and logout -->
                        <div class="btn-group dropstart">
                            <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="<?php
                                            if (empty($row["user_image"])) {
                                                echo "imgs/user.jpg";
                                            } else {
                                                $user_image_file = $row['user_image'];
                                                echo "user_image/$user_image_file";
                                            }
                                            ?>" class="rounded-circle" height="30" alt="Black and White Portrait of a Man" loading="lazy" />
                            </a>
                            <ul class="dropdown-menu ">
                                <!-- logout button -->
                                <li><a class="dropdown-item dropdownitemcss" href="backend/logout.php">logout</a></li>
                                <li><a class="dropdown-item dropdownitemcss" href="backend/delete_account.php">delete account</a></li>
                                <!-- ------------- -->
                            </ul>
                        </div>

                        <!-- ------------------------------------------------------------------- -->
                        <!-- ------------------------------------------------------------------- -->
                        <strong class="username d-none d-sm-none  d-lg-block d-md-block ms-1">
                            <?php
                            $user_name_file = $row['name'];
                            echo "$user_name_file";
                            ?>
                        </strong>
                    </a>
                </li>
            </ul>
            <!-- in small screen -->
            <div class="smallscreenpar d-lg-none d-md-none">
                <button class="navbar-toggler d-lg-none d-md-none " type="button" data-bs-toggle="collapse" data-bs-target="#main" aria-controls="main" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa-solid fa-bars d-lg-none"></i>
                </button>
                <div class="collapse navbar-collapse d-lg-none d-md-none" id="main">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 d-lg-none">
                        <li class="nav-item">
                            <a class="nav-link d-lg-none d-md-none" aria-current="page" href="home_for_doctors.php"><span><i class="fas fa-home fa-lg fa-2xs"></i> Home</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-lg-none d-md-none" href="patient_for_doctors.php"><span><i class="fa-solid fa-hospital-user fa-lg fa-2xs"></i> patient</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-lg-none d-md-none" href="setting_for_doctors.php"><span><i class="fa-solid fa-gear fa-lg fa-2xs"></i> settings</span></a>
                        </li>
                        <li class="nav-item me-3 me-lg-3">
                            <a class="nav-link d-sm-flex align-items-sm-center" href="#">
                                <!-- user image retrive from database using session using id -->
                                <!-- photo and logout -->
                                <div class="btn-group dropstart">
                                    <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src="<?php
                                                    if (empty($row["user_image"])) {
                                                        echo "imgs/user.jpg";
                                                    } else {
                                                        $user_image_file = $row['user_image'];
                                                        echo "user_image/$user_image_file";
                                                    }
                                                    ?>" class="rounded-circle" height="30" alt="" loading="lazy" />
                                    </a>
                                    <ul class="dropdown-menu ">
                                        <!-- logout button -->
                                        <li><a class="dropdown-item dropdownitemcss" href="backend/logout.php">logout</a></li>
                                        <li><a class="dropdown-item dropdownitemcss" href="backend/delete_account.php">delete account</a></li>
                                        <!-- ------------- -->
                                    </ul>
                                </div>
                                <!-- ------------------------------------------------------------------- -->
                                <strong class="username  d-sm-block ms-1">
                                    <?php
                                    $user_name_file = $row['name'];
                                    echo "$user_name_file";
                                    ?>
                                </strong>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- --------------------------------- -->

            <!-- Right elements -->
        </div>
    </nav>
    <!-- ------------------------------Navbar end ----------------------->
    <!-- home -->
    <div class="row  g-0">
        <div class="col-md-1 form_style col-sm-1">
        </div>
        <div class="col-md-4  col-sm-10">
            <div class="checked_cards_container">
                <div class="main-title mt-5 mb-5 position-relative">
                    <h2>check access</h2>
                    <p class="text-black-50 text-uppercase">here you can check if patient give you access<br> put patient if and check</p>
                </div>
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
            <form action="backend/access_check.php" method="post" class="id_input_field" enctype="multipart/form-data">
                <div class="form-outline mb-4">
                    <input type="numper" name="id_num_doctor" hidden value="<?php echo $user_id_session ?>">
                    <label class="form-label" for="id">Patient ID : </label>
                    <input type="text" name="id_num_patient" id="id" class="form-control" />
                </div>
                <button type="submit" class="btn btn-primary btn-block mb-4">check access</button>
            </form>
        </div>
        <div class="col-md-2 form_style col-sm-1">
        </div>
        <div class="col-md-4  col-sm-12">
            <div class="checked_cards_container">
                <div class="main-title mt-5 mb-5 position-relative">
                    <h2>Doctor prescriptions</h2>
                    <p class="text-black-50 text-uppercase">here you can find all prescriptions <br> that you have writen</p>
                </div>
            </div>
            <?php while ($row2 = mysqli_fetch_assoc($result2)) { ?>
                <div class="card">

                    <div class="rosheta">
                        <h1>prescription</h1>
                        <div class="row  g-0">
                            <div class="name col-5">
                                <h4>Patient : </h4>
                                <h2><?php
                                    // select doctor name for roshita
                                    $patient_id_num = $row2['patient_id'];
                                    $sql3 = "select name from user_login where id = $patient_id_num";
                                    $result3 = mysqli_query($conn, $sql3);
                                    $row3 = mysqli_fetch_assoc($result3);
                                    echo $row3['name']; ?></h2>
                                <!-- ------------------------ -->
                            </div>
                            <div class="col-1"></div>
                            <div class="date col-5">
                                <h4>Date : </h4>
                                <h2><?php echo $row2['roshita_date']; ?></h2>
                            </div>
                            <div class="heart_rate col-5">
                                <h4>heart rate : </h4>
                                <h2><?php echo $row2['heart rate']; ?></h2>
                            </div>
                            <div class="col-1"></div>
                            <div class="blood_pressure col-5">
                                <h4>blood pressure : </h4>
                                <h2><?php echo $row2['systolic_blood_pressure']; ?> / <?php echo $row2['diastolic_blood_pressure']; ?></h2>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"></h5>
                                <h2 class="history">Diagnosis</h2>
                                <p class="card-text">
                                    <?php echo $row2['roshita']; ?>
                                </p>
                            </div>
                            <div class="card-footer">
                                <div class="d-grid gap-2 d-md-block">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            <?php } ?>
            <!-- -------------------------------------------------------- -->
        </div>
        <div class="col-md-1 form_style col-sm-1">
        </div>
    </div>



    <!-- ----------------------------------- -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/all.min.js"></script>


</body>

</html>