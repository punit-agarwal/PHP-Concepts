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

