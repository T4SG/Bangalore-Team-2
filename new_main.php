<!DOCTYPE html>
<html lang="en">
    <head>
      <title>Test</title>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
      <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet" />
      <link href="css/custom.css" type="text/css" rel="stylesheet" />
	  <script src="js/jquery.min.js"></script>
	  <script>
	  $(document).ready(function($) {
      var list_target_id = 'list-target';
      var list_select_id = 'list-select'; 
      var initial_target_html = '<option value="">Select a sem...</option>';
	  $('#'+list_target_id).html(initial_target_html);
 
  $('#'+list_select_id).change(function(e) {
    var selectvalue = $(this).val();
    $('#'+list_target_id).html('<option value="">Loading...</option>');
    if (selectvalue == "") {
       $('#'+list_target_id).html(initial_target_html);
    } else {
      $.ajax({url: 'scripts/teacher_table.php?sem='+selectvalue,
             success: function(output) {
                $('#'+list_target_id).html(output);
            },
          error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status + " "+ thrownError);
          }});
        }
    });
	});
	</script>
	 </head>
<body>

 <div class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
		  <a class="navbar-brand" href="#">
		    <img src="images/BMSCE.png" alt="bmsce" width="90px" />
		  </a>
  		  <h1 class="navbar-text head">DREAM SCHOOL FOUNDATION</h1>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav pull-right">
            <li><a href="logout.php" class="btn btn-danger navbar-btn"><i class="fa fa-sign-out"></i>Logout</a></li>
          </ul>
        </div>
      </div>
    </div>
<div class="container">
<?php
session_start();
if(isset($_SESSION['user'])){
	$usn = $_SESSION['user'];
	$con = mysql_connect("localhost","root","") or die("Error!! :".mysql_error());
	mysql_select_db("test") or die("Error!! :".mysql_error());
	$query = "select * from student where usn = '$usn'";
	$result = mysql_query($query) or die("Query failed !! :".mysql_error());
	$row = mysql_fetch_array($result); 
	
	$ctr = 1;
	echo "<div class='page-header'><h1 class='myheading'> Welcome,<br/><span style='font-size:18pt;color:#336633;'> ".$row['name']."</span></h1> ";
	echo "<div id='sdetails'><div class='row'>
	          <div class='col-md-4 col-lg-4'>
			    <img src='images/BMSCE.jpg' class='img-responsive' />
			   </div>
	          <div class='col-lg-4 col-md-4 col-sm-4 '>
	            <h4><b>Name :</b> ".$row['usn']."</h4>
			  </div>
			  <div class='col-lg-4 col-md-4 col-sm-4'>
			    <h4><b>Id:</b> ".$row['sem']."</h4>
			  </div>
			</div>
		   <div class='row margtop' >
		   
		   <div class='col-lg-4 col-md-4 col-sm-4'>
		      <h4><b>Phone no :</b> ".$row['email']."</h4>
		  </div>
		   <div class='col-lg-4 col-md-4 col-sm-4'>
			  <h4><b>Gender :</b> ".$row['sec']."</h4>
		   </div>
		   </div>
		    <div class='row'>
			<div class='col-lg-4 col-md-4 col-sm-4'></div>
			<div class='col-lg-4 col-md-4 col-sm-4'></div>
			<div class='col-lg-4 col-md-4 col-sm-4'>
		      <button class='btn btn-primary btn-md' data-toggle='modal' data-target='#myModal'><span class='glyphicon glyphicon-user'></span> Update Account</button>
		     </div>
             </div>			 
		  </div>
		</div>";
	}
	else
	{   echo "<div class='center-block'><img src='images/login.jpg' class='error-img img-responsive' alt='login' /></div>";
	     header("refresh:2 ; url=index.php");
		 exit;
	}
?>
<div class="row">
<div class="col-md-4">
<div class="panel panel-danger">
   <div class="panel-heading"><h4 class="text-center">Quiz</h4></div>
     <div class="panel-body">
	     <?php
	     $query1 = "select * from test where sem='".$row['sem']."' and sec='".$row['sec']."'";
	     $result1 = mysql_query($query1) or die("Query failed !!".mysql_error());
		 echo "<ul>";
	     while($row1 = mysql_fetch_array($result1)){
		 $t = str_replace(" ","",strtolower($row1['name']));
		   echo "<li><h3 class='text-center text-primary'>".$row1['name']."</h3></li>
		   <a href='random?test=".$t."' class='btn btn-success' role='button'><span class='glyphicon glyphicon-edit'></span> Start Test</a>";
		}
        ?>
		</ul>
	  </div>
</div>
</div>
<div class="col-md-4">
<div class="panel panel-default">
   <div class="panel-heading"><h4 class="text-center">Tasks</h4></div>
     <div class="panel-body">
      <ul>
	 <?php
	    $query1 = "select * from notification where sem='".$row['sem']."' and sec='".$row['sec']."'";
	    $result1 = mysql_query($query1) or die("Query failed !!".mysql_error());
	    while($row1 = mysql_fetch_array($result1)){
		  echo "<li>".$row1['info']."</li>";
		}
        ?>
	   </ul>
	</div>
</div>
</div>
<div class="col-lg-4 col-md-4 col-sm-4 ">
<div class="panel panel-success">
   <div class="panel-heading"><h4 class="text-center">Contact mentor</h4></div>
     <div class="panel-body">
	    <div class="product-panel-2">
		   <form class="form-horizontal" action="scripts/contact.php?" method="post">
		      <div class="form-group">
		
		
	   <div class="form-group">
		<label for="exampleInputText" class="col-sm-4 control-label">Message</label>
		<div class="col-sm-6">
		<textarea name="message" rows="4" cols="25">Write here !</textarea>
		</div>
	   </div>
	    <div class="form-group">
	          <div class="col-sm-offset-2 col-sm-10">
	          <input type="submit" name="button1" class="btn btn-primary" value="Submit" />
	          </div>
     	</div>
			</form>
	</div>
	  </div>
</div>	
</div><! --/col-md-4 -->

</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Please Tick : </h4>
      </div>
	  <form action="update" method="post">
        <div class="modal-body">
	            <ul class="list-inline">	
				  <li><input type="checkbox" name="name"> Name</li>
				  <li><input type="checkbox" name="sem"> Semester</li>
				  <li><input type="checkbox" name="sec"> Section</li>
				  <li><input type="checkbox" name="email"> Email</li>
				  <li><input type="checkbox" name="passwd"> Password</li>
                </ul>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <input type="submit" class="btn btn-primary" value="Next"/>
        </div>
		</form>
    </div>
  </div>
</div>
</div>
<?php
 mysql_close($con);
 ?>
</body>

<script src="js/bootstrap.js" type="text/javascript" ></script>
</html>