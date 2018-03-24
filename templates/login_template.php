<form class="form-horizontal" id="login-form" method="post" action="login.php">
	<div class="col-lg-offset-3 col-lg-6">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3>Login</h3>
			</div>
			<div class="panel-body">
				<div class="form-group">
					<label for="username" class="control-label col-lg-4">
						Username:
					</label>
					<div class="col-lg-8">
						<input type="text" id="username" class="form-control" name="username" />
					</div>
				</div>
				
				<div class="form-group">
					<label for="password" class="control-label col-lg-4" >
						Password:
					</label>
					<div class="col-lg-8">
						<input type="password" id="password" class="form-control" name="password" />
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-lg-offset-2 col-lg-8">
						<input type="button" class="btn btn-success" value="Login" style="width:100%;" id="loginBtn" onclick="checkForm();" />
					</div>
				</div>
				
				<div class="col-lg-offset-2 col-lg-8">
					<a href="register.php">Not already a member? Register!</a>
				</div>
			</div>
		</div>
	</div>
</form>

<script>
	function checkForm(){
		var username= document.getElementById("username").value;
		var password = document.getElementById("password").value;
		db.query(function(doc, emit) {
			if (doc.type === "user") {
				if(doc.username === username && doc.password== password){
					emit(doc);
				}
			}
		    }).then(function (result) {
			if(result.rows.length == 0){
				alert("Invalid username or password");
			} else{
				document.getElementById("login-form").submit();
			}
		    }).catch(function (err) {
			console.log(err);
		    });
	}
</script>