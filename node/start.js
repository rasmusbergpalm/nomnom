//Internal functions
function addInterval(id, interval, code){
    if(typeof intervals[id] !== 'undefined'){
        clearInterval(intervals[id]);
    }
    streams[id] = [];
    streams[id] = [];
    intervals[id] = setInterval(function(){
        function log(message){
            addStreamMessage(id, message);
        }
        try{
            eval(code);
        }catch(err){
            addStreamMessage(id, err);
        }
    }, interval*1000);
}

function deleteInterval(id){
    if(typeof intervals[id] !== 'undefined'){
        clearInterval(intervals[id]);
    }
}

function addStreamMessage(id, message){
   if(streams[id].length>100){
       streams[id].shift();
   }
   streams[id].push(new Date()+': '+message);
}
// Server part

var express = require('express');
var cradle = require('cradle');

var db = new(cradle.Connection)().database('data');
function save(obj){
    obj.date = new Date().getTime();
    db.save(obj);
}

var intervals = [];
var streams = [];

var app = express.createServer(
    function(req,res,next){
        if(req.socket.remoteAddress !== '127.0.0.1'){
            res.send('Oh no you dont!');
        }else{
            next();
        }
    },
    express.bodyParser()
);


app.post('/addInterval/', function(req, res){
    if(typeof req.body.id === 'number' && typeof req.body.interval === 'number' && typeof req.body.code === 'string'){
        addInterval(req.body.id, req.body.interval, req.body.code);
        res.send('OK');
    }else{
        res.send('ERROR: post must be json object: {id: <number>, interval: <number>, code: <string>}');
        console.log(req.body);
    }

});

app.get('/deleteInterval/:id', function(req, res){
    try{
        deleteInterval(req.params.id);
        res.send('OK');
    }catch(e){
        res.send('ERROR: ' +e);
    }

});

app.get('/viewInterval/:id', function(req, res){
    if(typeof streams[req.params.id] !== 'undefined'){
        res.send(streams[req.params.id].join('<br />'));
    }else{
        res.send('');
    }
});

app.listen(3000);

// Start saved intervals
var mysql = require('mysql');
var TEST_DATABASE = 'nomnom';
var client = mysql.createClient({
  user: 'root',
  password: 'a32'
});

client.query('USE '+TEST_DATABASE);
client.query('SELECT * FROM getters', function (err, results, fields) {
    if (err) {throw err;}
    results.forEach(function(r){
        try{
            addInterval(r.id, r.interval, r.code);
        }catch(e){
            console.log('ERROR: could not start timer. '+e+'. timer: '+r);
        }
    })

    client.end();
  }
);