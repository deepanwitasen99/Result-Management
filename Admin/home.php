
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <button> Validate </button> <br>
    </form>
<?php
$host = '127.0.0.1:3308';
$user = 'root';
$password = '';
$database = 'student';
$conn = mysqli_connect($host, $user, $password, $database);
/*if(!$conn)
        die("Connection Failed!".mysqli_connect_error());
        else
            echo "Database Connected Successfully!" . "<br>";*/

if (isset($_POST['userid']) and isset($_POST['pwd']) && strlen($_POST['userid']) && strlen($_POST['pwd'])) {
        $adm = $_POST['userid'];
        $pass= $_POST['pwd'];
        $sql = "SELECT* FROM `admin` WHERE UserID = $adm";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $num = mysqli_num_rows($result);
        if ( $num>0 && strlen($pass)>0 && $row['Password'] == $pass) {
            echo "<h3>" . "Validated...Access Granted! "."<br>";
            echo "<a href='./admin.php'><button> Proceed</button></a>";    
        } else {
            echo "<h3>" . "Error in credentials...Access Denied!". "<br>";
            echo "<a href='../index.php'><button>Home</button></a>";
        }
    }

?>
</body>
</html>

