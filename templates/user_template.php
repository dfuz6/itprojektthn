
<div id="user-name">
	loading...
</div>
<div id="user-email">
	loading...
</div>
<div id="user-points">
	loading...
</div>

<script>
	loadUser();
	function loadUser(){
		db.createIndex({
			index: {fields: ['username']}
			}).then(function(){
			db.find({
			selector: {username: '<?= $username; ?>', type:'user'},
			fields: ['_id', 'username', 'email', 'score']
		    }).then(function (result) {
			console.log(result);
			document.getElementById('user-name').innerHTML='<h3>' + result.docs[0].username + '</h3>';
			document.getElementById('user-email').innerHTML='<strong>' + result.docs[0].email + '</strong>';
			if(result.docs[0].score == null){
				document.getElementById('user-points').innerHTML='<strong>' + "Score: " + '</strong>' + 0 ;
			}else{
				document.getElementById('user-points').innerHTML='<strong>' + "Score: " + '</strong>' + result.docs[0].score ;
			}
		    }).catch(function (err) {
			console.log(err);
		    });
		});
	}

</script>