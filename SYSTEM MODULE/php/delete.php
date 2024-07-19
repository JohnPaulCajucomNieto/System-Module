<?php
include 'conect.php';

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $id = mysqli_real_escape_string($con, $id); // Sanitize input

    $sql = "DELETE FROM storages WHERE id='$id'";
    $result = mysqli_query($con, $sql);

    if($result){
        header('location:admin.php');
    } else {
        header('location:admin.php');
    }
}
?>
