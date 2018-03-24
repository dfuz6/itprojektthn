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
      background-color: #E4F0F3; 
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

<form class="form-horizontal">
	<div class="container-fluid bg-1">
  <div class="row content">
    <div class="col-sm-2 sidenav text-center">
    <h3> Aufgaben zu:</h3>
      <p><a href="#">Zahlensysteme</a></p>
      <p><a href="#">Schaltungen</a></p>
      <p><a href="#">Assembler</a></p>	  
    </div>
    <div class="col-sm-8" style="padding-top: 50px;"> 
<?php if ($questiontype==1): ?>
		<div class="col-lg-12 text-center">
			Convert the following decimal number to binary number:
		</div>
		<?php endif;?>
		<?php if($questiontype==2): ?>
		<div class="col-lg-12 text-center">
			Convert the following dec number to hex number:
		</div>
		<?php endif;?>
		<?php if($questiontype==3): ?>
		<?php endif;?>

		<div class="form-group">
			<label class="control-label col-lg-2 for="decNumber">Decimal:</label>
			<div class="col-lg-10">
			  <p class="form-control-static" id="decNumber"></p>
			</div>
		</div>
		<?php if($questiontype==1): ?>
		<div class="form-group">
			<label class="control-label col-lg-2 for="biNumber">Binary:</label>
			<div class="col-lg-10">
			  <input type = "text" class="form-control" id="biNumberInput" onkeypress="validateInput(event);"/>
			</div>
		</div>
		<?php endif; ?>
		<?php if($questiontype==2): ?>
		<div class="form-group">
			<label class="control-label col-lg-2 for="hexNumber">Hex:</label>
			<div class="col-lg-10">
			  <input type = "text" class="form-control" id="hexNumberInput" onkeypress="validateHexInput(event);"/>
			</div>
		</div>
		<?php endif;?>
		<?php if($questiontype==1): ?>

		<div class="col-lg-12 text-center" style="margin-top: 15px;">
			<input type="button" class="btn btn-primary" value ="Submit Answer" style="width:60%;" onclick="submitAnswer();"/>
		</div>
		<div class="col-lg-12 text-center" style="color:green; display:none;" id="correct-answer">
			<span>Gut gemacht!</span>
		</div>
		<div class="col-lg-12 text-center" style="color:red; display:none;" id="wrong-answer">
			<span >Falshe Antwort. Richtige Antwort war  </span> <span id="decNumberAnswer"></span>
		</div>
		<?php endif; ?>
		<?php if($questiontype==2): ?>
		<div class="col-lg-12 text-center" style="margin-top: 15px;">
			<input type="button" class="btn btn-primary" value ="Submit Answer" style="width:60%;" onclick="submitHexAnswer();"/>
		</div>
		<div class="col-lg-12 text-center" style="color:green; display:none;" id="hex-correct-answer">
			<span>Gut gemacht!</span>
		</div>
		<div class="col-lg-12 text-center" style="color:red; display:none;" id="hex-wrong-answer">
			<span >Falshe Antwort. Richtige Antwort war  </span> <span id="hexNumberAnswer"></span>
		</div>
		<?php endif;?>
		<div class="col-lg-12 text-center reload" style="display:none;" id="reload">
			<a href="javascript:reload();"><span>Get new question.</span></a>
		</div>

  </div>
    <div class="col-sm-2 sidenav">
      <div class="well">
        <button type="button" class="btn" onclick="toggleHint();">Hinweis</button>
      </div>
	  <div class="well" id="hint" style="display:none;">
		<p style="font-size: 12px;">Questions are generated automatically. Do your best!</p>
	  </div>
    </div>
  </div>
</div>

</form>

<script>
	var decNumber = Math.floor(Math.random() * 1001);
	document.getElementById("decNumber").innerHTML = "<strong>"+decNumber.toString()+"</strong>";
	function dec2Bin(dec){
		if(dec >= 0) {
		    return dec.toString(2);
		}
		else {
		    return (~dec).toString(2);
		}
	}
	
	function dec2Hex(number)
	{
		return number.toString(16);
	}
	
	function validateInput(event){
		var char = String.fromCharCode(event.keyCode);
		if(char=="0" || char=="1"){
			
		}
		else{
			event.returnValue = false;
			 if(event.preventDefault) event.preventDefault();
		}
	}
	
	function validateHexInput(event){
		var char = String.fromCharCode(event.keyCode);
		if((char.charCodeAt() >= 48 && char.charCodeAt() <=57) || (char.charCodeAt() >= 65 && char.charCodeAt() <=70) || (char.charCodeAt() >= 97 && char.charCodeAt() <=102)){
			
		}
		else{
			event.returnValue = false;
			 if(event.preventDefault) event.preventDefault();
		}
	}
	
	function submitAnswer(){
		var binary = dec2Bin(decNumber);
		var binInput = document.getElementById("biNumberInput").value;
		document.getElementById("biNumberInput").readOnly=true;
		document.getElementById("reload").style.display="block";
		if(binInput == binary.toString()){
			document.getElementById("correct-answer").style.display="block";
		}else{
			document.getElementById("wrong-answer").style.display="block";
			document.getElementById("decNumberAnswer").innerHTML="<strong>" + binary.toString() + "</strong>";
		}
	}
	
	function submitHexAnswer(){
		var hex = dec2Hex(decNumber);
		var hexInput = document.getElementById("hexNumberInput").value;
		hexInput = hexInput.toLowerCase();
		document.getElementById("hexNumberInput").readOnly=true;
		document.getElementById("reload").style.display="block";
		if(hexInput == hex.toString()){
			document.getElementById("hex-correct-answer").style.display="block";
		}else{
			document.getElementById("hex-wrong-answer").style.display="block";
			document.getElementById("hexNumberAnswer").innerHTML="<strong>" + hex.toString() + "</strong>";
		}
	}
	
	function reload(){
		location.reload(true);
	}
	
	function toggleHint(){
		var hint = document.getElementById("hint");
		if (hint.style.display === "none") {
			hint.style.display = "block";
		} else {
			hint.style.display = "none";
		}
	}
	
	
</script>