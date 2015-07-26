<?php
include_once "credential.php";
   $id =($_SESSION['user']);
   $passwd = $_REQUEST['passwd']; 
   $con = mysql_connect($server ,$username ,$password) or die("Error!! Can't connect to server");
   mysql_select_db($databaseName) or die("Error !! Can't select the required database.");
   $query="select * from mentormessage where aid = '".$id."' ";
   $result=mysql_query($query) or die("Query failed:".mysql_error());
   while($row=mysql_fetch_array($result)){
      echo "<h3>".$row['message']."</h3><small class='text-right text-primary'>By ".$row['mid'];
   }
?>