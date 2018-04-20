

<div class="text-center">
  <div class="row content">
    <?php renderSideMenu('side_menu_left.php'); ?>
    <div class="col-sm-8 text-center" style="margin-top: 40px;">
	<div class="alert alert-success" id="success" style="display:none;"></div>
	<div class="alert alert-danger" id="fail"  style="display:none;"></div>
				
					<h3 class="text-center" id="questionText"></h3>
					
     
     <p><strong>Kategorie: </strong><span id="questionCategory"></span></p>
     <p><strong>Schwierigkeitsgrad: </strong><span id="questionDifficulty"></span></p>
     <div id="questionOptions">
	
     </div>
     <br>
     <button class="btn btn-info" id="submitButton" onclick="submitAnswer();">Abgeben</button>
       <br><br><br><br>
    
		<div class="text-left">
			<?php if($category=="Schaltungen"): ?>
				<a href="index.php?module=circuitry">&leftarrow; Zurück</a>
			<?php endif; ?>
			
			<?php if($category=="Assembler"): ?>
				<a href="index.php?module=assembler">&leftarrow; Zurück</a>
			<?php endif; ?>
			
			<?php if($category=="Zahlensysteme"): ?>
				<a href="index.php?module=numbersystem&smodule=question">&leftarrow; Zurück</a>
			<?php endif; ?>

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
	var correctOption = [];
	var optionInputs = [];
	loadQuestion();
	function toggleHint(){
		var hint = document.getElementById("hint");
		if (hint.style.display === "none") {
			hint.style.display = "block";
		} else {
			hint.style.display = "none";
		}
	}
	
	
	function loadQuestion(){
			db.get('<?= $id; ?>').then(function (doc) {
				console.log(doc);
				var options = document.getElementById("questionOptions");
				$("#questionText").html(doc.question);
				$("#questionCategory").html(doc.category);
				$("#questionDifficulty").html(doc.difficulty);
				
				for(var j = 0; j < doc.options.length; j++){
					var cbOption = '<input type="checkbox" class="options" value="' + doc.options[j] + '">';
					options.innerHTML += cbOption + " " + doc.options[j] + "<br><br>";
				}
				correctOption = doc.correctOption;
				
		}).catch(function (err) {
		  console.log(err);
		});
	}
	
	function submitAnswer(){
		console.log(correctOption);
		var options = document.getElementsByClassName('options');
		for(var i = 0; i < options.length; i++){
			if(options.item(i).checked){
				optionInputs.push(options.item(i).value);
			}
			options.item(i).disabled = true;
		}
		document.getElementById("submitButton").disabled = true;
		console.log(optionInputs);
		if(isSameSet(correctOption, optionInputs )){
			document.getElementById("success").style.display="block";
			document.getElementById("success").innerHTML = "Gut gemacht!";
		}
		else{
			document.getElementById("fail").style.display="block";
			document.getElementById("fail").innerHTML = "Leider falsch. <a href='javascript:location.reload(true)'>Versuch nochmal.</a>";
		}
	}
	
	var isSameSet = function( arr1, arr2 ) {
		return  $( arr1 ).not( arr2 ).length === 0 && $( arr2 ).not( arr1 ).length === 0;  
	};

	
</script>

