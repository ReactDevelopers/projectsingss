/*
* NODE_ENV=manish PORT=3212 pm2 start chirppe.js --name="Chirppe"
*/
var NodeEnviRonment = '.env.'+process.env.NODE_ENV;

require('dotenv').config({path: NodeEnviRonment});
var fs                      = require('fs');
var $socket                 = require('socket.io');
var express                 = require('express');
var request                 = require('request');
var http                    = require('http');
var https                   = require('https');
var gcm                     = require('node-gcm');
var apn                     = require('apn'); 
var bodyParser              = require('body-parser');
var $app                    = express();

process.env.NODE_TLS_REJECT_UNAUTHORIZED = 0;
    
/** 
* bodyParser.urlencoded(options)
* Parses the text as URL encoded data (which is how browsers tend to send form data from regular forms set to POST)
* and exposes the resulting object (containing the keys and values) on req.body
*/
$app.use(bodyParser.urlencoded({
    extended: true
}));

/**
 * bodyParser.json(options)
 * Parses the text as JSON and exposes the resulting object on req.body.
 */
$app.use(bodyParser.json());

var allowCrossDomain = function(req, res, next) {
    res.header('Access-Control-Allow-Origin', '*');
    res.header('Access-Control-Allow-Methods', 'GET,PUT,POST,DELETE,OPTIONS');
    res.header('Access-Control-Allow-Headers', 'Content-Type, Authorization, Content-Length, X-Requested-With');
    next();
};

$app.use(allowCrossDomain);

if(process.env.NODE_ENV == 'production')
{
    var $server          = https.createServer({
        key                 : fs.readFileSync('/var/www/html/cert/chirppe.com.key'),
        cert                : fs.readFileSync('/var/www/html/cert/chirppe.com.crt'),
        rejectUnauthorized  : false 
    },$app);
}
else
{
    var $server          = http.createServer($app);
}

var $io                     = $socket.listen($server, {log:false, origins:'*:*'});
var $port                   = process.env.NODE_PORT || 3212;
var $users                  = [];
var $users_details          = [];

var $debug                  = (process.env.NODE_DEBUG == 'true') ? true : false;
var $api_url                = process.env.NODE_URL || 'https://www.chirppe.com/';
var $api_success_response   = {'status': true,'data': [],"message": "Try Again.","error": "The records has been retrieved successfully.","error_code": "","status_code": "200"};

$server.listen($port, function () {console.log('\n\nListening on port %d \n\nEnvironment Used is %s \n\nFull URL Used is %s:%d',$port,process.env.NODE_ENV,process.env.NODE_IP,$port);});

function print($data,$heading){
    if(!$heading){
        $heading = "RECENT DATA";
    }

    if($debug){
        console.log('_______________________________\n\n '+$heading+'\n_______________________________'+'\n\n'+ JSON.stringify($data,null,2)+'\n\n_______________________________'+'\n\n DEVELOPED BY: Manish Mahant\n_______________________________');
    }
}

$io.on('connection', function (socket) {
    
    socket.on('join', function ($user,callback){
        
        if($user.sender_id){
            add_socket_user($user);
        }

        function add_socket_user($user)
        {    
            $user.socket_id = socket.id;

            /* ADDING SOME RECORD KEEPING DATA TO SOCKET */
            socket.sender_id    = $user.sender_id;
            socket.sender       = $user.sender;
            
            /* ADDING USER TO SOCKET POOL */
            if($users.indexOf($user.sender_id) === -1){
                $users.push($user.sender_id);

                print($user,"USER ADDED SUCCESSFULLY");
            }else{
                print($user,"USER ALREDY EXISTS IN SOCKET POOL");
            }

            /* ADDING USER DETAILS TO SOCKET POOL */
            $isAlreadyExists = $users_details.find($item => $item.sender_id === $user.sender_id);
            if(!$isAlreadyExists)
            {
                $users_details.push($user);
                print($user,"USER DETAIL ADDED SUCCESSFULLY");
            }
            else
            {
                print($user,"USER DETAIL ALREDY EXISTS IN SOCKET POOL");
            }
            update_socket_users($users_details,$users);
        }

        callback({'status': true,'online_users': $users_details});
    });

    socket.on('chat.user.list', function($api_token,$search,callback)
    {
        request($api_url+'chat/chatuser-list', {json: {api_token: $api_token, search: $search}}, function ($error, $response, $body) {
            if($body)
            {
                print($body,"LISTING CHAT USERS");
                callback($body);
            }
            else
            {
                callback($api_success_response);
            }
        });
    });

    socket.on('chat.message.list', function($sender_id,$receiver_id,$api_token,callback)
    {
        request($api_url+'chat/chat-messages', {json: {sender_id: $sender_id,receiver_id: $receiver_id,api_token:$api_token}}, function ($error, $response, $body) {
            if($body)
            {
                callback($body);
            }
            else
            {
                callback($api_success_response);
            }
        });
    });

    socket.on('chat.send.message', function($data,callback)
    {
        request($api_url+'chat/chat-save', {json: $data}, function ($error, $response, $body) 
        {
            print($body,"SENT MESSAGE SAVED");
            
            $io.emit('chat.message.'+$data.receiver_id,$body);
            
            callback($body);
        });
    });
    
    socket.on('chat.message.acknowledge', function($data,callback)
    {
        print($data,"MESSAGE ACKNOWLEDGED");

        request($api_url+'chat/chat-update', {json: $data}, function ($error, $response, $body) 
        {
            print($body,"MESSAGE UPDTAED SUCCESSFULLY");
            
            callback($body);
        });
    });

    socket.on('chat.start.typing',function($receiver_id, $sender_id, $user_name, callback)
    {
        print({sender_id:$sender_id, receiver_id:$receiver_id, user_name:$user_name},'TYPING BETWEEN TYPER '+$sender_id+' AND LISTENER '+$receiver_id);
        
        $io.emit('chat.user.start.typing.'+$receiver_id,{'action':$user_name+' typing..','sender_id': $sender_id,'receiver_id': $receiver_id});

        callback({'action':$user_name+' typing..',sender_id:$sender_id, receiver_id: $receiver_id});
    });

    socket.on('chat.stop.typing', function($receiver_id, $sender_id, callback)
    {
        print({sender_id:$sender_id, receiver_id:$receiver_id},'STOPPED TYPING BETWEEN TYPER '+$sender_id+' AND LISTENER '+$receiver_id);
        
        $io.emit('chat.user.stop.typing.'+$receiver_id,{'action':'Type a message here','sender_id': $sender_id,'receiver_id': $receiver_id});

        callback({'action':'stop-typing',sender_id:$sender_id, receiver_id: $receiver_id});
    });

    socket.on('disconnect',function()
    {
        if(socket.sender_id)
        {
            $disconnectedUser = $users_details.filter(function(e){ 
                return e.sender_id == socket.sender_id; 
            });
            $users_details = $users_details.filter(function(e){ 
                return e.sender_id != socket.sender_id; 
            });
            
            $users.splice( $users.indexOf(socket.sender_id), 1 );
            update_socket_users($users_details,$users,$disconnectedUser);
            
        }
    });

    function update_socket_users(usersdetails,users,disconnected)
    {
        print(users,'ONLINE USERS LIST');
        if(disconnected)
        {
            $io.emit('disconnect', disconnected);
        }
        $io.emit('users', usersdetails);
    }
});

function user_verification_function($io,userdata)
{
    print(userdata,'USER NOT VERIFIED');
    $io.emit('on.user.verification.check.'+userdata.user, userdata);
}