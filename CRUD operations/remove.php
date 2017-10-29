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
        // refresh the page after deleteing the records
  	  	 header('Location:remove.php');
  	  }
  	  else{
  	    die("Record not deleted".mysql_errno());
  	  }
     
  }
  ?>