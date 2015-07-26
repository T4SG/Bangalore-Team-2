<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Mentor</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/styles.css" rel="stylesheet">
		
	</head>
	<body>
<!-- header -->
<?php
session_start();
if(isset($_SESSION['user'])){
	$id = $_SESSION['user'];
	include_once "credential.php";
	$con = mysql_connect($server ,$username ,$password) or die("Error!! Can't connect to server");
	mysql_select_db("cfg") or die("Error !! Can't select the required database.");
	$query = "select * from admin where AID = '$id'";
	$result = mysql_query($query) or die("Query failed !! :".mysql_error());
	$row = mysql_fetch_array($result); 
	}
?>	

<div id="top-nav" class="navbar navbar-inverse navbar-static-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Dream School Foundation</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#"><i class="glyphicon glyphicon-user"></i> Mentor <span class="caret"></span></a>
                    <ul id="g-account-menu" class="dropdown-menu" role="menu">
                        <li><a href="#">My Profile</a></li>
                    </ul>
                </li>
                <li><a href="#"><i class="glyphicon glyphicon-lock"></i> Logout</a></li>
            </ul>
        </div>
    </div>
    <!-- /container -->
</div>
<!-- /Header -->

<!-- Main -->
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3">
            <!-- Left column -->
            <h3 class="text-success"><strong><i class="glyphicon glyphicon-wrench"></i> Toolbox</strong></h3>

            <hr>

            <ul class="nav nav-stacked">
                <li class="nav-header"> <a href="#" data-toggle="collapse" data-target="#userMenu"> <i class="glyphicon glyphicon-chevron-down"></i> Mentor Profile</a>
                    <ul class="nav nav-stacked collapse in" id="userMenu">
                       
                        <li><a id="mentee" ><i class="glyphicon glyphicon-user"></i> Mentee Profile <span class="badge badge-info"></span></a></li>
						 <li><a id="mentee" href="#discussion"><i class="glyphicon glyphicon-comment"></i> Discussions <span class="badge badge-info"></span></a></li>
						<li><a id="opener" data-toggle="modal" data-target=".bs-example-modal-sm" ><i class="glyphicon glyphicon-calendar"></i> Schedule a Meet <span class="badge badge-info"></span></a></li>
                        
                    </ul>
                </li>
                <li class="nav-header"> <a href="#" data-toggle="collapse" data-target="#menu2"> <i class="glyphicon glyphicon-chevron-down"></i> Feedback</a>

                    <ul class="nav nav-stacked collapse" id="menu2">
                        <li><a href="#" id="info">Information &amp; Stats</a>
                        </li>
                        <li><a href="main.php" id="alert">Form</a>
                        </li>
                    </ul>
                </li>
                
            </ul>
        </div>
        <!-- /col-3 -->
        <div class="col-sm-9">

            
            <h3 class="text-primary"><strong><i class="glyphicon glyphicon-dashboard"></i> Dashboard</strong></h3>
            <hr>

            <div class="row">
                <!-- center left-->
                <div class="col-md-6">
				   <?php
				   error_reporting(0);
				    $id = $_SESSION['user'];
					$query = "select * from report where MID = $id";
					$result = mysql_query($query) or die("Query failed !! :".mysql_error());
                    echo "<div id='panel1'>";		
					$ctr=1;
					while($row = mysql_fetch_array($result)){
					echo " 
                    <div id='panel' class='panel panel-default'>
                        <div class='panel-heading'>
                            <h4>".$ctr++.". ".$row['TASK']."</h4></div>
                        <div class='panel-body'>

                            <small>Success</small>
                            <div class='progress'>
                                <div class='progress-bar progress-bar-success' role='progressbar' aria-valuenow='72' aria-valuemin='0' aria-valuemax='100' style='width: 72%'>
                                    <span class='sr-only'>72% Complete</span>
                                </div>
                            </div>
              
                            <small>Warning</small>
                            <div class='progress'>
                                <div class='progress-bar progress-bar-warning' role='progressbar' aria-valuenow='60' aria-valuemin='0' aria-valuemax='100' style='width: 60%'>
                                    <span class='sr-only'>60% Complete (warning)</span>
                                </div>
                            </div>
                     
                            </div>
                        <!--/panel-body-->
                    </div>";
					}
					echo "</div>";
					?>
                    <!--/panel-->

                    <hr>

                    <!--tabs-->
                    
                    <!--/tabs-->

                    <hr>
                    
                </div>
                <!--/col-->
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Notices</h4></div>
                        <div class="panel-body">
                            <div class="alert alert-info">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                This is a dismissable alert.. just sayin'.
                            </div>
                            <p></p>
                        </div>
                    </div>
                    
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <i class="glyphicon glyphicon-wrench pull-right"></i>
                                <h4> Create a Task </h4>
                            </div>
                        </div>
                        <div class="panel-body">
                            <form class="form form-vertical" action="">
                                <div class="control-group">
                                    <label> Task Name </label>
                                    <div class="controls">
                                        <input type="text" class="form-control" placeholder="Enter Name">
                                    </div>
                                </div>
								<div class="control-group">
                                    <label> Deadline </label>
                                    <div class="controls">
                                        <input type="date" class="form-control" placeholder="Enter Date">
                                    </div>
                                </div>
								<div class="control-group">
                                    <label> Resources </label>
                                    <div class="controls">
                                        <input type="text" class="form-control" placeholder="Enter Resources">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label>Description</label>
                                    <div class="controls">
                                        <textarea class="form-control"></textarea>
                                    </div>
                                </div>
                                
                                <div class="control-group">
                                    <label></label>
                                    <div class="controls">
                                        <button type="submit" class="btn btn-primary">
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--/panel content-->
                    </div>
                    <!--/panel-->
				<div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <i class="glyphicon glyphicon-wrench pull-right"></i>
                                <h4> Message Admin </h4>
                            </div>
                        </div>
                        <div class="panel-body">
                            <form class="form form-vertical" action="script/messageadmin.php">
                                <div class="control-group">
                                    <label> Name </label>
                                    <div class="controls">
                                        <input type="text" class="form-control" placeholder="Enter Name">
                                    </div>
                                </div>
								<div class="control-group">
                                    <label>Message</label>
                                    <div class="controls">
                                        <textarea class="form-control"></textarea>
                                    </div>
                                </div>
                                
                                <div class="control-group">
                                    <label></label>
                                    <div class="controls">
                                        <button type="submit" class="btn btn-primary">
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--/panel content-->
                    </div>
                    
                    <!--/panel-->

                </div>
                <!--/col-span-6-->

            </div>
            <!--/row-->

            <hr>

            <h4 id="discussion"><strong><i class="glyphicon glyphicon-comment"></i> Discussions</strong></h4>

            <hr>

            <div class="row">
                <div class="col-md-12">
                    <ul class="list-group">
					<?php
					$query = "select * from discussion";
					$result = mysql_query($query) or die("Query failed !! :".mysql_error());			
					while($row = mysql_fetch_array($result)){
                        echo "<li class='list-group-item'><h4 class='text-primary'><i class='glyphicon glyphicon-flash'></i> ".$row['disc']." </h4><small class='text-right'>MID :".$row['mid']."</small><span style='margin-left:10%;'>Tags :".$row['tag']."</span></li><hr>";
                     }
					 ?>
					</ul>
                </div>
            </div>
        </div>
        <!--/col-span-9-->
    </div>
</div>
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
                <a href="#" data-dismiss="modal" class="btn">Close</a>
                <a href="#" class="btn btn-primary">Save changes</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dalog -->
</div>
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
     <div class="modal-content adjust">
	 <div style="margin:10px 10px;padding:10px;">
	 <h4 class="text-primary">Meeting</h4><hr>
 <form class="form-horizontal">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-3 control-label">Reason</label>
    <div class="col-sm-8">
      <input type="email" class="form-control" id="inputEmail3" placeholder="Reason">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">Date</label>
    <div class="col-sm-8">
      <input type="date" class="form-control" id="inputPassword3" placeholder="Date">
    </div>
  </div>
    <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Submit</button>
    </div>
  </div>
</form>
      </div>
    </div>
  </div>
  </div>
<!-- /.modal -->
	<!-- script references -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script type="text/javascript">
		$("#mentee").click(function() {
			$("#panel1").toggle();
			$("")
			});
		$("#info").click(function() {
			$("#panel1").toggle();
			});
		$("#alert").click(function() {
			$("#panel1").toggle();
			});
		</script>
	</body>
</html>