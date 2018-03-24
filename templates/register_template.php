<div class = "col-lg-offset-2 col-lg-8">
	<div class="panel panel-primary">
	<div class="panel-heading text-center">
		<h2>Register</h2>
	</div>
	<div class="panel-body">
		<div class="">
		<form class="form-horizontal" id= "userForm" method="post" action="register.php">
			<div class="form-group" style="margin-top: 10px;">
				<label class="control-label col-lg-2" for="usernameInput">Username:</label>
				<div class="col-lg-10">
					<input type="text" class="form-control " id="usernameInput" name="usernameInput" required/>
				</div>
			</div>
			
			<div class="form-group" style="margin-top: 10px;">
				<label class="control-label col-lg-2" for="passwordInput">Password:</label>
				<div class="col-lg-10">
					<input type="password" onkeyup="checkIfPasswordMatch();" class="form-control" id = "passwordInput" name = "passwordInput" required/>
				</div>
			</div>
			
			<div class="form-group" style="margin-top: 10px;">
				<label class="control-label col-lg-2" for="confirmationInput">Confirm Password:</label>
				<div class="col-lg-10">
					<input type="password" onkeyup="checkIfPasswordMatch();" class="form-control" id="confirmationInput" style="width:100%" required/>
					<p style="color:red; display:none;" id="confirmation_alert"></p>
				</div>
			</div>
			
			<div class="form-group" style="margin-top: 10px;">
				<label class="control-label col-lg-2" for="emailInput">Email:</label>
				<div class="col-lg-10">
					<input type="text" class="form-control" id="emailInput" />
				</div>
			</div>
		<div class="text-center">
			<input type="button" class="btn btn-success" value="Submit" style="width:100%;" id="registerSubmit" onclick="submitForm();" />
		</div>
		</form>
		</div>
</div>

</div>

</div>
<script>

	
function checkIfPasswordMatch(){
	var password = document.getElementById("passwordInput").value;
	var confirmation_password = document.getElementById("confirmationInput").value;
	if(confirmation_password!=password && confirmation_password!=''){
		document.getElementById("confirmation_alert").innerHTML = "Passwords do not match";
		document.getElementById("confirmation_alert").style.display="inline-block";
		document.getElementById("registerSubmit").disabled = true;
	}else{
		document.getElementById("confirmation_alert").innerHTML = "";
		document.getElementById("confirmation_alert").style.display="none";
		document.getElementById("registerSubmit").disabled = false;
	}
}
function submitForm(){
	var _username = document.getElementById("usernameInput").value;
	var _password = document.getElementById("passwordInput").value;
	var confirmation_password = document.getElementById("confirmationInput").value;
	var _email = document.getElementById("emailInput").value;
	if(_username == '' || _password == '' || _email == ''){
		alert("Please enter all fields");
		return;
	}
	var user ={
		type: "user",
		username: _username,
		password:_password,
		email:_email
	};
	console.log(user);
		

	db.post(user).then(function(response){
		console.log(response);
		document.getElementById("userForm").submit();
		}).catch(function (err) {
		console.log(err);
	    });
}
</script>