<?php

include('dbcon.php');

// $adminTableQuery = "
// CREATE TABLE admin
// (
//     id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
//     name VARCHAR(40),
//     username VARCHAR(40),
//     email VARCHAR(40),
//     password VARCHAR(40),
//     phone VARCHAR(40)
// );
// ";

// $query = mysqli_query($connection, $adminTableQuery);

// if($query) {
//     echo "<p>Admin table created.</p>";
// } else {
//     echo "<p>failed to create admin table.</p>";
// }

// $campaignTypeQuery = "
//     CREATE TABLE campaign_types
//     (
//         id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
//         name VARCHAR(40)
//     )
// ";
// $query = mysqli_query($connection, $campaignTypeQuery);

// if($query) {
//     echo "<p>Campaign Types table created.</p>";
// } else {
//     echo "<p>failed to create campaign types table.</p>";
// }

// $mediaAppQuery = "
//     CREATE TABLE media_app
//     (
//         id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
//         name VARCHAR(255),
//         image VARCHAR(255),
//         rating INT,
//         technique TEXT,
//         status VARCHAR(40)
//     )
// ";
// $query = mysqli_query($connection, $mediaAppQuery);

// if($query) {
//     echo "<p>Media App table created.</p>";
// } else {
//     echo "<p>failed to create media app table.</p>";
// }

// $mediaAppQuery = "
//     CREATE TABLE campaigns
//     (
//         id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
//         name VARCHAR(255),
//         start_date DATE,
//         end_date DATE,
//         status VARCHAR(40),
//         fees VARCHAR(40),
//         location VARCHAR(40),
//         description TEXT,
//         aim VARCHAR(40),
//         vision VARCHAR(40),
//         image_1 VARCHAR(40),
//         image_2 VARCHAR(40),
//         image_3 VARCHAR(40),
//         image_4 VARCHAR(40),
//         media_app_id int,
//         campaign_type_id int,
//         FOREIGN KEY (media_app_id) REFERENCES media_app (id),
//         FOREIGN KEY (campaign_type_id) REFERENCES campaign_types (id)
        
        
//     )
// ";
// $query = mysqli_query($connection, $mediaAppQuery);

// if($query) {
//     echo "<p>Campaign Type table created.</p>";
// } else {
//     echo "<p>failed to create Campaign Type table.</p>";
// }
$mediaAppQuery = "
    CREATE TABLE customers
    (
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        username VARCHAR(40),
        first_name VARCHAR(40),
        last_name VARCHAR(40),
        email VARCHAR(40),
        password VARCHAR(40),
        phone VARCHAR(40),
        registered_month VARCHAR(40),
        profile VARCHAR(40)
    )
";
$query = mysqli_query($connection, $mediaAppQuery);

if($query) {
    echo "<p>Customers table created.</p>";
} else {
    echo "<p>failed to create Customers table.</p>";
}

// $mediaAppQuery = "
//     CREATE TABLE participate_forms
//     (
//         id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
//         apply_date DATE,
//         quantity VARCHAR(40),
//         tax VARCHAR(40),
//         total_cost VARCHAR(40),
//         description VARCHAR(40),
//         status VARCHAR(40),
//         email VARCHAR(40),
//         phone VARCHAR(40),
//         payment_type VARCHAR(40),
//         customer_id INT,
//         campaign_id INT,
//         FOREIGN KEY (customer_id) REFERENCES customers (id),
//         FOREIGN KEY (campaign_id) REFERENCES campaigns (id)
//     )
// ";
// $query = mysqli_query($connection, $mediaAppQuery);

// if($query) {
//     echo "<p>Participate Form table created.</p>";
// } else {
//     echo "<p>failed to create Participate Form table.</p>";
// }

