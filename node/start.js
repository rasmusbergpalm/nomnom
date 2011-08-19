var express = require('express');
var cradle = require('cradle');

var db = new(cradle.Connection)().database('data');
function save(obj){
    if(typeof obj !== 'object') throw 'save only accepts objects';
    obj.date = new Date();
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

//TODO: Create interface for testing code, eg /test which returns all output

app.post('/setInterval/', function(req, res){
    if(typeof req.body.id === 'number' && typeof req.body.interval === 'number' && typeof req.body.code === 'string'){
        var id = req.body.id;
        if(typeof intervals[id] !== 'undefined'){
            clearInterval(intervals[req.body.id]);
        }
        streams[id] = [];
        streams[id] = [];
        intervals[id] = setInterval(function(){
            function log(message){
                streams[id].push(new Date()+': '+message);
            }
            try{
                eval(req.body.code);
            }catch(err){
                streams[id].push(new Date()+': '+err);
            }
        }, req.body.interval*1000);
        res.send('OK');
    }else{
        res.send('ERROR');
        console.log(req.body);
    }
    
});

app.get('/status/:id', function(req, res){
    if(typeof streams[req.params.id] !== 'undefined'){
        res.send(streams[req.params.id].join('<br />'));
    }
    
});

app.get('/clearInterval/:id', function(req, res){
    try{
        clearInterval(intervals[req.params.id]);
        res.send('OK');
    }catch(e){
        res.send('ERROR');
    }

});

app.listen(3000);