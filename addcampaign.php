<?php
    session_start();
    include('dbcon.php');

    if(!isset($_SESSION['ADMINID'])) {
        echo "<script>window.alert('You need to login first!')</script>";
        echo "<script>window.location='adminlogin.php'</script>";
    }

    if(isset($_POST['addBtn'])) {
        $name = $_POST['name'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];
        $status = $_POST['status'];
        $fees = $_POST['fees'];
        $location = $_POST['location'];
        $description = $_POST['description'];
        $aim = $_POST['aim'];
        $vision = $_POST['vision'];
        $media_app_id = $_POST['media_app_id'];
        $campaign_type_id = $_POST['campaign_type_id'];

        $image_1 = $_FILES['image_1']['name'];
        $copyFile = "images/";
        $fileName = $copyFile.uniqid()."_".$image_1;
        $copied = copy($_FILES['image_1']['tmp_name'], $fileName);

        if(! $copied) {
            echo "Failed to copy image_1!";
            exit();
        }

        $image_1 = $_FILES['image_1']['name'];
        $img_tmp_name = $_FILES['image_1']['tmp_name'];
        $path_1 = "images/".$image_1;
        copy($img_tmp_name,$path_1);

        $image_2 = $_FILES['image_2']['name'];
        $img_tmp_name = $_FILES['image_2']['tmp_name'];
        $path_2 = "images/".$image_2;
        copy($img_tmp_name,$path_2);

        $image_3 = $_FILES['image_3']['name'];
        $img_tmp_name = $_FILES['image_3']['tmp_name'];
        $path_3 = "images/".$image_3;
        copy($img_tmp_name,$path_3);

        $image_4 = $_FILES['image_4']['name'];
        $img_tmp_name = $_FILES['image_4']['tmp_name'];
        $path_4 = "images/".$image_4;
        copy($img_tmp_name,$path_4);

        $queryString = "SELECT * FROM campaigns WHERE name='$name'";
        $runQuery = mysqli_query($connection, $queryString);
        $count = mysqli_num_rows($runQuery);

        if($count > 0) {
            echo "<script>window.alert('Campaign already exists!')</script>";
            echo "<script>window.location='addcampaign.php'</script>";
        } else {
            $insertString = "INSERT INTO campaigns 
            (`name`, `start_date`, `end_date`, `status`, `fees`, `location`, `description`, `aim`, `vision`, `image_1`, `image_2`, `image_3`, `image_4`, `media_app_id`, `campaign_type_id`) 
            VALUES 
            ('$name', '$start_date', '$end_date', '$status', '$fees', '$location', '$description', '$aim', '$vision', '$path_1', '$path_2', '$path_3', '$path_4', '$media_app_id', '$campaign_type_id')";

            $runInsertQuery = mysqli_query($connection, $insertString);
            
            if ($runInsertQuery) {
                echo "<script>alert('New Campaign Added!')</script>";
                echo "<script>window.location='addcampaign.php'</script>";
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
    <title>SMC - Add Campaign</title>
    
</head>
<body>

    <!-- <form action="addmediaapp.php" method="POST" enctype="multipart/form-data">
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
    </form> -->
    <form action="addcampaign.php" method="POST" enctype="multipart/form-data">
        <h2>Add Campaign</h2>

        <label for="">Add Name</label>
        <input type="text" name="name" id="name" required />

        <label for="">Add Start Date</label>
        <input type="date" name="start_date" id="start_date" value="<?php date('Y-m-d') ?>" required />

        <label for="">Add End Date</label>
        <input type="date" name="end_date" id="end_date"  value="<?php date('Y-m-d') ?>" required />
        
        <label for="">Status</label>
        <select name="status" id="">
            <option value="available">Available</option>
            <option value="unavailable">Unavailable</option>
        </select>
        
        <label for="">Fees</label>
        <input type="number" name="fees" id="fees" min="1" required />
        
        <label for="">Location</label>
        <input type="text" name="location" id="location" required />
        
        <label for="">Image</label>
        <input type="file" name="image_1" alt="" required >
        <label for="">Image</label>
        <input type="file" name="image_2" alt="" required>
        <label for="">Image</label>
        <input type="file" name="image_3" alt="" required >
        <label for="">Image</label>
        <input type="file" name="image_4" alt="" required >
        
        <label for="">Description</label>
        <input type="text" name="description" id=""  />
        <label for="">Aim</label>
        <input type="text" name="aim" id=""  />
        <label for="">Vision</label>
        <input type="text" name="vision" id=""  />

        <label for="">Media App</label>
        <select name="media_app_id" id="">
            <?php
                $select = "SELECT * FROM media_app";
                $query = mysqli_query($connection, $select);
                $count = mysqli_num_rows($query);

                for($i=0; $i<$count; $i++) {
                    $row = mysqli_fetch_array($query);
                    $id = $row['id'];
                    $name = $row['name'];
                    echo "<option value='$id'>$name</option>";
                }

            ?>
        </select>

        <label for="">Campaign Type</label>
        <select name="campaign_type_id" id="">
            <?php
                $select = "SELECT * FROM campaign_types";
                $query = mysqli_query($connection, $select);
                $count = mysqli_num_rows($query);

                for($i=0; $i<$count; $i++) {
                    $row = mysqli_fetch_array($query);
                    $id = $row['id'];
                    $name = $row['name'];
                    echo "<option value='$id'>$name</option>";
                }

            ?>
        </select>
        
        <input type="submit" name="addBtn" value="Add" />
    </form>
</body>
</html>