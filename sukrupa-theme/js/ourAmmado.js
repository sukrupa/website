var bool = new Boolean(true);
window.onload = function(){
 alert("hey girl hey");
 }

function clickAmmado(){
    if(bool){
        document.getElementById("ammadoGivingWidget").style.visibility = "visible";
        bool = false;
    }else {
        document.getElementById("ammadoGivingWidget").style.visibility = "hidden";
        bool = true;
    }
}
