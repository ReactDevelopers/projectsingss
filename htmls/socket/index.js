var app = require('express')();
var http = require('http').Server(app);
var io = require("socket.io")(http);
var users = [];
var onlineuser = []; // array for online users

app.get("/",function(req,res){
	res.sendFile(__dirname +"/index.html")
});

io.on('connection',function(socket){

	users.push(socket);
	console.log("New user connected " + users.length );

	setTimeout(function() {
        socket.send('Sent a message 4 seconds after connection!');
   	}, 4000);
	
	//count no of user are disconnected.
	socket.on('disconnect',function(){
		users.splice(users.indexOf(socket),1);
		onlineuser.splice(onlineuser.indexOf(socket.username),1);
		console.log('user disconnected '+ users.length);
	});

	//
	socket.on('new user',function(data){
		socket.username = data;
		onlineuser.push(socket.username);
		console.log('user connected '+socket.username);
		updateuser();
	});

	// function for sent or received message
	// msg function take two arguments name and msg

	socket.on("msg",function(name,msg){
		console.log('name','msg');
		io.sockets.emit("rmsg",{name:name,msg:msg});//for received msg
	});

	function updateuser(){
		io.sockets.emit("get user",onlineuser);
	}

});


http.listen(3040,function(){
	console.log('server created with port 3030');
});