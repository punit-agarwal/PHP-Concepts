<!DOCTYPE html>
<html>
<head>
	<title>Update record example</title>
</head>
<body>
	<center>
		<h1>
			Update Your Email ID
		</h1>
	</center>
	<center>
		<form action="" method="post">
			Your ID : <br/>
			<input type="text" name="idToUpdate" /><br/>
			New Email ID:<br/>
			<input type="email" name="newEmail" /><br/>
			<input type="submit" name="updateBtn" value="Update>>"/>
		</form>
	</center>
</body>
</html>
<?php
// include the connection file
include('connection.php');
if (isset($_POST['updateBtn'])) {
	 $idd = $_POST['idToUpdate']; // id to update
	 $newEmailId = $_POST['newEmail']; // new email id to be changed

    // write query and update it
	 $queryResult = mysql_query("UPDATE table_name SET email_column = '$newEmailId' WHERE id = '$idd' ") or die("email not updated".mysql_error());
	 // check if everything is fine
	 if ($queryResult) {
	 	  echo "<h1>Email ID updated Succesfully!!</h1>";
	 }
	 else{
	 	// print the negative message of failure
	 	die("Something happened wrong with script".mysql_error());
	 }

}

?>