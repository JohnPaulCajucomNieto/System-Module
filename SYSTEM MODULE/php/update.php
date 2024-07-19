<?php
include 'conect.php';
session_start();
require_once 'function.php';
if (isset($_GET['update'])) {
    $id = $_GET['update'];
    $id = mysqli_real_escape_string($con, $id);

   
    if (isset($_POST['Update'])) {
        $quan = $_POST['quan'];

        
        $sql = "UPDATE storages SET  quan='$quan' WHERE id='$id'";
        $result = mysqli_query($con, $sql);

        if ($result) {
            header('location: \trello\php\admin.php');
        } else {
            echo "Error updating record: " . mysqli_error($con);
        }
    }
} else {
    echo "Invalid request. Missing 'update' parameter.";
}
$sql = "SELECT * FROM storages WHERE id='$id'";
    $result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="\trello\css\update.css">
</head>
<body>
<center>
    <div id="form">
        <h2>Update Data</h2>
        <?php
        while($row = mysqli_fetch_assoc($result)){
        ?>
        <form action="\trello\php\update.php?update=<?php echo $id; ?>" method="post">
        <div class="field">
                <input type="text" name="mname" id="mname" value="<?php echo $row['mname']; ?>" required>
                <label>Module Name</label>
            </div>
            <div class="field">
                <input type="text" name="yl" id="yl" value="<?php echo $row['yl']; ?>" required>
                <label>Year Level</label>
            </div>
            <div class="field">
                <input type="number" name="quan" id="quan" required>
                <label>Quantity</label>
            </div>
            <?php
        }
        ?>
            <input type="submit" name="Update" id="submit" value="Edit">
        </form>
    </div>
</center>
</body>
</html>
