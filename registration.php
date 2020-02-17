<?php
/* 
 Project Name: Milestone 1
 Version: 1.0
 Author: Jeanna Maye E. Benitez
 File: registration.php
 Date: January 30, 2020
 
 Description:
 A PHP form handler to process user input for registration.
 */
?>

<?php 
// Error Report
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// Global Variables and Constants
$dbName = "milestone1";

define('HOST_NAME', "localhost");
define('USER_NAME', "root");
define('PASSWORD', "root");

// Security Check
if (!isset($_POST['submit']))
{
    die("Submission Failed, no data received!");
}
else
{
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $bday = $_POST['bday'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $UserName = $_POST['userName'];
    $Password = $_POST['password'];
    $pswRepeat = $_POST['psw-repeat'];
}

$dbConnect = mysqli_connect(HOST_NAME, USER_NAME, PASSWORD);
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
