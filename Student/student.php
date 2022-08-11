<?php
class Student {
    public $admissionNumber;
    public $rollNumber;
    public $studentName;
    public $engMarks;
    public $mathsMarks;
    public $scienceMarks;
    public $totalMarks;
    public $percentage;

    public function __construct($adm, $roll, $name, $eng, $maths, $science)
    {
        $this->admissionNumber = $adm;
        $this->rollNumber = $roll;
        $this->studentName = $name;
        $this->engMarks = $eng;
        $this->mathsMarks = $maths;
        $this->scienceMarks = $science;
        $this->totalMarks = ($eng + $maths + $science);
        $this->percentage = round((($eng + $maths + $science)/300)*100,2);
    }

    public function get_details()
    {
        echo"<br>";
        echo $this->admissionNumber . "<br>";
        echo $this->rollNumber . "<br>";
        echo $this->studentName . "<br>";
        echo $this->totalMarks . "<br>";
        echo $this->percentage . "<br>";

        include "../dbconnect.php";

        $sql = "SELECT * FROM `Result`"; 
        $result = mysqli_query($conn, $sql);
        $nums = mysqli_num_rows($result);
        if($nums>0) 
        {
            while($row = mysqli_fetch_assoc($result))
            {
                echo "Admission Number ".$row['AdmissionNo.'],"  Roll Number ".$row['RollNo.']."  Name ".$row['Name']." English ".$row['English']."  Mathematics ".$row['Mathematics']."  Science ".$row['Science']."  Total Score ".$row['Total']."  Percentage ".$row['Percentage'];
                echo "<br>";
            }
        }
       

    }

    public function push_data()
    {
        include "../dbconnect.php";

        $sql = "INSERT INTO `result` (`AdmissionNo.`, `RollNo.`, `Name`, `English`, `Mathematics`, `Science`, `Total`, `Percentage`) 
        VALUES ('$this->admissionNumber', '$this->rollNumber', '$this->studentName', '$this->engMarks', '$this->mathsMarks', '$this->scienceMarks', '$this->totalMarks', '$this->percentage')";

        $result = mysqli_query($conn, $sql);
        if (!$result) {
            echo "Failed!";
}       else
            echo "Data Inserted Successfully!";

    }
}
?>