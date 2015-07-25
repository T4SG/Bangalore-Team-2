<?php
include_once "credential.php";
   $mid =($_REQUEST['id']);
   $passwd = $_REQUEST['passwd']; 
   $con = mysql_connect($server ,$username ,$password) or die("Error!! Can't connect to server");
   mysql_select_db($databaseName) or die("Error !! Can't select the required database.");
   $query="select * from mentor where mid = '$id' ";
   $result=mysql_query($query) or die("Query failed:".mysql_error());

?>