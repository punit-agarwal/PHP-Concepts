# CRUD operations with PHP
CRUD operations  are basic operations used in php. CRUD  stands for ..
* C: Create
* R: Remove
* U: Update
* D: Delete

We will learn one by one, so lets get started.

# 1. C : Create operation with php
In this operation we will make a HTML form and insert those values to database. You often see every websites have a contact form,
feedback form. Lets make a Simple HTML form..

```
<!DOCTYPE html>
<html>
<head>
	<title>Contact Form Example</title>
</head>
<body>
  <center>
  	<h1>Contact Form !</h1>
  </center>
  <center>
  	 <form action="script.php" method="post">
  	Name:<br/>
  	<input type="text" name="name"/><br/>
  	Email:<br/>
  	<input type="email" name="email"/><br/>
  	contact:<br/>
  	<input type="number" name="contact"/><br/><br/>
  	<input type="submit" name="registerBtn" value="Register >>"/>
  </form>
</center>
</body>
</html>
```

You will notice that  there is action=”script.php” inside the ``` <form> ``` tag.
Means  when you will press the submit button then you will be redirected to script.php page where you will 
write the php script that will accept the values form form and send to the database. First of all we will make the connection file 

``` 
<?php
// localhost      : is the host name of your server
// root           : is the username of the database
// " "            : this is field of giving password of your database, empty in my case but required
// "your_db_name" : is the name of your database where you will store the records

mysql_connect("localhost","root","","your_db_name") or die("database is not connected".mysql_error());
mysql_select_db("your_db_name") or die("database is not selected".mysql_error());
?> 
```
Now will make the script.php file for inserting the records

```
<?php
include("connection.php");
if (isset($_POST['registerBtn'])) {
	// receive the values from HTML form

	$name     = $_POST['name'];
	$email    = $_POST['email'];
	$contact  = $_POST['contact'];

   // now write query
	$queryInsert =  " insert into table_name (name_column,email_column,contact_column)
	   VALUES ('".$name."','".$email."','".$contact."') ";
	// now execute the query

	$result = mysql_query($queryInsert);

	// now check if it is not wworking
	if (!$result) {
	 	 die("query not executed".mysql_error());
	 } 
	 else{
	 	echo "Record Added Succesfully !";
	 }
}
?> 
```
# 2.	R: Remove Operation in PHP
We will use the same connection file for making connection  of php file to database.

In this example we will display the data in tabular form and a corresponding delete button  and a checkbox for each row. When the use will selete the checkbox and hit the delete button  then record will be deleted.
So lets start..
You name this follwing file as **remove_example.php** 

```
<!DOCTYPE html>
<html>
<head>
	<title>Remove Operations</title>
</head>
<body>
  <center>
  	<h1>
  		Select and Click Delete
  	</h1>
  </center>
  <center>
  	<table width="50%">
  		<tr>
  			<th>Sr.No</th>
  			<th>Name</th>
  			<th>Email</th>
  			<th>Contact</th>
  			<th>Select</th>
  			<th>Delete</th>
  		</tr>
  	    <?php  $sr = 1;
  	    $result = mysql_query("select * from table_name") or die("records not found".mysql_error());
  	    while ($records = mysql_fetch_array($result)) {?>
  	    <form action="" method="post">
  	    	 <tr>
  	    	 	<td><?php echo $sr;?></td>
  	    	 	<td><?php echo $records['name'];?></td>
  	    	 	<td><?php echo $records['email'];?></td>
  	    	 	<td><?php echo $records['contact'];?></td>
  	    	 	<td><input type="checkbox" name="idToDelete" required value="<?php echo $records['id'];?> "></td>
  	    	 	<td>
  	    	 		<input type="submit" name="deleteBtn" value="Delete>>">
  	    	 	</td>
  	    	 </tr>
  	    	</form>
  	   <?php  $sr++;
  	       }
  	    ?>
  	</table>
  </center>
</body>
</html>

<?php
     include ("connection.php");
  if (isset($_POST['deleteBtn'])) {

  	  $id = $_POST['idToDelete'];
  	  $queryResult = mysql_query("DELETE FROM table_name WHERE id = '$id' ") 
  	  or die("not deleted".mysql_error());

  	  if ($queryResult) {
  	  	 header('Location:remove.php');
  	  }
  	  else{
  	    die("Record not deleted".mysql_errno());
  	  }
     
  }
  ?>
  
  ```
**Note:**  we have left the  ``` <form action = " "> ```  because our php script is written in the same page
# 3.U: Update operation in php
In this example we will make the things just like you reset the password in websites. Means  this is a form and which has a
textbox takes the id of the user and another textbox  which will take the new email id of the user for updating it.
you can name this file as **update_example.php**

``` 
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
	 $queryResult = mysql_query("UPDATE table_name SET email_column = '$newEmailId' WHERE id = '$idd' ") 
   or die("email not updated".mysql_error());
   
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
```
# 4.	Now we will move to  4th CRUD operation that is D : Display
In this example we will  make a simple web page that will display the records which are coming from database.
So lets start.. you can name this file as **display_example.php**

``` 
<!DOCTYPE html>
<html>
<head>
	<title>Fetch Records Example</title>
</head>
<body>
	<center>
		<h1>Records From database D: Operation</h1>
	</center>

	<center>
		<table width="50%">
			<tr>
				<th>Sr.No</th>
				<th>Name</th>
				<th>Email</th>
				<th>Contact</th>
			</tr>
			<?php
			include ("connection.php");
			$sr = 1;
			$result = mysql_query("select * from table_name") or die("not fetched records".mysql_error());
              while ($records = mysql_fetch_array($result)) {?>
              	<tr>
              		<td><?php echo $sr;?></td>
              		<td><?php echo $records['name'];?></td>
              		<td><?php echo $records['email'];?></td>
              		<td><?php echo $records['contact'];?></td>
              	</tr> 
             <?php  $sr++;
             }
			?>
		</table>
	</center>
</body>
</html>
```
**Conclusion:** CRUD operations are very important part of web development. if you know how to insert the records,delete 
and update the records then its very good. because now application is there which does not require these operations.

