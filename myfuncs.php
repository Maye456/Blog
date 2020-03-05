<?php
/* Author: Jeanna Maye E. Benitez
    File: myfuncs.php
    Date: March 04, 2020
 
    Description:
    A PHP file that has common functions to call upon.
*/
?>

<?php 
// Error Report
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// Constants
define('HOST_NAME', "localhost");
define('USER_NAME', "root");
define('PASSWORD', "root");

/**
 * @param dbName
 */

function connect($dbName)
{
    $dbConnect = new mysqli(HOST_NAME, USER_NAME, PASSWORD, $dbName);
    if (!$dbConnect)
    {
        echo "<p>Failed to connect to MySQL: " . $dbConnect->error() . "</p>";
        exit();
    }
    return $dbConnect;
}

function setUserID($id)
{
    $_SESSION['userID'] = $id;
}

function getUserID()
{
    return $_SESSION['userID'];
}

function setFirstName($firstName)
{
    $_SESSION['firstName'] = $firstName;
}

function getFirstName()
{
    return $_SESSION['firstName'];
}

function setLastName($lastName)
{
    $_SESSION['lastName'] = $lastName;
}

function getLastName()
{
    return $_SESSION['lastName'];
}
?>