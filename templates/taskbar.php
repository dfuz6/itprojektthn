<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">GDI Vorbereitungsquiz</a>
    </div>
    <ul class="nav navbar-nav">
      <?php if(isset($_SESSION["username"])): ?>
      <li><a href="alluser.php">Benutzerübersicht</a></li>
           <?php endif; ?>
      <li><a href="leaderboard.php">Bestenliste</a></li>
       <?php if(isset($_SESSION["username"])): ?>
      <li><a href="createquiz.php">Aufgaben erstellen</a></li>
          <?php endif; ?>
    </ul>
      <?php if(isset($_SESSION["username"])): ?>
	<ul class="nav navbar-nav navbar-right">
		  <li><a href = "user.php?username=<?= $_SESSION["username"]; ?>">Hallo, <?= $_SESSION["username"]; ?></a></li>
		  <li><a href = "logout.php"><span class = "glyphicon glyphicon-log-out"></span></a></li>
	  </ul>
    	<?php endif; ?>

  </div>
</nav>
      