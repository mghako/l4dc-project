<?php
    include('dbcon.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <section>
        <nav>
            <ul>
                <li><a href="#home">Home Page</a></li>
                <li><a href="#information">Information</a></li>
                <li><a href="#popular">Most Popular Social Media Apps</a></li>
                <li><a href="#parents">How Parents Can Help</a></li>
                <li><a href="#livestreaming">Livestreaming</a></li>
                <li><a href="#contact">Contact</a></li>
                <li><a href="#legislation">Legislation and Guidance</a></li>
            </ul>
        </nav>
    </section>

    <section>
        <?php 
            $query = "SELECT * FROM campaigns";
            $result = mysqli_query($connection, $query);
            $count = mysqli_num_rows($result);

            if($count == 0) {
                echo "<p>No Campaigns Available!</p>";
            } else {
                for ($i=0; $i < $count; $i+=4) { 
                    $selectQuery = "SELECT * FROM campaigns ORDER BY id LIMIT $i,4";
                    $resultQuery = mysqli_query($connection, $selectQuery);
                    $countQuery = mysqli_num_rows($resultQuery);
                    echo "<div class='column'></div>";
                    for ($j=0; $j < $countQuery ; $j++) { 
                        $array = mysqli_fetch_array($resultQuery);
                        $id = $array['id'];
                        $name = $array['name'];
                        $vision = $array['vision'];
                        $aim = $array['aim'];
                        $image_1 = $array['image_1'];
                        ?>
                    <div class="img">
                        <img src="<?php echo './images/'.$image_1; ?>" />
                        <div class="desc">
                            <h5>Campaign name: <?php echo $name; ?></h5>
                            <h5>Aims: <?php echo $aim; ?></h5>
                            <a href="details.php?campaign_id=<?php $id; ?>"><strong>Details</strong></a>
                        </div>
                    </div>
                    <?php }
                }
            }
        ?>
    </section>
</body>
</html>