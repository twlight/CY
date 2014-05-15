function showAndHide(obj,types){
    var Layer=window.document.getElementById(obj);
    switch(types){
  case "show":
    Layer.style.display="block";
  break;
  case "hide":
    Layer.style.display="none";
  break;
}
  }
  function getValue(obj,str){
    var input=window.document.getElementById(obj);
input.value=str;
  }