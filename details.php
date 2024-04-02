<?php

session_start();

include('dbcon.php');

if(isset($_GET['campaign_id'])) {
    $campaign_id = $_GET['campaign_id'];
    $searchQuery = "SELECT * FROM campaigns c, media_app ma, campaign_types ct WHERE c.campaign_type_id = ct.id AND c.media_app_id = ma.id AND c.id = '$campaign_id'";
    $searchResult = mysqli_query($connection, $searchQuery);
    $data = mysqli_fetch_array($searchResult);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campaign Details</title>
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

    <form action="details.php" method="GET">
        <h2>Social Media Campaign Details For <?php echo $data['name']; ?></h2>
        <img src="<?php echo $data['image_1']; ?>" width="200" height="200" />
        <!-- <img src="<?php echo $data['image_2']; ?>" />
        <img src="<?php echo $data['image_3']; ?>" />
        <img src="<?php echo $data['image_4']; ?>" /> -->
        <p>Start Date: <?php echo $data['start_date']; ?></p>
        <p>End Date: <?php echo $data['end_date']; ?></p>
        <p>Status: <?php echo $data['status']; ?></p>
        <p>Fees: <?php echo $data['fees']; ?></p>
        <p>Description: <?php echo $data['description'] ?></p>
        <p>Aim: <?php echo $data['aim'] ?></p>
        <p>Vision: <?php echo $data['vision'] ?></p>
        <a href="participateform.php?campaign_id=<?php echo $data['id']; ?>">Participate Now</a>
        <!-- <iframe
        width="600"
        height="450"
        style="border:0"
        loading="lazy"
        allowfullscreen
        referrerpolicy="no-referrer-when-downgrade"
        src="https://www.google.com/maps/embed/v1/place?key=12312321312
            &q=Space+Needle,Seattle+WA">
        </iframe> -->

    </form>
</body>
</html>