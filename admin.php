<?php
    include('dbcon.php');
    if(isset($_POST['registerbtn'])) {
        $username = $_POST['username'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $phone = $_POST['phone'];

        $number = preg_match('@[0-9]@', $password);
        $upperLetter = preg_match('@[A-Z]@', $password);
        $lowerLetter = preg_match('@[a-z]@', $password);
        $specialCharacter = preg_match('@[^\w]@', $password);
        
        $checkAdminAccount = "SELECT * FROM admin WHERE email='$email'";
        $adminQuery = mysqli_query($connection, $checkAdminAccount);
        $adminRow = mysqli_num_rows($adminQuery);

        if($adminRow > 0) {

            $array = mysqli_fetch_array($adminQuery);
            $adminId = $array['id'];
            $adminName = $array['name'];
            $adminUsername = $array['username'];
            $adminEmail = $array['email'];

            $_SESSION['ADMINID']= $adminId;
            $_SESSION['ADMINNAME']= $adminName;
            $_SESSION['ADMINUSERNAME']= $adminUsername;
            $_SESSION['ADMINEMAIL']= $adminEmail;

            echo "<script>window.alert('Admin Email Already Exists!')</script>";
            echo "<script>window.location='admin.php'</script>";
        } else {
            $adminDataQuery = "INSERT INTO admin (username, name, email, password, phone)
                               VALUES ('$username', '$name', '$email', '$password', '$phone')";
            
            $runAdminQuery = mysqli_query($connection, $adminDataQuery);

            if ($runAdminQuery) {
                echo "<script>alert('Admin Account Created!')</script>";
                echo "<script>window.location='admin.php'</script>";
            } else {
                echo "Error: " . $adminDataQuery . "<br>" . mysqli_error($connection);
            }
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>
    <form action="#" method="POST">
        <h2>Admin Registration Form</h2>

        <label for="">Username</label>
        <input type="text" name="username" id="username" required />

        <label for="">Name</label>
        <input type="text" name="name" id="name" required />

        <label for="">Email</label>
        <input type="email" name="email" id="email" required />

        <label for="">Password</label>
        <input type="password" name="password" id="password" required />

        <label for="">Phone</label>
        <input type="text" name="phone" id="phone" required />
        <input type="submit" name="registerbtn" value="Register" />
    </form>

    <a href="adminlogin.php">
        Login Here!
    </a>
</body>
</html>