<?php 
/* Author: Jeanna Maye E. Benitez
	File: getAllUsers.php
	Date: March 04, 2020
	
	Description: 
	A PHP program to display all users.
*/
?>

<?php 
// Error Report
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// Requires
include('myfuncs.php');

// Global Variables & Constants
$dbName = "milestone1";

define('EMPTY_STRING', "");

$dbConnect = connect($dbName);
echo "<h2>All Users That Are Registered</h2>";

if ($dbConnect) 
{   // Success
    echo "<p>Successfully selected the " . $dbName . " database. </p>";
    $tableName = "registration";
    $sql = "SELECT * FROM $tableName";
    if($result = $dbConnect->query($sql))
    {
        echo "<h3>Users</h3>";
        if($result->num_rows > 0)
        {   // Success
            // echo "<p>Number of Users registered in table: <strong>$tableName</strong>" . 
            $result->num_rows . "</p>";
            $rowNmbr = 0;
            while($row = $result->fetch_assoc())
            {
                $rowNmbr++;
                echo "<strong>[$rowNmbr]</strong> (" . $row['userID'] . ") " . $row['firstName'] . " " . 
                    $row['lastName'] ."<br>";
            }
        }
        else
        {   // Failure
            echo "<p>No Users are registered in table: <strong>$tableName</strong></p>";
        }
    }
}
else 
{   // Failure
    echo "<p>ERROR: Could not select the " . $dbName . 
    " database: " . $dbConnect->errno() . "</p>";
}
echo "<br>Database Closing...";
$dbConnect->close(); 
?>