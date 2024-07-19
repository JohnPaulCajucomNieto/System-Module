<?php

require_once 'conect.php';
require_once 'function.php';
$result = display();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/39272c37cc.js" crossorigin="anonymous"></script>
    <title>Document</title>
    <link rel="stylesheet" href="../css/user.css">
    <style>
        body {
        width:100vw;
        height:100vh;
        background-image: url("../img/userlogo.jpg");
        background-size: cover;
        background-repeat: no-repeat;
}       
        header{
            background-color:white;
            margin-top:-2vh;
            margin-left:-1.5vw;
            width: 101vw;
        }
        th{
            background-color:rgb(102, 190, 102);
            color:white;
            border-right:none;
            border-left:none;
        }
        .bt{
            border:none;
            border-bottom:2px solid grey;
            background-color:white;
            border-right:none;
            border-left:none;
        }
        table{
            border:none;
            
        }
        .text{
            margin-top:3vh;
            color:white;
            position:absolute;
            margin-left:40vw;
        }
        #container{
            margin-top:10vh;
        }
        #contain{
            margin-top:-21vh;
        }
    </style>
</head>
<body>
    <header>
        <img src="\trello\img\logo.png">
        <h1>Module Monitoring</h1>
        <i class="fa-solid fa-bell" id="bell"></i>
    </header><center>
    <h1 class="text">Module Available</h1></center>
    <div id="container"><center>
        <table>
            <tr>
                <th>Module</th>
                <th>Year Level</th>
                <th>Quatity</th>
            </tr>
            <tr>
                <?php
                while($row = mysqli_fetch_assoc($result))
                {
            ?>
            <tr>
            <td class="bt"><?php echo $row['mname']; ?></td>
            <td class="bt"><?php echo $row['yl']; ?></td>
            <td class="bt"><?php echo $row['quan']; ?></td>
                </tr>
            <?php
                }
            ?>
            </tr>
        </table>
    </div></center>
    <div id="contain" style="float:right;">
        <?php
            require_once 'conect.php';

            function notification() {
                global $con;
                $query = "SELECT * FROM notif";
                $result = mysqli_query($con, $query);
                return $result;
            }

            $result = notification();

            if (mysqli_num_rows($result) > 0) {
                echo '<table style="border-top:none;" id="tbl">';
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr style="border:none;">';
                    echo '<td style="border-right:none;color: aliceblue;" id="tht">' . $row['noti'] . '</td>';
                    echo '</tr>';
                }
                echo '</table>';
            }
        ?>
        </div>
    
    <script src="\trello\js\user.js"></script>
</body>
</html>
