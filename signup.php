<!DOCTYPE html>
<html lang="en">
    <head>
      <title>Feedback</title>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
      <link href="css/bootstrap.css" type="text/css" rel="stylesheet" />
      <link href="css/custom.css" type="text/css" rel="stylesheet" />
	  <script type="text/javascript">
	     function checkUSN(usn){
		     var flag = usn.search(/^[0-9]$/);
			if(flag != 0){
			     alert("please enter correct id");
				document.getElementById("usn").select();
				document.getElementById("usn").focus();
				}
		 }
		 function checkName(name){
		    var flag = name.search(/^[a-zA-Z][a-zA-Z\. ]*$/);
			if(flag != 0){
		        alert("Wrong Name format !!");
				document.getElementById("name").select();
				document.getElementById("name").focus();
		    }
		 }
		 function checkPass(pass){
		    var flag = pass.search(/^[a-zA-Z0-9]{5}$/);
			if(flag != 0){
			   alert("Password should contain min. 5 characters !!");
				document.getElementById("passwd").select();
				document.getElementById("passwd").focus();
			}
		 }
		 function confirmPass(pass){
		  var passO = document.getElementById("passwd").value;
		  if(pass != passO){
		    alert("Password mismatch !!");
	        document.getElementById("passwd1").select();
			document.getElementById("passwd1").focus();
		 }
		 }
	  
	  </script>
	 </head>
<body>
<div class="container">
<form action="create.php" method="post" role="form" class="form-horizontal margin">
<fieldset class="margin">
<legend class="fancy"><span class="glyphicon glyphicon-user"></span>Feedback Form</legend>
	<div class="form-group">
		<label for="exampleInputText" class="col-sm-2 control-label">ID</label>
		<div class="col-sm-10">
		<input type="text" class="form-control" name="usn" id="usn" placeholder="Enter UserName" required="required" onchange="checkUSN(this.value)" />
	    </div>
	</div>
	<div class="form-group">
		<label for="exampleInputText" class="col-sm-2 control-label">Password</label>
		<div class="col-sm-10">
		<input type="password" class="form-control text-left" name="pswd" id="pswd" placeholder="Enter Password" required="required" onchange="checkName(this.value)" />
	    </div>
	</div>
	<br/>
		<div class="form-group">
		Comments:<textarea name="comments" rows="5" cols="40"></textarea>
		</div>
	
	<!--<div class="form-group">
		<label for="exampleInputText" class="col-sm-2 control-label">Email</label>
		<div class="col-sm-10">
		<input type="text" class="form-control text-left" name="email" id="email" placeholder="Enter Email" required="required"/>
	    </div>
	</div>
	
	<div class="form-group">
		<label for="exampleInputText" class="col-sm-2 control-label">STRENGTHS</label>
		<div class="col-sm-6">
		<form action="#" method="post">
			<input type="checkbox" name="check_list[]" value="SCIENCE"><label> SCIENCE</label><br/>
			<input type="checkbox" name="check_list[]" value="MATHS"><label> MATHS</label><br/>
			<input type="checkbox" name="check_list[]" value="CS"><label> COMPUTERS</label><br/>
			<input type="checkbox" name="check_list[]" value="WR"><label> WRITING</label><br/>
			<input type="checkbox" name="check_list[]" value="COM"><label> COMMUNICATION</label><br/>
			
		</form>
		</div>
	</div> -->
	
	
	
    <div class="form-group">
	          <div class="col-sm-offset-2 col-sm-10">
			     <input type="submit" name="button1" class="btn btn-primary" value="Submit" onclick="javascript: form.action='success.php';" />
			     <a href="index.php" role="button" class="btn btn-danger right">Back</a>
	          </div> 
	</div>
</fieldset>
</form>
</div>
</body>
</html>