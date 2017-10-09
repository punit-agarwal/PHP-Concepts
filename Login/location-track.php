<?php 
$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
  $ip = $_SESSION['ip'];
  $try1 = "http://ipinfodb.com/ip_query.php?ip=".$ip."&output=xml";
  $try2 = "http://backup.ipinfodb.com/ip_query.php?ip=".$ip."&output=xml";
  $XML = @simplexml_load_file($try1,NULL,TRUE);
  if(!$XML) { $XML = @simplexml_load_file($try2,NULL,TRUE); }
  if(!$XML) { return false; }

  //Retrieve location, set time
  if($XML->City=="") { $loc = "Localhost / Unknown"; }
  else { $loc = $XML->City.", ".$XML->RegionName.", ".$XML->CountryName; }
  $_SESSION['loc'] = $loc;
?>
