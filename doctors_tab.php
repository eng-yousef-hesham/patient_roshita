<?php
include "backend/dbconnect.php";
session_start();
$user_id_session = $_SESSION['name'];
if (empty($_SESSION['name'])) {
    header("location: index.php?error=login firist");
}
$sql = "select id , user_image , name from user_login where id = $user_id_session";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
// -------------------
// show unchecked doctors only from database
$sql1 = "select * from user_login where is_doctor = 1 and id not in (select dr_access from patient where user_id = $user_id_session AND dr_access IS NOT NULL)";
$result1 = mysqli_query($conn, $sql1);
// -------------------------------
// show checked doctors only from database
$sql2 = "select * from user_login where is_doctor = 1 and id in (select dr_access from patient where user_id = $user_id_session AND dr_access IS NOT NULL)";
$result2 = mysqli_query($conn, $sql2);
// -----------------------------------------
// show numper of doctors
$sql3 = "select count(*) from patient where user_id = $user_id_session and dr_access IS NOT NULL";
$result3 = mysqli_query($conn, $sql3);
// ----------------------
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
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/doctors_tab_style.css">
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
                    <a class="nav-link" href="home.php">
                        <span><i class="fas fa-home fa-lg fa-2xl"></i></span>
                        <p>home</p>
                    </a>
                </li>

                <li class="nav-item me-1 me-lg-1">
                    <a class="nav-link" href="doctors_tab.php">
                        <span><i class="fa-solid fa-user-doctor fa-2xl"></i></span>
                        <p class="h6edit">doctors</p>
                    </a>
                </li>

                <li class="nav-item me-1 me-lg-1">
                    <a class="nav-link" href="prescription.php">
                        <span><i class="fa-solid fa-prescription-bottle-medical fa-2xl"></i></span>
                        <p class="h6edit">prescription</p>
                    </a>
                </li>


                <li class="nav-item me-1 me-lg-1">
                    <a class="nav-link" href="setting.php">
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
                            <a class="nav-link d-lg-none d-md-none" aria-current="page" href="home.php"><span><i class="fas fa-home fa-lg fa-2xs"></i> Home</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-lg-none d-md-none" href="doctors_tab.php"><span><i class="fa-solid fa-user-doctor fa-lg fa-2xs"></i> doctors</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-lg-none d-md-none" href="#prescription.php"><span><i class="fa-solid fa-prescription-bottle-medical fa-lg fa-2xs"></i> prescription</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-lg-none d-md-none" href="setting.php"><span><i class="fa-solid fa-gear fa-lg fa-2xs"></i> settings</span></a>
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

    <!-- ---------------------------------------doctors tap----------------------------------- -->
    <!-- alerts -->
    <?php if (isset($_GET['error']) || isset($_GET['done'])) { ?>
        <div class="toast show">
            <div class="toast-header">
                done
                <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
            </div>
            <div class="toast-body">
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
            </div>
        </div>
    <?php } ?>

    <!-- -------------- -->
    <!-- checked_cards_container -->
    <div class="checked_cards_container">
        <div class="main-title mt-5 mb-5 position-relative">
            <h2>who have access</h2>
            <p class="text-black-50 text-uppercase">here you can find a doctor who have <br> ability to write your roshite now <br> only 6 doctors</p>
        </div>
        <!-- show the numper of doctors who have access -->
        <div>
            <?php $row3 = mysqli_fetch_array($result3); ?>
            <h4 class="progress_text">
                You have given access to <?php echo $row3["count(*)"]; ?> from 6 chances
            </h4>
            <div class="progress" role="progressbar" aria-label="Example with label" aria-valuenow="calc((<?php echo $row3["count(*)"] ?>/6)*100%)" aria-valuemin="0" aria-valuemax="100">
                <div class="progress-bar" style="width: calc((<?php echo $row3["count(*)"] ?>/6)*100%)"><?php echo $row3["count(*)"] ?></div>
            </div>
        </div>
        <!-- ------------------------------------------------ -->

        <div class="row row-cols-1 row-cols-md-3 g-0">
            <?php while ($row2 = mysqli_fetch_assoc($result2)) { ?>
                <div class="col">
                    <div class="card">
                        <img src="<?php
                                    if (empty($row2["user_image"])) {
                                        echo "imgs/user.jpg";
                                    } else {
                                        $user_image_file = $row2['user_image'];
                                        echo "user_image/$user_image_file";
                                        // to make it empty
                                        $user_image_file = "";
                                    }
                                    ?>" class="card-img-top" alt="doctor photo" />
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row2['name']; ?></h5>
                            <p class="card-text">
                                This is a longer card with supporting text below as a natural lead-in to
                                additional content. This content is a little bit longer.
                            </p>
                        </div>
                        <div class="card-footer">
                            <div class="d-grid gap-2 d-md-block">
                                <!-- remove access by send id for doctor from this quary and patient from this session to remove_access.php-->
                                <form action="backend/remove_access.php" method="post">
                                    <input type="numper" name="id_num_patient" hidden value="<?php echo $user_id_session ?>">
                                    <input type="numper" name="id_num_doctor" hidden value="<?php echo $row2['id']; ?>">
                                    <button class="btn btn-primary" type="submit">remove access</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <!-- -------------------------------------------------------------------------- -->
    <!-- unchecked_cards_container -->
    <div class="unchecked_cards_container">
        <div class="main-title mt-5 mb-5 position-relative">
            <h2>give doctor access</h2>
            <p class="text-black-50 text-uppercase">give access to doctor to make him <br> able to write your roshite</p>
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-0">
            <!-- retrive unchecked doctor data from database -->
            <?php while ($row1 = mysqli_fetch_assoc($result1)) { ?>
                <div class="col">
                    <div class="card">
                        <img src="<?php
                                    if (empty($row1["user_image"])) {
                                        echo "imgs/user.jpg";
                                    } else {
                                        $user_image_file = $row1['user_image'];
                                        echo "user_image/$user_image_file";
                                        // to make it empty
                                        $user_image_file = "";
                                    }
                                    ?> " class="card-img-top" alt="doctor photo" />
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row1['name']; ?></h5>
                            <p class="card-text">
                                This is a longer card with supporting text below as a natural lead-in to
                                additional content. This content is a little bit longer.
                            </p>
                        </div>
                        <div class="card-footer">
                            <div class="d-grid gap-2 d-md-block">
                                <!-- give access by send id for doctor from this quary and patient from this session to give_access.php -->
                                <form action="backend/give_access.php" method="post">
                                    <input type="numper" name="id_num_patient" hidden value="<?php echo $user_id_session ?>">
                                    <input type="numper" name="id_num_doctor" hidden value="<?php echo $row1['id']; ?>">
                                    <button class="btn btn-primary" type="submit">give access</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <!-- --------------------------------- -->
        </div>
    </div>
    <!-- ------------------------------------------------- -->

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/all.min.js"></script>
</body>

</html>