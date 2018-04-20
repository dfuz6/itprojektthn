<table class="table table-striped" style="text-align:center;">
    <thead>
      <tr>
        <th  style="text-align:center">Benutzername</th>
        <th style="text-align:center">Email</th>
        <th style="text-align:center">_id</th>
	  
	  <th style="text-align:center">Aktion</th>
      </tr>
    </thead>
    <tbody id="userTable">
    </tbody>
</table>
<script>
	refreshView();
	
	function refreshView(){
		var table = document.getElementById("userTable");
		table.innerHTML='loading...';
        db.createIndex({
			index: {fields: ['username']}
			}).then(function(){db.find({
				selector: { type: 'user' },
				fields:['_id','username', 'email']
			    }).then(function (result) {
			console.log(result);
			table.innerHTML='';
			for(var i = 0; i < result.docs.length; i++){
				let user = result.docs[i];
				console.log(user);
				var rows = document.createElement("tr");
				var username = document.createElement("td");
				username.innerHTML = '<a href="user.php?username=' + user.username + '">'+ user.username + '</a>';
				var email = document.createElement("td");
				email.innerHTML = user.email;
				
				var id = document.createElement("td");
				id.innerHTML = user._id;
				var actionCol = document.createElement("td");
				var action = document.createElement("span");
				action.onclick = function(){
					deletedoc(user);
				}
				action.className = "glyphicon glyphicon-trash";
				actionCol.appendChild(action);
				rows.appendChild(username);
				rows.appendChild(email);
				rows.appendChild(id);
				rows.appendChild(actionCol);
				table.appendChild(rows);
				//table.innerHTML += "<tr>"+ "<td>" + user.username + "</td>"+ "<td>"+ user.email + "</td>"+"<td>"+"<span class='glyphicon glyphicon-trash';'></span>"+"</td>"+"</tr>";
			}
		    }).catch(function (err) {
			console.log(err);
		    });
		});
        /*
		db.createIndex({
			index: {fields: ['type']}
			}).then(function(){db.find({
				selector: {$and: [
				{ type: 'user' },
				{ username: { $gt: null } }
			    ]},
				fields:['_id','username', 'email']
			    }).then(function(result){
			console.log(result);
			table.innerHTML='';
			for(var i = 0; i < result.docs.length; i++){
				let user = result.docs[i];
				console.log(user);
				var rows = document.createElement("tr");
				var username = document.createElement("td");
				username.innerHTML = user.username;
				var email = document.createElement("td");
				email.innerHTML = user.email;
				
				var id = document.createElement("td");
				id.innerHTML = user._id;
				var actionCol = document.createElement("td");
				var action = document.createElement("span");
				action.onclick = function(){
					deletedoc(user);
				}
				action.className = "glyphicon glyphicon-trash";
				actionCol.appendChild(action);
				rows.appendChild(username);
				rows.appendChild(email);
				rows.appendChild(id);
				rows.appendChild(actionCol);
				table.appendChild(rows);
				//table.innerHTML += "<tr>"+ "<td>" + user.username + "</td>"+ "<td>"+ user.email + "</td>"+"<td>"+"<span class='glyphicon glyphicon-trash';'></span>"+"</td>"+"</tr>";
			}
		    }).catch(function(err) {
                console.log(err);
		    });
		});*/
	}
	
	function deletedoc(user){
		db.get(user._id).then(function(doc) {
			console.log(doc); 
			doc._deleted = true;
			return db.put(doc);
		    }).then(function (result) {
				console.log(result);
				refreshView();
		    }).catch(function (err) {
			console.log(err);
			alert("User can not be deleted. Please try again later.");
		    });
	}
</script>