var db = new PouchDB('mydb4');
	var remoteDB = new PouchDB('http://www.mostosi.de:5984/users'); 
	this.db.sync(remoteDB, {
		live: true,
		retry: true
	    }).on('change', function (change) {
		console.log('data change', change)
	    }).on('error', function (err) {
		console.log('sync error', err)
	});
	
	