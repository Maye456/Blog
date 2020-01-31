<?php
/* Author: Jeanna Maye E. Benitez
 File: registrationPageHandler.php
 Date: January 30, 2020
 
 Description:
 A PHP form handler to process user input for registration.
 */
?>

<?php 
$hostName = "localhost";
$userName = "root";
$password = "root";
$dbName = "milestone1";
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$bday = $_POST['bday'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$UserName = $_POST['userName'];
$Password = $_POST['password'];
$pswRepeat = $_POST['psw-repeat'];


$dbConnect = mysqli_connect($hostName, $userName, $password);

// Check connection
if (!$dbConnect) 
{
    echo "<p>Failed to connect to MySQL: " . mysqli_connect_error() . "</p>";
    exit();
}
else
{
    // Select A Database
    if(mysqli_select_db($dbConnect, $dbName))
    {   // Success
        echo "<p>Successfully selected the " . $dbName . " database. </p>";

        $tableName = "registration";
        $sql = "INSERT INTO $tableName (firstName, lastName, email, username, 
                password, pswRepeat, gender, dateOfBirth)
                VALUES ('$firstName', '$lastName', '$email', '$UserName', 
                '$Password', '$pswRepeat', '$gender', '$bday')";

        if(mysqli_query($dbConnect, $sql))
        {
            // Success
            echo "<p>Records inserted successfully.</p>";
        } 
        else
        {   // Failure
            echo "<p>ERROR: Could not able to execute $sql. " . mysqli_error($dbConnect) . "</p>";
        }
    }
    else 
    {   // Failure
        echo "<p>ERROR: Could not select the " . $dbName . 
            " database: " . mysqli_errno($dbConnect) . "</p>";
    }
    echo "Database Closing...";
    mysqli_close($dbConnect);
}
?>