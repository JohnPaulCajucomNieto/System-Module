<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "modules";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("CONNECTION FAILED: " . $conn->connect_error);
}

$sql1 = 'CREATE TABLE user (
    uid VARCHAR(30) NOT NULL,
    pass VARCHAR(30) NOT NULL
)';

if ($conn->query($sql1) === TRUE) {
    echo "TABLE user CREATED SUCCESSFULLY<br>";

    $insert_query = "INSERT INTO user (uid, pass) VALUES ('user1', 'pass1'), ('user2', 'pass2')";
    if ($conn->multi_query($insert_query) === TRUE) {
        echo "Records inserted successfully";
    } else {
        echo "Error inserting records: " . $conn->error;
    }
} else {
    echo "ERROR CREATING TABLE: " . $conn->error;
}

$conn->close(); // Close the database connection
?>
