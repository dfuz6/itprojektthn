<style>
  body {
  font: 12px Montserrat, sans-serif;
      line-height: 1.5;
      color: #2E2E2E;}
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
     p {font-size: 16px;}
  .margin {margin-bottom: 16px;}
  .bg-1 { 
      background-color: #E4F0F3; /* Blue */
      color: #2E2E2E;
      
  }
  
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 515px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 40px;
      background-color: #f1f1f1;
      height: 160%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
  </style>


<div class="container-fluid bg-1 text-center">
  <div class="row content">
    <div class="col-sm-2 sidenav">
    <h3> Aufgaben zu:</h3>
      <p><a href="#">Zahlensysteme</a></p>
      <p><a href="#">Schaltungen</a></p>
      <p><a href="#">Assembler</a></p>	  
    </div>
    <div class="col-sm-8 text-center" style="padding-top: 50px;">
			Please choose one of the following modules
			
			<p><a href="?questiontype=1">Bin Konvertierung</a></p>
			<p><a href="?questiontype=2">Hex Konvertierung</a></p>
			<p><a href="?questiontype=3">Reele Zahlen</a></p>

		</div>
    <div class="col-sm-2 sidenav">
      <div class="well">
        <button type="button" class="btn" onclick="toggleHint();">Hinweis</button>
      </div>
      <div class="well" id="hint" style="display:none;">
		<p style="font-size: 12px;">Choose a module to work on</p>
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

