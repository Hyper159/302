<?php
header('content-type:application/json;charset=utf-8');

include ('db_conn.php');

$studentName = $_POST['studentName'];
$employerName = $_POST['employerName'];

//Determine whether there is data in $studentName
if (isset($studentName)){
    $selectStudent = "SELECT * FROM placement WHERE StudentID like '%$studentName%'";
    $result = $mysqli->query($selectStudent);

    //Declare an array
    $data = array();
    //Determine if there is data in $result
    if ($result->num_rows > 0 ){
        while ($row = $result->fetch_array(MYSQLI_ASSOC)){
            $data[] = $row;
        }
    }
    //Convert variables to json data format
    echo json_encode($data);
}else{
    $selectEmployer = "SELECT * FROM placement WHERE EmployerID like '%$employerName%'";
    $result = $mysqli->query($selectEmployer);

    $data = array();

    if ($result->num_rows > 0 ){
        while ($row = $result->fetch_array(MYSQLI_ASSOC)){
            $data[] = $row;
        }
    }

    //var_dump($data);
    //print_r($data);
    echo json_encode($data);
}
