<form class="form-horizontal" id="login-form" method="post" action="login.php">
	<div class="text-center">
        <div class="row content">
          <?php renderSideMenu('side_menu_left.php'); ?>
          <div class="col-sm-8" style="margin-top:40px;">
			
					<h2 class="text-center">Grundlagen der Informatik</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla non odio dolor. Pellentesque cursus felis nec velit maximus sodales. Fusce ullamcorper rutrum tortor, a vestibulum risus consequat quis. Nulla vestibulum leo eu eros vulputate dignissim. Suspendisse laoreet sit amet dui eu consequat. Donec ut laoreet risus. Maecenas sagittis feugiat purus, a tristique nulla sollicitudin nec. Vestibulum diam neque, pellentesque in leo id, dapibus pretium nunc. Pellentesque quis auctor dolor.</
						<br>
					<p>Curabitur commodo nisi risus, sit amet convallis risus feugiat in. Nullam facilisis nibh arcu, quis condimentum magna fermentum a. Pellentesque posuere dignissim odio, sit amet accumsan nisi pulvinar eu. Nam faucibus libero fringilla nisl sagittis, non placerat felis vulputate. Nunc ultricies diam nec dictum malesuada. Integer vitae pellentesque dolor, id bibendum diam. Maecenas ac ornare risus. Pellentesque metus lacus, convallis at ipsum sit amet, consequat iaculis lacus.</p>
					<button type="button" class="btn btn-info btn-lg" id="myBtn"><span class="glyphicon glyphicon-user"></span> Login</button>




		 <a href="register.php" class="btn btn-info btn-lg" id="register"><span class="glyphicon glyphicon-book"></span> Register</a>
			
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
        
      
        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog">
          
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header" style="padding:35px 50px;">
                <button type="button" style= "color: black;" class="close" data-dismiss="modal">&times;</button>
                <h4><span class="glyphicon glyphicon-lock"></span> Anmelden</h4>
              </div>
              <div class="modal-body" style="padding:40px 50px;">
                <form role="form">
                  <div class="form-group">
                    <label for="usrname"><span class="glyphicon glyphicon-user"></span>  Benutzername / E-Mail</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
                  </div>
                  <div class="form-group">
                    <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Passwort</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                  </div>
                  <div class="checkbox">
                    <label><input type="checkbox" value="" checked>An diesem Computer angemeldet bleiben?</label>
                  </div>
                    <button type="button" onclick="checkForm();" class="btn btn-info btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
                </form>
              </div>
              <div class="modal-footer">
                <button type="" class="btn btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <p>Noch nicht registriert? <a href="register.php"><font color="">Anmelden</font></a></p>
                <p><a href="#"><font color="">Passwort vergessen?</font></a></p>
              </div>
            </div>
            
          </div>
        </div> 
        </div>
    <div class="col-sm-2 sidenav">
      <div class="panel panel-info">
		<div class="panel-heading">
			<span class="panel-title">Bestenliste</span>
		</div>
		<div class="panel-body">
			<?php require('leaderboard_template.php'); ?>
		</div>
	  </div>
    </div>
	   </div>
	</div>
</form>

<script>
	//$("#blBody").load("leaderboard.php #bsLoadable");
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