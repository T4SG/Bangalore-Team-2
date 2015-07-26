<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Admin</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/styles.css" rel="stylesheet">
		<link href="css/jquery.dataTables.min.css" rel="stylesheet">
		
	</head>
	<body>
<!-- Header -->
<?php
session_start();
if(isset($_SESSION['user'])){
	$id = $_SESSION['user'];
	include_once "credential.php";
    //$id =($_REQUEST['id']);
    //$passwd = $_REQUEST['passwd']; 
	$con = mysql_connect($server ,$username ,$password) or die("Error!! Can't connect to server");
	mysql_select_db("cfg") or die("Error !! Can't select the required database.");
	$query = "select * from admin where AID = '$id'";
	$result = mysql_query($query) or die("Query failed !! :".mysql_error());
	$row = mysql_fetch_array($result); 
	}
?>	
<div id="top-nav" class="navbar navbar-inverse navbar-static-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-toggle"></span>
      </button>
      <a class="navbar-brand" href="#">Dream School Foundation</a>
    </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        
        <li class="dropdown">
          <a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#">
            <i class="glyphicon glyphicon-user"></i> <?php echo $row['A_NAME']; ?><span class="caret"></span></a>
          <ul id="g-account-menu" class="dropdown-menu" role="menu">
            <li><a href="#">My Profile</a></li>
            <li><a href="scripts/logout.php"><i class="glyphicon glyphicon-lock"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div><!-- /container -->
</div>
<!-- /Header -->

<!-- Main -->
<div class="container">
  
  <!-- upper section -->
  <div class="row">
	<div class="col-sm-3">
      <!-- left -->
      <h3><i class="glyphicon glyphicon-briefcase"></i> Toolbox</h3>
      <hr>
      
      <ul class="nav nav-stacked">
        <li><a href="javascript:;"><i class="glyphicon glyphicon-flash"></i> Alerts</a></li>
        <li><a href="#reports"><i class="glyphicon glyphicon-list-alt"></i> Reports</a></li>
        <li><a href="javascript:;"><i class="glyphicon glyphicon-time"></i> Real-time</a></li>
        <li><a href="javascript:;"><i class="glyphicon glyphicon-plus"></i> Advanced..</a></li>
      </ul>
      
      <hr>
      
  	</div><!-- /span-3 -->
    <div class="col-sm-9">
      	
      <!-- column 2 -->	
       <h3><i class="glyphicon glyphicon-dashboard"></i> Dashboard</h3>  
            
       <hr>
      
	   <div class="row">
            <!-- center left-->	
         	<div class="col-md-7">
			  <div class="well">Inbox Messages <span class="badge pull-right">3</span></div>
              
              <hr>
              
              <div class="panel panel-default">
                  <div class="panel-heading"><h4>Processing Status</h4></div>
                  <div class="panel-body">
                    
                    <small>Complete</small>
                    <div class="progress">
                      <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100" style="width: 72%">
                        <span class="sr-only">72% Complete</span>
                      </div>
                    </div>
                    <small>In Progress</small>
                    <div class="progress">
                      <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                        <span class="sr-only">20% Complete</span>
                      </div>
                    </div>
                    <small>At Risk</small>
                    <div class="progress">
                      <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                        <span class="sr-only">80% Complete</span>
                      </div>
                    </div>

                  </div><!--/panel-body-->
              </div><!--/panel-->                     
              
          	</div><!--/col-->
         
            <!--center-right-->
        	<div class="col-md-5">
              
                <ul class="nav nav-justified">
         			<li><a href="#"><i class="glyphicon glyphicon-cog"></i></a></li>
         			<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-comment"></i><span class="count">3</span></a><ul class="dropdown-menu" role="menu"><li><a href="#">1. Is there a way..</a></li><li><a href="#">2. Hello, admin. I would..</a></li><li><a href="#"><strong>All messages</strong></a></li></ul></li>
         			<li><a href="#"><i class="glyphicon glyphicon-user"></i></a></li>
         			<li><a title="Add Widget" data-toggle="modal" href="#addWidgetModal"><span class="glyphicon glyphicon-plus-sign"></span></a></li>
       			</ul>  
                   
                <hr>
              
                <div class="btn-group btn-group-justified">
                  <a href="#" class="btn btn-info col-sm-3" id="opener" data-toggle="modal" data-target=".bs-example-modal-sm">
                    <i class="glyphicon glyphicon-plus" ></i><br>
                    Pairing
                  </a>
                  <a  class="btn btn-info col-sm-3" id="pair">
                    <i class="glyphicon glyphicon-question-sign"></i><br>
                    Help
                  </a>
                </div>
              
			</div><!--/col-span-6-->
     
       </div><!--/row-->
  	</div><!--/col-span-9-->
    
  </div><!--/row-->
  <!-- /upper section -->
  
  <!-- lower section -->
  <div class="row">
    
    <div class="col-md-12">
      <hr>
      <h2 class="text-center text-success" id="reports"><strong><i class="glyphicon glyphicon-list-alt"></i> Reports</strong></h2>     
      <hr>    
	</div>
    <div class="col-md-8">
      
      <table class="table table-striped" id="report">
       <thead>
            <tr>
                <th>Mentor</th>
                <th>Mentee</th>
                <th>Task</th>
				<th>Date</th>
            </tr>
        </thead>
 
        <tfoot>
            <tr>
                <th>Mentor</th>
                <th>Mentee</th>
                <th>Task</th>
				<th>Date</th>
		   </tr>
        </tfoot>
        <tbody>
            <?php
			$query = "select mentor.mname,student.sname, report.task, report.date from mentor,student,report where mentor.mid IN(select mid from report) and student.sid IN(select sid from report)";
			$result = mysql_query($query) or die("Query failed !! :".mysql_error()); 
			while($row = mysql_fetch_array($result)){
			echo "<tr>
                <td>".$row['mname']."</td>
                <td>".$row['sname']."</td>
                <td>".$row['task']."</td>
				<td>".$row['date']."</td>
               </tr>";
			}
			?>
		</tbody>
      </table>
      
      <hr>              
      
      <!--tabs-->
      <div class="container">
        <ul class="nav nav-tabs" id="myTab">
          <li class="active"><a href="#profile" data-toggle="tab">Profile</a></li>
          <li><a href="#messages" data-toggle="tab">Messages</a></li>
          <li><a href="#settings" data-toggle="tab">Settings</a></li>
        </ul>
        <?php
			$query = "select * from admin where AID = '$id'";
			$result = mysql_query($query) or die("Query failed !! :".mysql_error());
			$row = mysql_fetch_array($result); 
		?>
        <div class="tab-content">
          <div class="tab-pane active" id="profile" style="margin-left:10%;">
            <h2><i class="glyphicon glyphicon-user"></i></h2>
            <h5><b>Name:</b><?php echo $row['A_NAME'];?></h5> 
            <h5><b>Level:</b><?php echo $row['LEVEL'];?></h5>
			<h5><b>Phone :</b><?php echo $row['A_PHNO'];?></h5>
			<h5><b>Email:</b><?php echo $row['A_EMAIL'];?></h5>
          </div>
          <div class="tab-pane" id="message">
		 
		  </div>
          <div class="tab-pane" id="settings">
            <h4><i class="glyphicon glyphicon-cog"></i></h4>
          </div>
        </div>
      </div>
      <!--/tabs-->
      
      <hr>
      
      
      <div class="alert alert-info">
        <button type="button" class="close" data-dismiss="alert">×</button>
        Please remember to <a href="#">Logout</a> for classified security.
      </div>

    
    </div>
    <div class="col-md-4">
    <hr>
              
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="panel-title">
            <i class="glyphicon glyphicon-wrench pull-right"></i>
            <h4>Message Mentor</h4>
          </div>
        </div>
        <div class="panel-body">
          
          <form class="form form-vertical" id="messagementor" action="scripts/messagementor.php">
            <div class="control-group">
              <label>Name</label>
              <div class="controls">
                <input type="text" name="mname" class="form-control" placeholder="Enter Name">
              </div>
            </div>      
            <div class="control-group">
              <label>Subject</label>
              <div class="controls">
                <input type="text" name="sub" class="form-control" placeholder="Enter Subject">
                
              </div>
            </div>  
            <div class="control-group">
              <label>Details</label>
              <div class="controls">
                <textarea class="form-control" name="details"></textarea>
              </div>
            </div> 
            <div class="control-group">
              <label>Purpose</label>
              <div class="controls">
                <select class="form-control" name="purpose"><option>General Question</option><option>Server Issues</option><option>Billing Question</option></select>
              </div>
            </div>    
            <div class="control-group">
              <label></label>
              <div class="controls">
                <button type="submit" class="btn btn-primary">
                  Post
                </button>
              </div>
            </div>   
            
          </form>
          
          
        </div><!--/panel content-->
      </div><!--/panel-->
      
     
    
    </div><!--/col-->
    
  </div><!--/row-->
  
</div><!--/container-->
<!-- /Main -->
<div class="modal" id="addWidgetModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Add Widget</h4>
      </div>
      <div class="modal-body">
        <p>Add a widget stuff here..</p>
      </div>
      <div class="modal-footer">
        <a href="#" class="btn">Close</a>
        <a href="#" class="btn btn-primary">Save changes</a>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dalog -->
</div><!-- /.modal -->
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
     <div class="modal-content adjust">
	 <div style="margin:10px 10px;padding:10px;">
	 <h4 class="text-primary">Pairing</h4><hr>
 <form class="form-horizontal">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-3 control-label">Mentor</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="inputEmail3" placeholder="Mentor">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">Mentee</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="inputPassword3" placeholder="Mentee">
    </div>
  </div>
    <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Submit</button>
    </div>
  </div>
<?php
$query = "SELECT DISTINCT mentor.mid m, student.sid s
FROM mentor, mlang, slang, student, mstren, sweak
WHERE mentor.mgender = student.sgender
AND mlang.mlan = slang.slan";
	$result = mysql_query($query) or die("Query failed !! :".mysql_error());
 
 echo "<div id='help' style='visibility:hidden'>
              <table class='table table-striped'>
			       <tr>
				   <th>Mentor</th>
				   <th>Mentee</th>
				   </tr>";
           while($row = mysql_fetch_array($result)){
               echo 
			   " <tr>
            	   <td>".$row[mid]."</td>
				   <td>".$row[sid]."</td>
			     </tr>	 
			   "; 
			}
	   echo "</table></div>";
 
?>

	<!-- script references -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.dataTables.min.js"></script>
		<script>
		$(document).ready(function() {
			$('#report').DataTable();
			$("#pair").click(function() {
				$("#help").toggle();
			});
		});
		  
	  </script>
	</body>
</html>