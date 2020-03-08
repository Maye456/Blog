<?php
/* 
 Project Name: Milestone 3
 Author: Jeanna Maye E. Benitez
 File: registration.php
 Date: March 04, 2020
 
 Description:
 A PHP form handler to process user input for registration.
 */
?>

<?php 
// Error Report
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// Requires
include('session.php');
include('myfuncs.php');

// Global Variables and Constants
$dbName = "milestone1";

define('EMPTY_STRING', "");

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

$dbConnect = connect($dbName);
// Check connection
if ($dbConnect) 
{   // Check String for null
    if ($firstName === NULL || $firstName === EMPTY_STRING)
    {
        echo "<p>First Name is a <em>required</em> field, it cannot be blank </p>";
    }
    else if ($lastName === NULL || $lastName === EMPTY_STRING)
    {
        echo "<p>Last Name is a <em>required</em> field, it cannot be blank </p>";
    }
    else if ($email === NULL || $email === EMPTY_STRING)
    {
        echo "<p>Email is a <em>required</em> field, it cannot be blank </p>";
    }
    else if ($UserName === NULL || $UserName === EMPTY_STRING)
    {
        echo "<p>Username is a <em>required</em> field, it cannot be blank </p>";
    }
    else if ($Password === NULL || $Password === EMPTY_STRING)
    {
        echo "<p>Password is a <em>required</em> field, it cannot be blank </p>";
    }
    else if ($pswRepeat != $Password || $pswRepeat === EMPTY_STRING)
    {
        echo "<p>Password either <em>does not</em> match or is empty</p>";
    }
    else
    {
        $tableName = "registration";
        $sql = "INSERT INTO $tableName (firstName, lastName, email, username, 
                password, pswRepeat, gender, dateOfBirth)
                VALUES ('$firstName', '$lastName', '$email', '$UserName', 
                '$Password', '$pswRepeat', '$gender', '$bday')";
        if($result = $dbConnect->query($sql))
        {
            // Success
            echo "<p>Records inserted successfully.</p>";
        }
        else
        {
            echo "ERROR: " . mysqli_error($dbConnect);
        }
    }
}
else 
{   // Failure
    echo "<p>ERROR: " . $dbConnect->error() . "</p>";
}
echo "Database Closing...";
$dbConnect->close();
?>