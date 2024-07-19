<?php 

session_start();
$connection = mysqli_connect("localhost","root","","modules");

if(isset($_POST['submit'])){
    $mname = $_POST['mname'];
    $yl = $_POST['yl'];
    $quan = $_POST['quan'];

    $insert_query = "INSERT INTO storages(mname, yl, quan) VALUES('$mname','$yl','$quan')";
    $insert_query_run = mysqli_query($connection, $insert_query);

    if($insert_query_run){
        $_SESSION['status'] = "Data Added!";
        header('location: \trello\php\admin.php');
    }else{
        $_SESSION['status'] = "Data not added!";
        header('location: admin.php');
    }

}

?>