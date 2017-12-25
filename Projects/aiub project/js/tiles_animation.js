function myFunction(id) {
    //alert("I am an alert box!");
    var a ='sb1'+id;
    var b = 'sb2'+id;
    document.getElementById(a).style.display = "none";
    document.getElementById(b).style.display = "inline";
}

function hoverOutStyle(id) {
    var a ='sb1'+id;
    var b = 'sb2'+id;
    document.getElementById(a).style.display = "inline";
    document.getElementById(b).style.display = "none";
}