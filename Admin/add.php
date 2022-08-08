<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin_style.css">
    <title>Add Data</title>
</head>
<body id="adddata">
    <h1>Enter Student Details...</h1>
    <form method="post" action="add.php">
        <label for="adm"> Student Admission Number : </label>
        <input type="number" name="adm" id="adm" placeholder="Enter Admission No."> <br> <br>
        <label for="roll"> Student Roll Number : </label>
        <input type="number" name="roll" id="roll" placeholder="Enter Roll No."><br> <br>
        <label for="name"> Student Name : </label>
        <input type="text" name="name" id="name" placeholder="Enter Student Name"><br> <br>
        <label for="eng"> Marks obtained in ENGLISH : </label>
        <input type="number" name="eng" id="eng" placeholder="Enter English Marks."><br> <br>
        <label for="maths"> Marks obtained in MATHEMATICS : </label>
        <input type="number" name="maths" id="maths" placeholder="Enter Maths Marks"><br> <br>
        <label for="scn"> Marks obtained in SCIENCE : </label>
        <input type="number" name="scn" id="scn" placeholder="Enter Science Marks">
        <br>
        <button type="submit" name="submit"> Add </button>
    </form>
    <?php
    if (isset($_POST['submit']))
    {
        $path = "C:\x"."ampp\htdocs\ResultManagement\Student\student.php";
        require "$path";
        $adm = $_POST['adm'];
        $roll = $_POST['roll'];
        $name = $_POST['name'];
        $eng = $_POST['eng'];
        $maths = $_POST['maths'];
        $scn = $_POST['scn'];
        if (!empty($adm) && !empty($roll) && !empty($name) && !empty($eng) && !empty($maths) && !empty($scn))
        {
            $stu = new Student($adm, $roll, $name, $eng, $maths, $scn);
            $stu->push_data();
            echo "<br>" . "<a href='./admin.php'> <button> Home </button> </a>";
        }
        else{
            echo "All Fields are Required!";
        }
    }
    ?>
</body>
</html>



