<?php
include('db_conn.php');
if(isset($_POST['Email'])) {
    $firstName = $_POST['FirstName'];
    $lastName = $_POST['LastName'];
    $email = $_POST['Email'];
    $OrganisationID = $_POST['OrganisationName'];
    $OrganisationWeb = $_POST['OrganisationWebsite'];
    $password = $_POST['Password'];

    $userID = substr($email,0,strpos($email, '@'));

    $selectUserID = "SELECT * FROM user where UserID = '$userID'";
    //query to check whether userID is in the table (check whether the user has been added)
    $result = $mysqli->query($selectUserID);
    $row = $result->fetch_array(MYSQLI_ASSOC);

    if($row['UserID']==$userID){
        echo $errorMessage='The email already exists. Please return to the Add Page';
    }else{
        $insertUser = "INSERT INTO user (UserID, Password, RoleID, RoleLevel) VALUES ('$userID','$password', 'Employer', '2');";
        //execute query to the database and retrieve the result ($result)
        $result = $mysqli->query($insertUser);

        $insertEmployer = "INSERT INTO employer (EmployerID, OrganisationID, OrganisationWebsite, FirstName, LastName, EmailAddress)
    VALUES ('$userID', '$OrganisationID', '$OrganisationWeb', '$firstName', '$lastName', '$email');";

        $result = $mysqli->query($insertEmployer);

        header('Location: ./add_employer.html');
    }
}

/*$selectUserID = "SELECT UserID from user where UserID = '$userID';";
$result = $mysqli->query($selectUserID);
$row = $result->fetch_array(MYSQLI_ASSOC);
$employerID = $row['UserID'];

$insertUserID = "INSERT INTO employer (employerID) VALUES ('$employerID')";
$result = $mysqli->query($insertUserID);

$updateEmployer = "UPDATE employer
    SET OrganisationID = '$OrganisationID', OrganisationWebsite = '$OrganisationWeb', FirstName = '$firstName', LastName = '$lastName', EmailAddress = '$email'
    WHERE employerID = '$employerID';";

$result = $mysqli->query($updateEmployer);*/


/*$insertUserID = "INSERT INTO employer (employerID)
    SELECT UserID from user where Password = '$password';";
$result = $mysqli->query($insertUserID);

$updateEmployer = "UPDATE employer
    SET OrganisationID = '$OrganisationID', OrganisationWebsite = '$OrganisationWeb', FirstName = '$firstName', LastName = '$lastName', EmailAddress = '$email'
    WHERE employerID = (SELECT UserID from user where Password = '$password');";

$result = $mysqli->query($updateEmployer);
*/

?>