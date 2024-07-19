<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "modules";
		
$conn = new mysqli($servername, $username, $password, $database);
		
if ($conn->connect_error) {
    die("CONNECTION FAILED: " . $conn->connect_error);
}
		
$sql1 = 'CREATE TABLE storages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    mname VARCHAR(30) NOT NULL,
    yl VARCHAR(30) NOT NULL,
    quan INT NOT NULL
)';
if ($conn->query($sql1) === TRUE) {
    echo "TABLE storages CREATED SUCCESSFULLY";
} else {
    echo "ERROR CREATING TABLE: " . $conn->error;
}

$sql2 = 'CREATE TABLE notif (
    nid INT AUTO_INCREMENT PRIMARY KEY,
    noti VARCHAR(50) NOT NULL
)';
if ($conn->query($sql2) === TRUE) {
    echo "TABLE notif CREATED SUCCESSFULLY";
} else {
    echo "ERROR CREATING TABLE: " . $conn->error;
}

$conn->close();
?>
