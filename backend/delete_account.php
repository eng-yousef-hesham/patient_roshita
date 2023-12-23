<?php
include "dbconnect.php";
session_start();
$user_id_session = $_SESSION['name'];
if (empty($_SESSION['name'])) {
    header("location: ../index.php?error=login firist");
} ?>
<!DOCTYPE html>
<html>

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
    </style>
</head>

<body>
    <div class="warning-container">
        <div class="warning-content">
            <span class="warning-icon">&#9888;</span>
            <h2 class="warning-message">Warning!</h2>
            <p class="warning-description">you are going to delete your account <br> you will lose your all data <br> that you have in our website</p>
            <form action="delete_account.php" method="post">
                <input type="numper" name="delete" hidden value="<?php echo $user_id_session ?>">
                <button class="btn btn-primary" type="submit" style="background-color : red; border-radius : 10%;">I Agree</button>
            </form>
        </div>
    </div>
</body>

</html>
<?php
if (isset($_POST["delete"])) {
    $sql = "delete from user_login where id = $user_id_session";
    mysqli_query($conn, $sql);
    unset($_SESSION['name']);
    header('location:../index.php?done=the account deleted successfully');
}

?>