<?php
    session_start();
    include('dbcon.php');

    if(!isset($_SESSION['ADMINID'])) {
        echo "<script>window.alert('You need to login first!')</script>";
        echo "<script>window.location='adminlogin.php'</script>";
    }

    if(isset($_POST['addBtn'])) {
        $name = $_POST['name'];
        $rating = $_POST['rating'];
        $technique = $_POST['technique'];
        $status = $_POST['status'];

        $image = $_FILES['image']['name'];
        $copyFile = "images/";
        $fileName = $copyFile.uniqid()."_".$image;
        $copied = copy($_FILES['image']['tmp_name'], $fileName);

        if(! $copied) {
            echo "Failed to copy!";
            exit();
        }
    


        $insertString = "INSERT INTO media_app (`name`, `image`, `rating`, `technique`, `status`) 
                VALUES 
            ('$name', '$fileName', '$rating', '$technique', '$status')";

        $runInsertQuery = mysqli_query($connection, $insertString);

        if ($runInsertQuery) {
            echo "<script>alert('New MediaApp Created!')</script>";
            echo "<script>window.location='addmediaapp.php'</script>";
        } else {
            echo "Error: " . $runInsertQuery . "<br>" . mysqli_error($connection);
        }
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add MediaApp</title>
    
</head>
<body>
    <h2>Add MediaApp</h2>
    <form action="addmediaapp.php" method="POST" enctype="multipart/form-data">
        <div>
            <label for="">Name</label>
            <input type="text" name="name" id="name" required />
        </div>
        <div>
            <label for="">Image</label>
            <input type="file" name="image" id="image" required />
        </div>
        <div>
            <label for="">Choose Rating</label>
            <select name="rating">
                <option value="1">Bad</option>
                <option value="2">Acceptable</option>
                <option value="3">Good</option>
                <option value="4">Very Good</option>
                <option value="5">Excellent</option>
            </select>
        </div>
        <div>
            <label for="">Technique</label>
            <textarea name="technique" id="" cols="30" rows="10" required ></textarea>
        </div>
        <div>
            <label for="">status</label>
            <select name="status" id="">
                <option value="latest">Latest</option>
                <option value="old">Old</option>
            </select>
        </div>
        <input type="submit" name="addBtn" value="Add" />
    </form>
</body>
</html>