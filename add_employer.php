<?php
include('db_conn.php');
if(isset($_POST['Email'])) {
    $firstName = $_POST['FirstName'];
    $lastName = $_POST['LastName'];
    $email = $_POST['Email'];
    $OrganisationID = $_POST['OrganisationName'];
    $OrganisationWeb = $_POST['OrganisationWebsite'];
    $password = $_POST['Password'];


    $insertPassword = "INSERT INTO user (Password, RoleID, RoleLevel) VALUES ('$password', 'Employer', '2');";
    //execute query to the database and retrieve the result ($result)
    $result = $mysqli->query($insertPassword);

    $selectUserID = "SELECT UserID from user where Password = '$password';";
    $result = $mysqli->query($selectUserID);
    $row = $result->fetch_array(MYSQLI_ASSOC);
    $employerID = $row['UserID'];

    $insertUserID = "INSERT INTO employer (employerID) VALUES ('$employerID')";
    $result = $mysqli->query($insertUserID);

    $updateEmployer = "UPDATE employer 
        SET OrganisationID = '$OrganisationID', OrganisationWebsite = '$OrganisationWeb', FirstName = '$firstName', LastName = '$lastName', EmailAddress = '$email'
        WHERE employerID = '$employerID';";

    $result = $mysqli->query($updateEmployer);


    /*$insertUserID = "INSERT INTO employer (employerID)
        SELECT UserID from user where Password = '$password';";
    $result = $mysqli->query($insertUserID);

    $updateEmployer = "UPDATE employer 
        SET OrganisationID = '$OrganisationID', OrganisationWebsite = '$OrganisationWeb', FirstName = '$firstName', LastName = '$lastName', EmailAddress = '$email'
        WHERE employerID = (SELECT UserID from user where Password = '$password');";

    $result = $mysqli->query($updateEmployer);
    */


    header('Location: ./add_employer.html');
}



?>