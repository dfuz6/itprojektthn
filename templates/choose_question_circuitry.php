

<div class="text-center">
  <div class="row content">
    <?php renderSideMenu('side_menu_left.php'); ?>
    <div class="col-sm-8 text-center" style="margin-top: 40px;">
	
					<h2 class="text-center">Schaltungen</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla non odio dolor. Pellentesque cursus felis nec velit maximus sodales. Fusce ullamcorper rutrum tortor, a vestibulum risus consequat quis. Nulla vestibulum leo eu eros vulputate dignissim. Suspendisse laoreet sit amet dui eu consequat. Donec ut laoreet risus. Maecenas sagittis feugiat purus, a tristique nulla sollicitudin nec. Vestibulum diam neque, pellentesque in leo id, dapibus pretium nunc. Pellentesque quis auctor dolor.</
						<br><br><br>
							<strong>Wähle eins der folgenden Aufgaben zur Bearbeitung:</strong>
      <br>
      <br>
      <div class="table-responsive">
		<table class="table table-bordered">
			<thead>
				<th style="text-align:center">
					#
				</th>
				<th style="text-align:center">
					Aufgaben
				</th>
		
				<th style="text-align:center">
					Schwierigkeitsgrad
				</th>
				<th style="text-align:center">
					Aktionen
				</th>
			</thead>
			<tbody id="circuityQuestionTable">
				
			</tbody>
		</table>
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
	callQuestions();
	var questionNumber = 1;
	function toggleHint(){
		var hint = document.getElementById("hint");
		if (hint.style.display === "none") {
			hint.style.display = "block";
		} else {
			hint.style.display = "none";
		}
	}
	
	function callQuestions(){
		db.createIndex({
			index: {fields: ['category']}
			}).then(function(){
			db.find({
			selector: {category: 'Schaltungen', type:'question'},
			fields: ['_id', 'question', 'difficulty']
		    }).then(function (result) {
			var questionList = result.docs;
			var table = document.getElementById("circuityQuestionTable");
			for(var i = 0; i < questionList.length; i++){
				var rows = document.createElement("tr");
				var number = document.createElement("td");
				number.innerHTML = questionNumber;
				questionNumber++;
				var question = document.createElement("td");
				question.innerHTML = questionList[i].question;
				
				var difficulty = document.createElement("td");
				difficulty.innerHTML = questionList[i].difficulty;
				var actionCol = document.createElement("td");
				console.log("ID:" + questionList[i]._id);
				actionCol.innerHTML = '<a href="?module=circuitry&id='+questionList[i]._id+'" class="btn btn-info">Go!</a>';
				rows.appendChild(number);
				rows.appendChild(question);
				rows.appendChild(difficulty);
				rows.appendChild(actionCol);
				table.appendChild(rows);
			}
			
		    }).catch(function (err) {
			console.log(err);
		    });
	});
	}
	
</script>

