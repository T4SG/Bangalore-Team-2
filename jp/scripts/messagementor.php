<?php
include_once "credential.php";
   $id = "1";
   $name =($_REQUEST['mname']);
   $sub = ($_REQUEST['sub']);
   $details = $_REQUEST['details']; 
   $purpose = $_REQUEST['purpose']; 
   $con = mysql_connect($server ,$username ,$password) or die("Error!! Can't connect to server");
   mysql_select_db($databaseName) or die("Error !! Can't select the required database.");
   $query="insert into admenmessage values ('".$id."','".$name."','".$sub."','".$details."','".$purpose."')";
   $result=mysql_query($query) or die("Query failed:".mysql_error());
   header('Location:../admin.php');
?>