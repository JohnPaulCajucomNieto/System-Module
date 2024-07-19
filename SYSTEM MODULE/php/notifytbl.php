<?php 

session_start();
$connection = mysqli_connect("localhost","root","","modules");

if(isset($_POST['submit'])){
    $noti = $_POST['noti'];


    $insert_query = "INSERT INTO notif(noti) VALUES('$noti')";
    $insert_query_run = mysqli_query($connection, $insert_query);

    if($insert_query_run){
        $_SESSION['status'] = "Data Added!";
        header('location: admin.php');
    }else{
        $_SESSION['status'] = "Data not added!";
        header('location: admin.php');
    }

}

?>