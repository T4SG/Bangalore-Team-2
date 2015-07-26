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
		    <img src="img/logo.jpg" alt=" " width="90px" />
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
	}
	?>
	<div class='page-header'><h1 class='myheading'> <u>Feedback Form</u><br/><span style='font-size:18pt;color:#336633;'></span></h1> ";
	<div id='sdetails'><div class='row'>
	          <div class='col-md-4 col-lg-4'>
			    <!--<img src='img/logo.jpg class='img-responsive' />-->
			   </div>
	          <div class='col-lg-4 col-md-4 col-sm-4 '>
	            <h4><b>1.Opened to me effectively:</b>
				<div class='modal-body1'>
	            <ul class='list1'>	
				             <Input type = 'Radio' Name ='remarks' value= '5'>5
                            <Input type = 'Radio' Name ='remarks' value= '4'>4
				             <Input type = 'Radio' Name ='remarks' value= '3'>3
                           <Input type = 'Radio' Name ='remarks' value= '2'>2
                           <Input type = 'Radio' Name ='remarks' value= '1'>1
				  <BR><hr>
		<h4>
		</div>
		       <b>2.Understood things from my point of view</b>
	            <div class='modal-body2'>
	            <ul class='list2'>	
				             <Input type = 'Radio' Name ='remarks' value= '5'>5
                            <Input type = 'Radio' Name ='remarks' value= '4'>4
				             <Input type = 'Radio' Name ='remarks' value= '3'>3
                            <Input type = 'Radio' Name ='remarks' value= '2'>2 
                            <Input type = 'Radio' Name ='remarks' value= '1'>1
               <hr> </ul></div>
			   <h4><b>3.Used on what was important to me</b>
			         <div class='modal-body3'>
	                 <ul class='list3'>	
				             <Input type = 'Radio' Name ='remarks' value= '5'>5
                            <Input type = 'Radio' Name ='remarks' value= '4'>4
				             <Input type = 'Radio' Name ='remarks' value= '3'>3
                            <Input type = 'Radio' Name ='remarks' value= '2'>2
                            <Input type = 'Radio' Name ='remarks' value= '1'>1
               <hr> </ul></div>
        <h4><b>4.Accepted what I said without judging me</b>
		     <div class='modal-body4'>
	         <ul class='list4'>	
				             <Input type = 'Radio' Name ='remarks' value= '5'>5
                             <Input type = 'Radio' Name ='remarks' value= '4'>4
				             <Input type = 'Radio' Name ='remarks' value= '3'>3
                             <Input type = 'Radio' Name ='remarks' value= '2'>2
                             <Input type = 'Radio' Name ='remarks' value= '1'>1
               <hr> </ul></div>
        <h4><b>5.Showed warmth towards me</b>
				 <div class='modal-body5'>
	            <ul class='list5'>	
				             <Input type = 'Radio' Name ='remarks' value= '5'>5
                             <Input type = 'Radio' Name ='remarks' value= '4'>4
				             <Input type = 'Radio' Name ='remarks' value= '3'>3
                             <Input type = 'Radio' Name ='remarks' value= '2'>2
                             <Input type = 'Radio' Name ='remarks' value= '1'>1
                <hr> </ul></div>
        <h4><b>6.Created a safe and trusting environment</b>
      			  <div class='modal-body6'>
	            <ul class='list6'>	
				             <Input type = 'Radio' Name ='remarks' value= '5'>5
                             <Input type = 'Radio' Name ='remarks' value= '4'>4
				             <Input type = 'Radio' Name ='remarks' value= '3'>3
                             <Input type = 'Radio' Name ='remarks' value= '2'>2
                             <Input type = 'Radio' Name ='remarks' value= '1'>1
               <hr> </ul></div>
        <h4><b>7.Began and finished our sessions on time</b>
				 <div class='modal-body7'>
	            <ul class='list7'>	
				             <Input type ='Radio' Name ='remarks' value= '5'>5
                             <Input type ='Radio' Name ='remarks' value= '4'>4
				             <Input type ='Radio' Name ='remarks' value= '3'>3
                             <Input type ='Radio' Name ='remarks' value= '2'>2
                             <Input type ='Radio' Name ='remarks' value= '1'>1
               <hr> </ul></div>
		   <div class='col-lg-4 col-md-4 col-sm-4'>
			    <h4><b></b></h4>
			  </div>
			</div>
		   <div class='row margtop' >
		   
		   <div class='col-lg-4 col-md-4 col-sm-4'>
		      <h4><b></b></h4>
		  </div>
		   <div class='col-lg-4 col-md-4 col-sm-4'>
			  
		   </div>
		   </div>
		    <div class='row'>
			<div class='col-lg-4 col-md-4 col-sm-4'></div>
			<div class='col-lg-4 col-md-4 col-sm-4'></div>
			<div class='col-lg-4 col-md-4 col-sm-4'></div>
			
		      <!--<button class='btn btn-primary btn-md' data-toggle='modal' data-target='#myModal'><span class='glyphicon glyphicon-user'></span> Update Account</button>
		     </div>
             </div>			 
		  </div>
		</div>-->
		
<div class="form-group">
	          <div class="col-sm-offset-2 col-sm-10">
			     <input type="submit" name="button1" class="btn btn-primary" value="Submit" onclick="javascript: form.action='sus.php';" />
			                                             <span><b>Thank you!<b></span>
				 
				 <div><a href="index.php" role="button" class="btn btn-danger right">Back</a></div>
	          </div> 
	</div>
</body>
<script src="js/bootstrap.js" type="text/javascript" ></script>
</html>