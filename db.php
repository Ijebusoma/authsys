<?php
$dbconn = new mysqli("localhost","root", "", "users" );
if($dbconn -> connect_errno)
{
  die("connection failed:" .$dbconn->connect_errno);

}


 ?>
