<?php 
/* Author: Jeanna Maye E. Benitez
	File: posthandler.php
	Date: March 03, 2020
	
	Description: 
	A PHP form handler to process user input from blog post(s).
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
$tableName = "posts";
$userID = getUserID();
$badWords = array ("fuck", "bitch", "whore", "hoe", "mother fucker", "fucking", "bitching", "nigga");

define('EMPTY_STRING', "");

// Security Check
if (!isset($_POST['submit']))
{
    die("Submission Failed, no data received!");
}
else
{
    $title = $_POST['title'];
    $content = $_POST['content'];
    $title = trim($title);
    $content = trim($content);
    $content = filterWords($content);
    $contentCheck = checkBadWords($content, $badWords);
}

$dbConnect = connect($dbName);
// Check connection
if ($dbConnect) 
{
    date_default_timezone_set("America/Phoenix"); // PST - America/Los_Angeles    
    echo "<p>User ID:<br>$userID<br>Title:<br>$title<br>Content:<br>$content</p>";
    echo "<p>Date Posted: " . date("m.d.Y"). "</p>";
    echo "<p>Time Posted: " . date("h:ia"). "</p>";
    // Check String for null
    if ($title === NULL || $title === EMPTY_STRING) 
    {
        echo "<p>Title is a <em>required</em> field, it cannot be blank </p>";
    } 
    else if ($content === NULL || $content === EMPTY_STRING) 
    {
        echo "<p>Content is a <em>required</em> field, it cannot be blank </p>";
    } 
    else 
    {
        $sql = "INSERT INTO $tableName (userID_PostBy, title, content)
                VALUES ('$userID', '$title', '$content')"; 
        if ($result = $dbConnect->query($sql)) 
        {
            echo "<p>Thank you for posting!!</p>";
        } 
    }
    echo "Database Closing...";
    $dbConnect->close();
}
?>