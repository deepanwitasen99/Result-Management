<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin_style.css">
    <title>Show Data</title>
</head>
<body id="showdata">
    <table>
        <tr>
            <th>AdmissionNo.</th>
            <th>RollNo.</th>
            <th>Name</th>
            <th>English</th>
            <th>Mathematics</th>
            <th>Science</th>
            <th>Total</th>
            <th>Percentage</th>
        </tr>
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

        $sql = "SELECT* FROM `result`";
        $result = mysqli_query($conn, $sql);
        $nums = mysqli_num_rows($result);
        if($nums>0) {
                        while($row = mysqli_fetch_assoc($result)){
                            echo "<tr><td>".$row['AdmissionNo.']. "</td><td>" . $row['RollNo.'] . "</td><td>" . $row['Name'] . "</td><td>" . $row['English'] . "</td><td>" . $row['Mathematics'] . "</td><td>" . $row['Science'] . "</td><td>" . $row['Total'] . "</td><td>" . $row['Percentage'] . "</td></tr>";
                        }
                    } else {
                        echo "No Results"."<br>";
                    }
        ?>
    </table>
    <br> 
    <button> <a href="admin.php"> Back </a> </button>
</body>
</html>