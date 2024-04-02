<?php

    session_start();
    if(!isset($_SESSION['ADMINID'])) {
        echo "<script>window.alert('You need to login first!')</script>";
        echo "<script>window.location='adminlogin.php'</script>";
    }
    $adminId = $_SESSION['ADMINID'];
    $adminName = $_SESSION['ADMINNAME'];
    $adminUsername = $_SESSION['ADMINUSERNAME'];
    $adminEmail = $_SESSION['ADMINEMAIL'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>
    <section>
        <nav>
            <!-- logo -->
            <a href="#">SMC</a>
            <a href="addcampaigntype.php">Add Campaign Type</a>
            <a href="addmediaapp.php">Add Social Media</a>
            <a href="addcampgign.php">Add Campaign</a>

            <a href="logout.php">Logout</a>
        </nav>
    </section>
    <h2>Welcome from dashboard</h2>

    <p>Hello Admin, <?php echo $adminName ?></p>
    <p>Email: <?php echo $adminEmail ?></p>
</body>
</html>