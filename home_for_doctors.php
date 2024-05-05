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
    <link rel="stylesheet" href="css/home_for_doctors_style.css">
    <link rel="stylesheet" href="css/home_style.css">
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

    <!-- ----------------------------------- -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/all.min.js"></script>

    <!-- Welcome Section -->
    <section class="welcome-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="welcome-text">
                        <h2>Welcome, DR \ <?php
                                            $user_name_file = $row['name'];
                                            echo "$user_name_file";
                                            ?></h2>
                        <p>We extend a warm welcome to you, esteemed healthcare professional. You have entered a
                            platform dedicated to revolutionizing patient care, and we are thrilled to have you on
                            board.</p>
                        <p>At Healthray, simplicity and speed are at the heart of our design, ensuring a seamless
                            experience for you in treating your patients. Our commitment is to provide you with
                            top-notch healthcare services, making your practice more efficient and patient-focused.</p>
                        <p>Explore our site to discover a range of healthcare services tailored to your needs. Your
                            dedication to healing aligns perfectly with our mission to enhance the well-being of
                            individuals through cutting-edge healthcare solutions.</p>
                        <button class="btn btn-primary" onclick="scrollToAboutUs()">Learn More About Us</button>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="welcome-image">
                        <img src="<?php
                                    if (empty($row["user_image"])) {
                                        echo "imgs/user.jpg";
                                    } else {
                                        $user_image_file = $row['user_image'];
                                        echo "user_image/$user_image_file";
                                    }
                                    ?>" alt="Welcome Image" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Welcome Section -->

    <!-- About Us Section -->
    <section class="about-us">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h2><b>About Us</b></h2>
                    <p>Healthray is your trusted partner in transforming the landscape of healthcare management. As a
                        healthcare professional, your role is vital in providing quality care, and our platform is
                        designed to support and streamline your practice.</p>
                    <p>Our hospital management software is meticulously crafted to manage and optimize every aspect of
                        healthcare administration, from patient records and billing to staff scheduling and inventory
                        management. With Healthray's software, you can elevate the efficiency of your operations, reduce
                        paperwork, and enhance the overall quality of patient care.</p>
                    <p>Experience the benefits of our clinic management system, tailored to meet the unique needs of
                        medical practitioners like yourself. From organizing patient details to managing appointments
                        and improving teamwork, our platform is here to empower your medical practice.</p>
                    <button class="btn btn-primary" onclick="scrollToSection('our-services')">Explore Our
                        Specialized Services</button>

                </div>
                <div class="col-lg-6">
                    <img src="imgs/home4.jpg" alt="About Us Image" class="img-fluid">
                </div>
            </div>
        </div>
    </section>
    <!-- End About Us Section -->

    <!-- Our Services Section -->
    <section class="our-services" id="our-services">
        <div class="container">
            <h2><b>Our Services</b></h2>
            <div class="row">
                <!-- Service Card 1 -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <i class="fa-solid fa-hospital-user fa-2xl"></i>
                            <h5 class="card-title">The Clinic Management System</h5>
                            <p class="card-text">The Healthray software for hospitals helps to have quick access to all
                                the information.</p>
                        </div>
                    </div>
                </div>

                <!-- Service Card 2 -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <i class="fa-solid fa-file-invoice fa-2xl"></i>
                            <h5 class="card-title">The Reception Management</h5>
                            <p class="card-text">
                                The Healthray App facility helps to keep all the records, queries, and follow-ups at
                                your fingertips.</p>
                        </div>
                    </div>
                </div>

                <!-- Service Card 3 -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <i class="fa-solid fa-rectangle-list fa-2xl"></i>
                            <h5 class="card-title">The Discharge Summary Of Patient</h5>
                            <p class="card-text">The Healthray App gives a discharge summary of each patient and is also
                                easily accessible.</p>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary" onclick="scrollToSection('our-process')">Discover Our Process</button>

            </div>

        </div>

    </section>
    <!-- End Our Services Section -->

    <!-- Our Best Working Process Section -->
    <section class="our-process" id="our-process">
        <div class="container">
            <h2><b>Our Best Working Process</b></h2>
            <div class="row">
                <!-- Process Step 1 -->
                <div class="col-md-4">
                    <div class="process-step">
                        <img src="imgs/home2.jpg" alt="Step 1 Image" class="img-fluid">
                        <p><b>Add Patient</b></p>
                        <p>Fill out the details of your patient using the reception module or the EMR.</p>
                    </div>
                </div>

                <!-- Process Step 2 -->
                <div class="col-md-4">
                    <div class="process-step">
                        <img src="imgs/home3.jpg" alt="Step 2 Image" class="img-fluid">
                        <p><b>Make An Appointment</b></p>
                        <p>You can manage your queue fast and remotely from anywhere and on any device with planned
                            appointments.</p>
                    </div>
                </div>

                <!-- Process Step 3 -->
                <div class="col-md-4">
                    <div class="process-step">
                        <img src="imgs/home5.jpg" alt="Step 3 Image" class="img-fluid">
                        <p><b>Generate Prescription</b></p>
                        <p>Consult with patients to create a prescription in a few seconds.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Our Best Working Process Section -->

    <script>
        function scrollToAboutUs() {
            document.querySelector('.about-us').scrollIntoView({
                behavior: 'smooth'
            });
        }

        function scrollToSection(sectionId) {
            document.getElementById(sectionId).scrollIntoView({
                behavior: 'smooth'
            });
        }
    </script>
</body>

</html>