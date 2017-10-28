<?php
mysql_connect("localhost","root","","your_db_name") or die("database is not connected".mysql_error());
mysql_select_db("your_db_name") or die("database is not selected".mysql_error());
?>a