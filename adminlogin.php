<?php

session_start();
include('dbcon.php');

if(isset($_POST['loginBtn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $getUserQuery = "
        SELECT * FROM admin WHERE email='$email' AND password='$password';
    ";

    $runGetUserQuery = mysqli_query($connection, $getUserQuery);
    $rowCount = mysqli_num_rows($runGetUserQuery);

    if($rowCount > 0) {
        $array = mysqli_fetch_array($runGetUserQuery);

        $adminId = $array['id'];
        $adminName = $array['name'];
        $adminUsername = $array['username'];
        $adminEmail = $array['email'];

        $_SESSION['ADMINID']= $adminId;
        $_SESSION['ADMINNAME']= $adminName;
        $_SESSION['ADMINUSERNAME']= $adminUsername;
        $_SESSION['ADMINEMAIL']= $adminEmail;

        echo "<script>window.alert('Login Success!')</script>";
        echo "<script>window.location='admindashboard.php'</script>";
    }


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
</head>
<body>
<form action="#" method="POST">
        <h2>Admin Login Form</h2>


        <label for="">Email</label>
        <input type="email" name="email" id="email" required />

        <label for="">Password</label>
        <input type="password" name="password" id="password" required />

        <input type="submit" name="loginBtn" value="Login" />
    </form>
</body>
</html>