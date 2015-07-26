<?php
   include_once "credential.php";
   $id =($_REQUEST['id']);
   $passwd = $_REQUEST['passwd']; 
   $con = mysql_connect($server ,$username ,$password) or die("Error!! Can't connect to server");
   mysql_select_db($databaseName) or die("Error !! Can't select the required database.");
   $query="select * from adminlogin where aid = '$id' ";
   $result=mysql_query($query) or die("Query failed:".mysql_error());
   $row = mysql_fetch_array($result);   
    if(!strcmp($passwd,$row['password'])){
	      session_start();
          $_SESSION['user'] = $id;		  
          header('Location: ../admin.php');
          exit;
    }		  
   
     else{
	    echo '<script>alert("Error !! Wrong password")</script>';
              include_once "../login.html";
     }
	mysql_close($con);
?>		