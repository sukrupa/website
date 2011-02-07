var bool = new Boolean(true);

function clickAmmado(){
if(bool){
   document.getElementById("ammadoGivingWidget").style.visibility = "visible";
   bool=false;
   alert("visible");
  bool = false;
   } else {
    document.getElementById("ammadoGivingWidget").style.visibility = "hidden";
    bool = true;
    alert("invisible");
    }
}
