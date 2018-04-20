

<div class="text-center">
  <div class="row content">
    <?php renderSideMenu('side_menu_left.php'); ?>
    <div class="col-sm-8 text-center" style="margin-top: 40px;">
   
					<h2 class="text-center">Zahlensysteme</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla non odio dolor. Pellentesque cursus felis nec velit maximus sodales. Fusce ullamcorper rutrum tortor, a vestibulum risus consequat quis. Nulla vestibulum leo eu eros vulputate dignissim. Suspendisse laoreet sit amet dui eu consequat. Donec ut laoreet risus. Maecenas sagittis feugiat purus, a tristique nulla sollicitudin nec. Vestibulum diam neque, pellentesque in leo id, dapibus pretium nunc. Pellentesque quis auctor dolor.</
						<br><br><br>

            <strong>Wähle eins der folgenden Module zur Bearbeitung:</strong>
      <br>
      <br>
      <div class="row">
        <div class="col-lg-3">
          <a href="?module=numbersystem&questiontype=1">
            <figure>
              <img class="gameImage" src="images/binary.jpg" width="200" height="200">
              <figcaption>Bin Konvertierung</figcaption>
            </figure>
            </a>
        </div>
        <div class="col-lg-3">
          <a href="?module=numbersystem&questiontype=2">
            <figure>
              <img class="gameImage" src="images/hex.jpg"  width="200" height="200">
              <figcaption>Hex Konvertierung</figcaption>
            </figure>
            </a>
        </div>
        <div class="col-lg-3">
          <a href="?module=numbersystem&questiontype=3">
            <figure>
              <img  class="gameImage" src="images/real.png" width="200" height="200">
              <figcaption>Reelle Zahlen</figcaption>
            </figure>
            </a>
        </div>
        <div class="col-lg-3">
          <a href="?module=numbersystem&smodule=question">
            <figure>
              <img  class="gameImage" src="images/number_theory.jpg" width="200" height="200">
              <figcaption>Theoritische Fragen</figcaption>
            </figure>
            </a>
        </div>
      </div>


				</div>
	
    <div class="col-sm-2 sidenav">
      <div class="panel panel-info">
          <div class="panel-body">
            <button type="button" class="btn btn-info" onclick="toggleHint();"><span class="glyphicon glyphicon-info-sign"></span> Hinweis</button>
          </div>
        </div>
  
        <div class="panel panel-info">
      <div class="panel-heading">
        <span class="panel-title">Bestenliste</span>
      </div>
      <div class="panel-body">
        <?php require('leaderboard_template.php'); ?>
      </div>
      </div>
        
      <div class="well" id="hint" style="display:none;">
		<p style="font-size: 12px;">Wähle ein Modul</p>
	  </div>
    </div>
  </div>
</div>

<script>
	function toggleHint(){
		var hint = document.getElementById("hint");
		if (hint.style.display === "none") {
			hint.style.display = "block";
		} else {
			hint.style.display = "none";
		}
	}
</script>

