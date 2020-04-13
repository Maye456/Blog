<?php 
/* Author: Jeanna Maye E. Benitez
	File: utility.php
	Date: March 14, 2020
	
	Description: 
	A utility API to handle CRUD operations.
*/
?>

<?php 
// Error Report
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// Global Variables & Constants
$dbName = "milestone1";
$tableName = "registration";
$postTableName = "posts";

require_once 'myfuncs.php';

// Call function
// $testArray = getAllUsers($dbName, $tableName);
// echo "<p>print_r \$testArray<br>";
// print_r($testArray);
// echo "</p>";

/**
 * @param dbName
 * @param tableName
 */

function getAllUsers($dbName, $tableName)
{
    $users = array();
    $index = 0;
    $dbConnect = connect($dbName);
    if ($dbConnect) 
    {
        $sql = "SELECT * FROM $tableName";
        if ($result = $dbConnect->query($sql)) 
        {
            if($result->num_rows == 0)
            {   // Failure
                echo "<p>No users are registered!</p>";
            }
            else
            {   // Success
                echo "<p>$result->num_rows users are registered!</p>";
                while($row = $result->fetch_assoc()) 
                {
                    $users[$index] = array($row['userID'], $row['firstName'], $row['lastName']);
                    ++$index;
                }
            }
        } 
    $dbConnect->close();
    return $users;
    }
}

function getAllBlogs($dbName, $postTableName)
{
    $blogs = array();
    $index = 0;
    $dbConnect = connect($dbName);
    if ($dbConnect)
    {
        $sql = "SELECT * FROM $postTableName";
        if ($result = $dbConnect->query($sql))
        {
            echo "<h3>Blogs:</h3>";
            if($result->num_rows == 0)
            {   // Failure
                echo "<p>No blogs are on file!</p>";
            }
            else
            {   // Success
                echo "<p>$result->num_rows blogs are on file!</p>";
                while($row = $result->fetch_assoc())
                {
                    $blogs[$index] = array($row['userID_PostBy'], $row['title'], $row['content'], $row['postID']);
                    ++$index;
                }
            }
        }
        $dbConnect->close();
        return $blogs;
    }
}

function getUser($dbName, $tableName, $id)
{
    $user = "";
    $dbConnect = connect($dbName);
    if ($dbConnect)
    {
        $sql = "SELECT * FROM $tableName WHERE userID='$id'";
        if ($result = $dbConnect->query($sql))
        {
            if($result->num_rows != 0)
            {
                $row = $result->fetch_assoc();
                $user = $row['username'];
            }
        }
        else
        {
            echo "<p>Error: " . $dbConnect->error . "</p>";
        }
    }
    $dbConnect->close();
    return $user;
}

function updateBlog($dbName, $postTableName, $postID, $userID, $content)
{
    $dbConnect = connect($dbName);
    if ($dbConnect)
    {
        echo "dbName: " . $dbName . "<br>";
        echo "tableName: " . $postTableName . "<br>";
        echo "postID: " . $postID . "<br>";
        echo "userID: " . $userID . "<br>";
        echo "Content: ". $content. "<br>";
        $sql = "UPDATE $postTableName SET userID_UpdatedBy='" . $userID . "', content='" . $content . "' WHERE postID='$postID'";
        if ($result = $dbConnect->query($sql))
        {
            echo "<p>Update successful!</p>";
        }
        else
        {
            echo "<p>Error: " . $dbConnect->error . "</p>";
        }
    }
    $dbConnect->close();
}

function deleteBlog($dbName, $postTableName, $postID)
{
    $dbConnect = connect($dbName);
    if ($dbConnect)
    {
        echo "postID: " . $postID . "<br>";
        $sql = "DELETE FROM $postTableName WHERE postID='$postID'";
        if ($result = $dbConnect->query($sql))
        {
            echo "<p>Delete successful...</p>";
        }
        else
        {
            echo "<p>Error: " . $dbConnect->error . "</p>";
        }
    }
    $dbConnect->close();
}

function searchBlogs($dbName, $postTableName, $title, $content)
{
    $blogs = array();
    $index = 0;
    $dbConnect = connect($dbName);
    if ($dbConnect)
    {
        $sql = "SELECT * FROM $postTableName WHERE title LIKE '%" . $title . "%' AND content LIKE '%" . $content . "%'";
        if ($result = $dbConnect->query($sql))
        {
            echo "<h3>Blogs:</h3>";
            if($result->num_rows == 0)
            {   // Failure
                echo "<p>No blogs are on file!</p>";
            }
            else
            {   // Success
                echo "<p>$result->num_rows blogs are on file!</p>";
                while($row = $result->fetch_assoc())
                {
                    $blogs[$index] = array($row['userID_PostBy'], $row['title'], $row['content'], $row['postID']);
                    ++$index;
                }
            }
        }
        $dbConnect->close();
        return $blogs;
    }
}
?>