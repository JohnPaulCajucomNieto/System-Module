<?php 
    $uid = $_POST['uid'];
    $pass = $_POST['pass'];

    $con = new mysqli("localhost","root","","modules");
    if($con->connect_error){
        die("Failed to connect : ".$con->connect_error);
    }else{
        $stmt = $con->prepare("SELECT * FROM user WHERE uid = ? AND pass = ?");
        $stmt->bind_param("ss",$uid,$pass);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if($stmt_result->num_rows > 0){
            $data = $stmt_result->fetch_assoc();
            if($data['pass'] == $pass){
                header("Location: admin.php");
            exit();
            }else{
                echo "<h2>Invalid User Name or Passsword</h2>";
            }
        }else{
            echo "<h2>Invalid User Name or Passsword</h2>";
        }
    }
?>