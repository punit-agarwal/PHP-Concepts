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