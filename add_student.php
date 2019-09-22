<?php
include('db_conn.php');
if(isset($_POST['Email'])) {
    $firstName = $_POST['FirstName'];
    $lastName = $_POST['LastName'];
    $studentNum = $_POST['StudentNumber'];
    $email = $_POST['Email'];
    $password = $_POST['Password'];

    
    $insertPassword = "INSERT INTO user (Password,RoleID,RoleLevel) VALUES ('$password','Student','1');";
    //execute query to the database and retrieve the result ($result)
    $result = $mysqli->query($insertPassword);

    $selectUserID = "SELECT UserID from user where Password = '$password';";
    $result = $mysqli->query($selectUserID);
    $row = $result->fetch_array(MYSQLI_ASSOC);
    $studentID = $row['UserID'];

    $insertUserID = "INSERT INTO student (StudentID) VALUES ('$studentID')";
    $result = $mysqli->query($insertUserID);

    $updateStudentID = "UPDATE student 
    SET FirstName = '$firstName', LastName = '$lastName', StudentNumber = '$studentNum', EmailAddress = '$email'
    WHERE StudentID = '$studentID';";

    $result = $mysqli->query($updateStudentID);

    //query to check whether username is in the table (check whether the user has been signed up)
    /*$query = "SELECT * FROM user WHERE UserID='$studentID'";
    //execute query to the database and retrieve the result ($result)
    $result = $mysqli->query($query);

    //convert the result to array (the key of the array will be the column names of the table)
    $row = $result->fetch_array(MYSQLI_ASSOC);
    $errorMessage = '';
    if($row['UserID']==$studentID)
    {
        $errorMessage='studentID already exists.';
    }else{
        $insertquery="INSERT INTO user (Password) VALUES ('$password');";
        //INSERT INTO student (StudentID,FirstName,LastName,EmailAddress)
        //VALUES ('$studentID','$firstName','$lastName','$email');
        $result=$mysqli->query($insertquery);
    }
    */

    header('Location: ./add_student.html');

}

?>