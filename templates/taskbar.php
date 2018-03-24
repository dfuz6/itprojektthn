<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">GDI QUIZ</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="user.php">Users</a></li>
    </ul>
      <?php if(isset($_SESSION["username"])): ?>
	<ul class="nav navbar-nav navbar-right">
		  <li><a href = "#">Hello, <?= $_SESSION["username"]; ?></a></li>
		  <li><a href = "logout.php"><span class = "glyphicon glyphicon-log-out"></span></a></li>
	  </ul>
    	<?php endif; ?>

  </div>
</nav>
      