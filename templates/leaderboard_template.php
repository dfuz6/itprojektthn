<div id="bsLoadable">
    <div class="table-responsive">
        <table class="table table-striped" style="text-align:center;">
            <thead>
              <tr>
                <th  style="text-align:center">User</th>
                <th style="text-align:center">Score</th>
        
              </tr>
            </thead>
            <tbody id="userTable">
            </tbody>
        </table>
    </div>
</div>
<script>
	refreshView();
	
	function refreshView(){
		var table = document.getElementById("userTable");
		table.innerHTML='loading...';
		db.createIndex({
			index: {fields: ['score']}
			}).then(function(){db.find({
				selector: {$and: [
				{ type: 'user' },
				{ username: { $gt: null } },
				{ score: { $gt: null } }
			    ]},
				fields:['score','username', 'email'],
				sort:[{'score': 'desc'}]
			    }).then(function (result) {
			console.log(result);
			table.innerHTML='';
			for(var i = 0; i < result.docs.length; i++){
				let user = result.docs[i];
				console.log(user);
				var rows = document.createElement("tr");
				var username = document.createElement("td");
				username.innerHTML = '<a href="user.php?username='+user.username+'">' + user.username + "</a>";				
				var score = document.createElement("td");
				score.innerHTML = user.score;
				rows.appendChild(username);
				rows.appendChild(score);
				table.appendChild(rows);
				//table.innerHTML += "<tr>"+ "<td>" + user.username + "</td>"+ "<td>"+ user.email + "</td>"+"<td>"+"<span class='glyphicon glyphicon-trash';'></span>"+"</td>"+"</tr>";
			}
		    }).catch(function (err) {
			console.log(err);
		    });
		});
	}
</script>