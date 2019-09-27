<?php
include('db_conn.php');
if(isset($_POST['Email'])) {
    $firstName = $_POST['FirstName'];
    $lastName = $_POST['LastName'];
    $studentNum = $_POST['StudentNumber'];
    $email = $_POST['Email'];
    $password = $_POST['Password'];

    //query to check whether userID is in the table (check whether the user has been added)
    $selectUserID = "SELECT * FROM user where UserID = '$email'";
    //execute query to the database and retrieve the result ($result)
    $result = $mysqli->query($selectUserID);
    //convert the result to array (the key of the array will be the column names of the table)
    $row = $result->fetch_array(MYSQLI_ASSOC);

    if($row['UserID']==$email){
        echo $errorMessage='The email already exists. Please return to the Add Page';
    }else {

        //Insert data into user tables
        $insertUser = "INSERT INTO user (UserID,Password,RoleID,RoleLevel) VALUES ('$email','$password','Student','1');";
        $result = $mysqli->query($insertUser);

        //Insert data into student tables
        $insertStudent = "INSERT INTO student (StudentID, FirstName, LastName, StudentNumber, EmailAddress) 
        VALUES ('$email','$firstName','$lastName','$studentNum','$email@utas.edu.au');";

        $result = $mysqli->query($insertStudent);

        //automatically go back to add_student page
        header('Location: ./add_student.html');

    }
}

/*$selectUserID = "SELECT UserID from user where UserID = '$email';";
$result = $mysqli->query($selectUserID);
$row = $result->fetch_array(MYSQLI_ASSOC);
$studentID = $row['UserID'];

$insertUserID = "INSERT INTO student (StudentID) VALUES ('$studentID')";
$result = $mysqli->query($insertUserID);

$updateStudentID = "UPDATE student
SET FirstName = '$firstName', LastName = '$lastName', StudentNumber = '$studentNum', EmailAddress = '$email@utas.edu.au'
WHERE StudentID = '$studentID';";

$result = $mysqli->query($updateStudentID);*/

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

?>