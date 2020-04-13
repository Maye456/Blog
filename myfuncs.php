<?php
/* Author: Jeanna Maye E. Benitez
    File: myfuncs.php
    Date: March 15, 2020
 
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

// define('HOST_NAME', "kryptoblogsmilestone.mysql.database.azure.com");
// define('USER_NAME', "jbenitez13@kryptoblogsmilestone");
// define('PASSWORD', "Lola110618");

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

function filterWords($content)
{
    // Censor Bad Words
    $badwords = array ("shit", "crap", "ass");
    $filterCount = sizeof($badwords);
    for($i=0; $i<$filterCount; $i++)
    {
        $content = str_replace($badwords[$i], str_repeat('*',strlen('$0')), $content);
    }
    return $content;
}

function checkBadWords($content, $badWords) {
    foreach ($badWords as $word) 
    {
        if (stripos(" $content ", " $word ") !== false) 
        {
            die("<p>Foul language was detected in the post you tried to make. Please retry your post.</p>");
        }
    }
    return true;
}
?>