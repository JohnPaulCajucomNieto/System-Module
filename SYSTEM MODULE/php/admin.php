<?php
session_start();
require_once 'function.php';
require_once 'conect.php';


$result = display();

?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="\trello\css\admin.css">
<link rel="stylesheet" href="\trello\css\stylel.css">
<style>
    header{
        background-color:black;
        margin-left:-.7vw;
    }
    h1{
        color:white;
    }
    p,a{
        color:white;
    }
    .tab{
        width:100vw;
        margin-left:-0.7vw;
    }
    .button1{
        color:black;
    }
</style>
</head>
<body>
    <header>
        <img src="\trello\img\logo.png">
        <h1>Module Monitoring</h1>
        <p><a href="\trello\index.html">Log Out</a></p>
    </header>
<center>
<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'b1')">Modules</button>
  <button class="tablinks" onclick="openCity(event, 'b2')">Notifications</button>
  
</div></center>
<center>
<div id="b1" class="tabcontent">
    <table>
        <tr id="tr">
            <th class="th">Module</th>
            <th class="th">Year Level</th>
            <th class="th">Quatity</th>
            <th class="th">Edit</th>
            <th style="border:none;" class="th">Delete</th>
        </tr>
        <tr>
            <?php
            while($row = mysqli_fetch_assoc($result))
            {
        ?>
        <tr>
            <td><?php echo $row['mname']; ?></td>
            <td><?php echo $row['yl']; ?></td>
            <td><?php echo $row['quan']; ?></td>
            <td><a href="update.php? update=<?php echo $row['id']; ?>" class="button1">Edit</a></td>
            <td style="border-right:none;"><a href="delete.php? delete=<?php echo $row['id']; ?>" class="button1">Delete</a></td>
                </tr>
        <?php
            }
        ?>
        </tr>
    </table>
    <button id="addData" onclick="format()">Add Data</button>
</div></center>

<div id="b2" class="tabcontent">
    <center>
        <form action="notifytbl.php" method="post">
            <input type="text" name="noti" id="noti" required>
            <input type="submit" name="submit" id="submit">
        </form>
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
                echo '<table style="border-top:none;">';
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr style="border:none;">';
                    echo '<td style="border-right:none;">' . $row['noti'] . '</td>';
                    
                    echo '</tr>';
                }
                echo '</table>';
            }
        ?>
</div>

<center>
    <div id="form">
        <h2>Insert Data</h2>
        <form action="value.php" method="post">
            <div class="field">
                <input type="text" name="mname" id="mname" required>
                <label>Module Name</label>
            </div>
            <div class="field">
                <input type="text" name="yl" id="yl" required>
                <label>Year Level</label>
            </div>
            <div class="field">
                <input type="number" name="quan" id="quan" required>
                <label>Quantity</label>
            </div>
            <input type="submit" name="submit" id="submit">
        </form>
    </div></center>

<script src="\trello\js\add.js"></script> 
</body>
</html> 
