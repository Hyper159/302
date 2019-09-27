<?php
header('content-type:application/json;charset=utf-8');

include ('db_conn.php');

$studentName = $_POST['studentName'];


if (isset($studentName)){
    $selectStudent = "SELECT * FROM student, placement, assessmentItem 
    WHERE placement.studentID = student.studentID and
    placement.placementID = assessmentItem.placementID and
    StudentID like '%$studentName%'";
    $result = $mysqli->query($selectStudent);
    $data = array();
    if ($result->num_rows > 0 ){
        while ($row = $result->fetch_array(MYSQLI_ASSOC)){
            $data[] = $row;
        }
    }



    echo json_encode($data);
}
