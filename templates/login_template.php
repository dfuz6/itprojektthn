<form class="form-horizontal" id="login-form" method="post" action="login.php">
	<div class="container-fluid bg-1 text-center">
        <div class="row content">
          <div class="col-sm-2 sidenav">
          <h3> Aufgaben zu:</h3>
            <p><a href="#">Zahlensysteme</a></p>
            <p><a href="#">Schaltungen</a></p>
            <p><a href="#">Assembler</a></p>
          </div>
          <div class="col-sm-8">
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
        <!-- Trigger the modal with a button -->
        <button type="button"; class="btn btn-default btn-lg" id="myBtn">Login</button>
      
        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog">
          
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header" style="padding:35px 50px;">
                <button type="button" style= "color: black;" class="close" data-dismiss="modal">&times;</button>
                <h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
              </div>
              <div class="modal-body" style="padding:40px 50px;">
                <form role="form">
                  <div class="form-group">
                    <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username / E-Mail</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
                  </div>
                  <div class="form-group">
                    <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                  </div>
                  <div class="checkbox">
                    <label><input type="checkbox" value="" checked>Remember me?</label>
                  </div>
                    <button type="button" onclick="checkForm();" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
                </form>
              </div>
              <div class="modal-footer">
                <button type="" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <p>Not a member? <a href="register.php"><font color="#B40404">Registrieren</font></a></p>
                <p>Forgot <a href="#"><font color="#B40404">Password?</font></a></p>
              </div>
            </div>
            
          </div>
        </div> 
        </div>
    <div class="col-sm-2 sidenav">
      <div class="well">
        <p>Hinweis</p>
      </div>
      <div class="well">
        <p>L&oumlsung</p>
        </div>
       </div>
	   </div>
</form>

<script>
	function checkForm(){
		console.log("hey");
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
				console.log('result');
				document.getElementById("login-form").submit();
			}
		    }).catch(function (err) {
			console.log(err);
		    });
	}
	
	 $("#myBtn").click(function(){
        $("#myModal").modal();
    });
</script>