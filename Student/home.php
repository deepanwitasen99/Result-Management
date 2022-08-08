<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="student_style.css">
    <title>Result</title>
 
</head>
 
<body id="home">
 
    <h1> Welcome Student! </h1>
    <form method="post" action="home.php">
        <label for="admission">Admission Number : </label>
        <input type="number" name="admission" placeholder="Enter Admission number" id="admission"><br><br>
        <label for="roll">Roll Number : </label>
        <input type="number" name="roll" placeholder="Enter Roll Number" id="roll">
        <br>
        <button>Login</button>
    </form>
    <?php
    if (isset($_POST['admission']) and isset($_POST['roll']) && strlen($_POST['admission']) && strlen($_POST['roll'])) {
        $adm = $_POST['admission'];
        $roll = $_POST['roll'];
        $host = '127.0.0.1:3308';
        $user = 'root';
        $password = '';
        $database = 'student';
        $conn = mysqli_connect($host, $user, $password, $database);
        /*if(!$conn)
            die("Connection Failed!".mysqli_connect_error());
            else
                echo "Database Connected Successfully!" . "<br>";*/
        $sql = "SELECT* FROM `result` WHERE `AdmissionNo.` = $adm";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $num = mysqli_num_rows($result);
        if ($num>0 && $row['RollNo.'] == $roll) 
        {
            echo "
                <table>
                <tr >
                <th> Admission Number </th>
                <th> Roll Number </th>
                <th> Name </th>
                <th> English </th>
                <th> Mathematics </th>
                <th> Science </th>
                <th> Total </th>
                <th> Percentage </th>
                </tr>
                <tr>
                <td>" . $row['AdmissionNo.'] . "
                <td>" . $row['RollNo.'] . "
                <td>" . $row['Name'] . "
                <td>" . $row['English'] . "
                <td>" . $row['Mathematics'] . "
                <td>" . $row['Science'] . "
                <td>" . $row['Total'] . "
                <td>" . $row['Percentage'] . "
                </table>
            ";
        } 
        else {
            echo "<h3>" . "Error in credentials...Try Again!". "<br>";
        }
        echo "<a href='../index.php'><button>Home</button></a>";

    }
    ?>
   
</body>
 
</html>
