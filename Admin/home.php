
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="admin_style.css">
    <title>Login</title>
</head>
<body id="home">
    <h1>Welcome to Admin Login Page </h1>
    <form method="post" action="home.php">
        <label for="userid"> User ID : </label>
        <input type="number" name="userid" id="userid" placeholder="Enter User ID"> <br> <br>
        <label for="pwd"> Password : </label>
        <input type="password" name="pwd" id="pwd" placeholder="Enter Password"> <br> <br>
        <br>
        <input type="submit" name="validate" id="validate" value="Validate">
    </form>
<?php
include "../dbconnect.php";

if (isset($_POST['userid']) and isset($_POST['pwd']) && strlen($_POST['userid']) && strlen($_POST['pwd'])) {
        $adm = $_POST['userid'];
        $pass= $_POST['pwd'];
        $sql = "SELECT* FROM `admin` WHERE UserID = $adm";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $num = mysqli_num_rows($result);
        if ( $num>0 && strlen($pass)>0 && $row['Password'] == $pass) {
            echo "<h3>" . "Validated...Access Granted! "."<br>";
            echo "<a href='./admin.php'> <input type='submit' name=`proceed` id=`proceed` value='Proceed'> </a>";    
        } else {
            echo "<h3>" . "Error in credentials...Access Denied!". "<br>";
            echo "<a href='../index.php'><button>Home</button></a>";
        }
    }

?>
</body>
</html>

