<?php
include('db_conn.php');

if(isset($_POST['submit']))
{
	
        $datepiker=$_POST['datepiker'];
        $datepiker1=$_POST['datepiker1'];
        $test5=$_POST['test5'];//PAR
        $test6=$_POST['test6'];//MPE
        $test5=$_POST['test7'];//PCR
        $test5=$_POST['test2'];//EPE
        $test5=$_POST['test8'];//PRR
        $test5=$_POST['test9'];//PO
      
        $insertPAR="INSERT INTO assessmentitem (AssessmentName, AssessmentDateID, StartDate, DueDate) 
        VALUES ('PAR','$test5','$datepiker', '$datepiker1')";
        $mysqli->query($insertPAR);

        $insertPAR="INSERT INTO assessmentitem (AssessmentName, AssessmentDateID, StartDate, DueDate) 
        VALUES ('MPE','$test6','$datepiker', '$datepiker1')";
        $mysqli->query($insertPAR);

        $insertPAR="INSERT INTO assessmentitem (AssessmentName, AssessmentDateID, StartDate, DueDate) 
        VALUES ('PCR','$test7','$datepiker', '$datepiker1')";
        $mysqli->query($insertPAR);

        $insertPAR="INSERT INTO assessmentitem (AssessmentName, AssessmentDateID, StartDate, DueDate) 
        VALUES ('EPE','$test2','$datepiker', '$datepiker1')";
        $mysqli->query($insertPAR);

        $insertPAR="INSERT INTO assessmentitem (AssessmentName, AssessmentDateID, StartDate, DueDate) 
        VALUES ('PRR','$test8','$datepiker', '$datepiker1')";
        $mysqli->query($insertPAR);

        $insertPAR="INSERT INTO assessmentitem (AssessmentName, AssessmentDateID, StartDate, DueDate) 
        VALUES ('PO','$test9','$datepiker', '$datepiker1')";
        $mysqli->query($insertPAR);


        echo "<script>alert('The survey is submited');</script>";
}

    header('Location: ./relate.html');




?>