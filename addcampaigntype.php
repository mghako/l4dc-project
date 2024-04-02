<?php
    session_start();
    include('dbcon.php');

    if(!isset($_SESSION['ADMINID'])) {
        echo "<script>window.alert('You need to login first!')</script>";
        echo "<script>window.location='adminlogin.php'</script>";
    }

    if(isset($_POST['addBtn'])) {
        $name = $_POST['name'];

        $queryString = "SELECT * FROM campaign_types WHERE name='$name'";
        $runQuery = mysqli_query($connection, $queryString);
        $count = mysqli_num_rows($runQuery);

        if($count > 0) {
            echo "<script>window.alert('Campaign type already exists!')</script>";
            echo "<script>window.location='addcampaigntype.php'</script>";
        } else {
            $insertString = "INSERT INTO campaign_types (name) VALUES ('$name')";

            $runInsertQuery = mysqli_query($connection, $insertString);

            if ($runInsertQuery) {
                echo "<script>alert('New Campaign Type Created!')</script>";
                echo "<script>window.location='addcampaigntype.php'</script>";
            } else {
                echo "Error: " . $runInsertQuery . "<br>" . mysqli_error($connection);
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Campaign Type</title>
</head>
<body>
    <h2>Add Campaign Type</h2>
    <form action="addcampaigntype.php" method="POST">
        <label for="">Campaign Type</label>
        <input type="text" name="name" id="name" required />
        
        <input type="submit" name="addBtn" value="Add" />
    </form>
</body>
</html>