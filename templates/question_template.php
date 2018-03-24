<form class="form-horizontal">
<div class="panel panel-primary">
	<div class="panel-heading">
		<h3>Answer the question</h2>
	</div>
	
	<div class="panel-body">
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
	
	
</script>