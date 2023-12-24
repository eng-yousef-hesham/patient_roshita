<?php
include "dbconnect.php";
session_start();
$user_id_session = $_SESSION['name'];
if (empty($_SESSION['name'])) {
    header("location: ../index.php?error=login firist");
} ?>
<!DOCTYPE html>
<html>
<!-- backend file for doctors and patient -->

<head>
    <title>Warning Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f6f6f6;
            margin: 0;
            padding: 0;
        }

        .warning-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .warning-content {
            text-align: center;
        }

        .warning-icon {
            font-size: 100px;
            color: #f39c12;
            margin-bottom: 20px;
        }

        .warning-message {
            font-size: 24px;
            color: #333333;
            margin-bottom: 20px;
        }

        .warning-description {
            font-size: 18px;
            color: #777777;

        }

        .done {
            position: relative;
            font-size: large;
            background-color: #dff2de;
            color: #42a946;
            padding: 10px;
            width: 90%;
            border: 5px;
            left: 5%;
            text-align: center;
        }

        .error {
            position: relative;
            font-size: large;
            background-color: #F2DEDE;
            color: #A94442;
            padding: 10px;
            width: 90%;
            border: 5px;
            left: 5%;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="warning-container">
        <div class="warning-content">
            <span class="warning-icon">&#9888;</span>
            <h2 class="warning-message">Warning!</h2>
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
            <p class="warning-description">you are going to reset your account password<br> you will not be able to login with<br>old password</p>
            <form action="reset_password.php" method="post">
                <!-- Password input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="password">new Password :</label>
                    <input type="password" id="password" name="password" class="form-control" />

                </div>
                <!-- confirm -->
                <div class="form-outline mb-4" style="    position: relative; left: -31px; margin: 21px;">
                    <label class="form-label" for="confirm_password">Confirm new Password :</label>
                    <input type="password" id="confirm_password" name="confirm_password" class="form-control" />
                </div>
                <!--  -->
                <input type="numper" name="delete" hidden value="<?php echo $user_id_session ?>">
                <button class="btn btn-primary" type="submit" style="background-color : orange; border-radius : 10%;">I Agree</button>
            </form>
        </div>
    </div>
</body>

</html>
<?php
if (isset($_POST["password"]) && isset($_POST["confirm_password"])) {
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    if (empty($password)) {
        header("location: reset_password.php?error=password is required");
        exit;
    } elseif (empty($confirm_password)) {
        header("location: reset_password.php?error=confirm the password");
        exit;
    } // test if password = confirm
    elseif ($confirm_password != $password) {
        header("location: reset_password.php?error=wrong confirm password");
        exit;
    }
    $sql = "update user_login set password = '$password' where id = $user_id_session";
    mysqli_query($conn, $sql);
    unset($_SESSION['name']);
    header('location:../index.php?done=password changed successfully');
}
?>