
<div class="">
  <div class="row content">
    <?php renderSideMenu('side_menu_left.php'); ?>
    <div class="col-sm-8 text-center" style="margin-top: 40px;">
	<div class="">
		<div class="form-group">
			<label class="control-label">
				Frage: 
			</label>
			
			
					<textarea class="form-control" id="questionInput"></textarea>
		<br>
						<button class="btn btn-default" onclick="addChoice();"><span class="glyphicon glyphicon-paste"></span> Option zufügen</button>
						<button class="btn btn-default" onclick="openEditor('questionInput');"><span class="glyphicon glyphicon-pencil"></span> HTML Editor</button>

		
				
		</div>
		
		<div class="form-group">
			<label class="ccontrol-label">
				Kategorie:
			</label>
			
				<select class="form-control" id="category">
				<option value="Zahlensysteme">Zahlensysteme</option>
				<option value="Schaltungen">Schaltungen</option>
				<option value="Assembler">Assembler</option>
			</select>
		</div>
		
		<div class="form-group">
			<label class=" control-label">
				Schwierigkeitsgrad:
			</label>
			
				<select class="form-control" id="difficulty">
				<option value="niedrig">Niedrig</option>
				<option value="mitte">Mitte</option>
				<option value="hoch">Hoch</option>
			</select>
			
		</div>
	
			<div id="choices">
				
			</div>
			<br><br><br>
			<button class="btn btn-info" onclick="submitQuestion();" style="width: 80%;">Aufgabe abgeben</button>
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

<div id="editorModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
	  <h2><span class="glyphicon glyphicon-pencil"></span> HTML Editor</h2>
	  <p>Du kannst Texte mit HTML-Format eingeben.</p>
      </div>
      <div class="modal-body" id="editor">
        <textarea id="fullEditor"></textarea>
      </div>
	<div class="modal-footer">
	<button type="button" class="btn btn-primary" id="save">Speichern</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Schließen</button>
      </div>
    </div>

  </div>
</div>

<script>
	var choiceNumer = 1;
	function addChoice(){
		var choices = document.getElementById("choices");
		
		
		var newChoice = `<div class="form-group" id="choice_` + choiceNumer + `">
			<label class="control-label ">Option: </label>

			<textarea rows="5" cols="50"  id="choiceText_` + choiceNumer + `" class="choiceInput form-control"></textarea>
	
			<div class="form-check">
				<input type="checkbox" class="choiceCheckbox form-check-input position-static" value="newsletter">
				<label class="form-check-label">Richtige Lösung?</label>
			</div>
			<button class="btn btn-default" onclick="removeChoice('choice_` + choiceNumer + `')"><span class="glyphicon glyphicon-trash"></span> Löschen</button>
			<button class="btn btn-default" onclick="openEditor('choiceText_` + choiceNumer + `')"><span class="glyphicon glyphicon-pencil"></span> HTML Editor</button>
		</div>
		
		`;
		var text = document.createElement('div');
		text.innerHTML = newChoice;
		choices.appendChild(text);
		choiceNumer ++;
	}
	
	function removeChoice(choiceID){
		 var elem = document.getElementById(choiceID);
		elem.parentElement.removeChild(elem);
	}
	
	function openEditor(choiceTextID){
		var content = document.getElementById(choiceTextID).value;
		var editor = document.getElementById('editor');
		editor.innerHTML = '<textarea id="fullEditor"></textarea><input id="choiceValue" type="hidden" value="'+ choiceTextID +'">' ;
		var fullEditor = document.getElementById('fullEditor');
		fullEditor.value = content;
		var sceditor_editor =$('#fullEditor').sceditor({
			plugins: "bbcode",
			style: "css/style.less",
			width: "100%",
			toolbar:"bold,italic,underline,strike,subscript,superscript|left,center,right,justify|size,color,removeformat|bulletlist,orderedlist,horizontalrule,table",
			locale:"de" ,
			resizeEnabled:false
		  });
		 document.getElementById("save").onclick = function() { 
			var fullEditorValue =  $('#fullEditor').sceditor('instance').val();
			document.getElementById(choiceTextID).value =fullEditorValue;
			 $('#editorModal').modal('hide');
		  };
		
		$('#editorModal').modal('show');
		
	}
	
	
	function submitQuestion(){
		var correctOption = [];
    var allOption = [];
		var choiceInputs = document.getElementsByClassName('choiceInput');
		var choiceCheckbox = document.getElementsByClassName('choiceCheckbox');

		if (choiceInputs.length == 0){
			alert('Optionen müssen eingegeben werden.');
			return;
		}
		
		if (choiceInputs.length == 1){
			alert('Mindesten 2 Optionen müssen eingegeben werden.');
			return;
		}
		for(var i = 0; i < choiceInputs.length; i++){
			if(choiceInputs.item(i).value == ""){
				alert("Leere Optionen.");
				return;
			}
      allOption.push(choiceInputs.item(i).value);
      if(choiceCheckbox.item(i).checked){
				correctOption.push(choiceInputs.item(i).value);
			}
		}
		
		if(correctOption.length == 0){
			alert("Aufgabe hat keine Lösung!");
			return;
		}
    
    var question ={
      type: "question",
      question: document.getElementById('questionInput').value,
      category: document.getElementById('category').value,
      difficulty: document.getElementById('difficulty').value,
      options: allOption,
      correctOption: correctOption
	};
  
  console.log(question);
		
   db.post(question).then(function(response){
      console.log(response);
      alert("Aufgabe zugefügt");
		}).catch(function (err) {
        console.log(err);
	    });
		
	}
	
</script>