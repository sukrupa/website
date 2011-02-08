var bool = new Boolean(false);
var trueVal= new Boolean(true);
var falseVal= new Boolean(false);


window.onload = function(){
alert("loaded");
 }

function toggleAmmado(){

    if($('ammadoHolder').css("z-index").equals("-1")){
        $('ammadoHolder').css({"z-index": "5"});

    }else {
        $('ammadoHolder').css({"z-index": "-1"});
    }
}


