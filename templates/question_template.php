

<form class="form-horizontal">
	<div class="">
  <div class="row content">
    <?php renderSideMenu('side_menu_left.php'); ?>
    <div class="col-sm-8" style="padding-top: 50px;">
			<div class="alert alert-success" style="display:none;" id="correct-answer">
			<span>Gut gemacht!<a href="javascript:reload();"> Neue Frage.</a></span>
		</div>
		<div class="alert alert-danger" style="display:none;" id="hex-wrong-answer">
			<span>Leider falsch. Die richtige Antwort lautet:  </span> <span id="hexNumberAnswer"></span><a href="javascript:reload();">. Neue Frage.</a>
		</div>
		<div class="alert alert-danger" style="display:none;" id="wrong-answer">
			<span>Leider falsch. Die richtige Antwort lautet: </span> <span id="decNumberAnswer"></span><a href="javascript:reload();">. Neue Frage.</a>
		</div>
<?php if ($questiontype==1): ?>
		<div class="col-lg-12 text-center">
			Konvertiere die gegebene Dezimalzahl in eine Binärzahl:
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
			<label class="control-label col-lg-2 for="decNumber">Dezimal:</label>
			<div class="col-lg-10">
			  <p class="form-control-static" id="decNumber"></p>
			</div>
		</div>
		<?php if($questiontype==1): ?>
		<div class="form-group">
			<label class="control-label col-lg-2 for="biNumber">Binär:</label>
			<div class="col-lg-10">
			  <input type = "text" class="form-control" id="biNumberInput" onkeypress="validateInput(event);"/>
			</div>
		</div>
		<?php endif; ?>
		<?php if($questiontype==2): ?>
		<div class="form-group">
			<label class="control-label col-lg-2 for="hexNumber">Hexadezimal:</label>
			<div class="col-lg-10">
			  <input type = "text" class="form-control" id="hexNumberInput" onkeypress="validateHexInput(event);"/>
			</div>
		</div>
		<?php endif;?>
		<?php if($questiontype==1): ?>

		<div class="col-lg-12 text-center" style="margin-top: 15px;">
			<input type="button" class="btn btn-info" value ="Abgabe" style="width:60%;" onclick="submitAnswer();"/>
		</div>
		<div class="col-lg-12 text-center" style="color:green; display:none;" id="correct-answer">
			<span>Gut gemacht!</span>
		</div>
		<div class="col-lg-12 text-center" style="color:red; display:none;" id="wrong-answer">
			<span>Leider falsch. Die richtige Antwort lautet: </span> <span id="decNumberAnswer"></span>
		</div>
		<?php endif; ?>
		<?php if($questiontype==2): ?>
		<div class="col-lg-12 text-center" style="margin-top: 15px;">
			<input type="button" class="btn btn-info" value ="Abgabe" style="width:60%;" onclick="submitHexAnswer();"/>
		</div>
		
		<?php endif;?>
		<div class="col-lg-12 text-center reload" style="display:none;" id="reload">
			
		</div>

  </div>
    <div class="col-sm-2 sidenav text-center">
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
</div>

</form>

<script>
  console.log('<?= $username; ?>');
  submitPoint(1).then(function(result){
    console.log(result);
  });
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
		if(binInput == binary.toString()){
      submitPoint(1).then(function(result){
          db.put(result);
      });
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
		if(hexInput == hex.toString()){
       submitPoint(2).then(function(result){
          db.put(result);
      });
			document.getElementById("correct-answer").style.display="block";
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
  
  function submitPoint(score){
    return new Promise(function(resolve) {
        //Without new Promise, this throwing will throw an actual exception
      db.createIndex({
			index: {fields: ['username']}
			}).then(function(){
			db.find({
			selector: {username: '<?= $username; ?>', type:'user'},
			fields: ['_id', '_rev', 'username', 'email', 'password', 'score', 'type']
		    }).then(function (result) {
          console.log(result);
          if(result.docs[0].score == null){
            result.docs[0].score = 0;
          }
          result.docs[0].score+=score;
          resolve(result.docs[0]);
		    });
    });
    });
  }
	
	
</script>