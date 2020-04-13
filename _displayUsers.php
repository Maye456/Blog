<?php
/* Author: Jeanna Maye E. Benitez
 File: _displayUsers.php
 Date: March 14, 2020
 
 Description:
 A utility API to handle CRUD operations.
 */
?>

<table>
	<tr>
		 <th>ID</th>
		 
		 <th>First Name</th>
		 
		 <th>Last Name</th>
	</tr>
	
	<?php 
	   for($index = 0; $index < count($users); $index++)
	   {
	       echo "<tr>";
	       echo "<td>" . $users[$index][0] . "</td>" . 
	   	        "<td>" . $users[$index][1] . "</td>" . 
	            "<td>" . $users[$index][2] . "</td>";
	       echo "</tr>";
	   }
	?>
</table>