

//Options
var tag = 'bergpalm.dk' //string
var something = 'latency'; //string
var interval = 10; //integer (seconds)
var range = 60*60; //integer (seconds)

//Code
function draw(){
    var startkey = "[%22"+tag+"%22,"+(new Date().getTime() - range*1000)+"]";
    var endkey = "[%22"+tag+"%22,"+(new Date().getTime())+"]";

    var url = "/couchdb/data/_design/tagsdate/_view/tagsdate?startkey="+startkey+"&endkey="+endkey;
    $.ajax({
        type: "GET",
        url: url,
        dataType: 'json',
        success: function(msg){
            console.log(msg.rows.length);
            var i=0;
            var d=[];
            $.each(msg.rows, function(k,r){
                d.push([r.value.date, r.value.latency]);
            });
            $.plot($('#'+itemid), [{data: d, color: 'red', points: { show: true }}],{xaxis: { mode: "time" }});
        }
    });
}
draw();
window.setInterval(draw,interval*1000);