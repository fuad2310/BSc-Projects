function myFunction() {
    var element = document.body;
    element.classList.toggle("dark-mode");
 }

 function loadDoc() {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        document.getElementById("demo").innerHTML =
        this.responseText;
      }
      xhttp.open("GET", "../text/CSWAD.txt");
      xhttp.send();
  }