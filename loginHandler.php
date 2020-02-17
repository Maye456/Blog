<?php 
/* Author: Jeanna Maye E. Benitez
	File: loginHandler.php
	Date: February 16, 2020
	
	Description: 
	A PHP form handler to process user input for login.
*/
?>

<?php 
// Error Report
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// Global Variables & Constants
$dbName = "milestone1";

define('HOST_NAME', "localhost");
define('USER_NAME', "root");
define('PASSWORD', "root");
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
            if ($result = mysqli_query($dbConnect, $sql))
            {
                $nmbrRows = mysqli_num_rows($result);
                if($nmbrRows == 1)
                {   // Success
                    echo "<p><em>Login Successful!</em></p>";
                }
                else if ($nmbrRows == 0)
                {   // No Data
                    echo "<p><em>Login Failed!</em></p>";
                }
                else
                {   // Failure
                    echo "<p><em>There are multiple users with the same username & password</em></p>";
                }
            }
            else 
            {
                echo "<p>ERROR: " . mysqli_error($dbConnect) . "</p>";
            }
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