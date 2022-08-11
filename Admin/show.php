<!DOCTYPE html>
<html lang="en">
<head>
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
        include "../dbconnect.php";

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
    <a href="admin.php"> <input type="submit" name="back" id="back" value="Back"> </a> 
</body>
</html>