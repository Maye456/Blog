<?php 
/* Author: Jeanna Maye E. Benitez
	File: loginHandler.php
	Date: March 04, 2020
	
	Description: 
	A PHP form handler to process user input for login.
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

// Global Variables & Constants
$dbName = "milestone1";
$message = "";

define('EMPTY_STRING', "");

// Security Check
if (!isset($_POST['submit']))
{
    die("Submission Failed, no data received!");
}
else
{
    $userName = $_POST['userName'];
    $password = $_POST['password'];
    $userName = trim($userName);
    $password = trim($password);
}

$dbConnect = connect($dbName);
if ($dbConnect) 
{
    // Check String for null
    if($userName === NULL || $userName === EMPTY_STRING)
    {
        echo "<p>UserName is a <em>required</em> field, it cannot be blank </p>";
    }
    else if($password === NULL || $password === EMPTY_STRING)
    {
        echo "<p>Password is a <em>required</em> field, it cannot be blank </p>";
    }
    else 
    {   
        // Check if Username & Password is in the database
        $tableName = "registration";
        $sql = "SELECT userID, UserName, Password FROM $tableName
                WHERE UserName='" . $userName . "' AND 
                Password='" . $password . "' ";
        if ($result = $dbConnect->query($sql))
        {
            $nmbrRows = $result->num_rows;
            if($nmbrRows == 1)
            {   // Success
                $row = $result->fetch_assoc();
                setUserID($row['userID']);
                include('loginresponse.php');
            }
            else if ($nmbrRows == 0)
            {   // No Data
                $message = "<p><em>Login Failed...</em></p> Invalid username or password.";
                include('loginfailed.php');
            }
            else
            {   // Failure
                $message = "<p><em>Login Failed...</em></p> There are multiple users with
                            the same username & password";
                include('loginfailed.php');
            }
        }
    }
}
else
{
    echo "<p>ERROR: " . $dbConnect->error() . "</p>";
}
echo "Database Closing...";
$dbConnect->close(); 
?>