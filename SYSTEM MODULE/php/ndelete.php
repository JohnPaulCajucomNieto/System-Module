<?php
include 'conect.php';

if(isset($_GET['delete'])){
    $nid = $_GET['delete'];
    $nid = mysqli_real_escape_string($con, $nid);

    $sql = "DELETE FROM notif WHERE nid='$nid'";
    $result = mysqli_query($con, $sql);

    if($nresult){
        header('location:admin.php');
    } else {
        header('location:admin.php');
    }
}
?>
