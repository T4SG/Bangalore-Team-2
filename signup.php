<!DOCTYPE html>
<html lang="en">
    <head>
      <title>Login</title>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
      <link href="css/bootstrap.css" type="text/css" rel="stylesheet" />
      <link href="css/custom.css" type="text/css" rel="stylesheet" />
	  <script type="text/javascript">
	     function checkUSN(usn){
		     var flag = usn.search(/^[0-9][A-Z]{2}[0-9]{2}[A-Z]{2}[0-9]{3}$/);
			if(flag != 0){
			     alert("Wrong USN format !!\n Enter in this format :1BMXXCSXX ,where X is number");
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
<legend class="fancy"><span class="glyphicon glyphicon-user"></span> New Account</legend>
	<div class="form-group">
		<label for="exampleInputText" class="col-sm-2 control-label">UserName</label>
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
	<div class="form-group">
		<label for="exampleInputPassword1" class="col-sm-2 control-label">Re-Enter Password</label>
		<div class="col-sm-10">
		<input class="form-control" type="password" name="passwd" id="passwd1" required="required" placeholder="Re-Enter Password" onchange="confirmPass(this.value)" />
	    </div>
	</div>
	<div class="form-group">
		<label for="exampleInputText" class="col-sm-2 control-label">PHONENO</label>
		<div class="col-sm-10">
		<input type="phno" class="form-control text-left" name="phno" id="phno" placeholder="Enter Phone" required="required"  />
	    </div>
	</div>
	<div class="form-group">
		<label for="exampleInputText" class="col-sm-2 control-label">GENDER</label>
		<div class="col-sm-3">
		<select name="gender" class="form-control">
		   <option value="f">FEMALE</option>
		   <option value="m">MALE</option>
		   	    
		</select>
		</div>
	</div>
	<div class="form-group">
		<label for="exampleInputText" class="col-sm-2 control-label">LANGUAGES</label>
		<div class="col-sm-3">
		<form action="#" method="post">
			<input type="checkbox" name="check_list[]" value="HINDI"><label> HINDI</label><br/>
			<input type="checkbox" name="check_list[]" value="ENGLISH"><label> ENGLISH</label><br/>
			<input type="checkbox" name="check_list[]" value="KANNADA"><label> KANNADA</label><br/>
			
		</form>
		</div>
	</div>
	<div class="form-group">
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
	</div>
	
	
	
    <div class="form-group">
	          <div class="col-sm-offset-2 col-sm-10">
			     <input type="submit" name="button1" class="btn btn-primary" value="Submit" />
			     <a href="index.php" role="button" class="btn btn-danger right">Back</a>
	          </div>
	</div>
</fieldset>
</form>
</div>
</body>
</html>