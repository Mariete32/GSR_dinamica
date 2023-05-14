function inicio() {
  let year = new Date().getFullYear();
  let anoFundacion = 1888;
  let anosHistoria = year - anoFundacion;
  let frase = "¡¡¡  " + anosHistoria + " años de historia  !!!";

  let historia = document.getElementById("historia");
  historia.textContent = frase;

  return true;
}
window.onload = function () {
  inicio();
};

function scrollEvento() {
  var pageHeight = document.body.scrollHeight;
  var pageWidth = document.body.scrollWidth;

  var scrollToX = pageWidth * 0; 
  var scrollToY = pageHeight * 0.3; // Desplazamiento vertical del 30% de la altura de la página

  window.scrollTo(scrollToX, scrollToY);
}

function scrollRecurso() {
  var pageHeight = document.body.scrollHeight;
  var pageWidth = document.body.scrollWidth;

  var scrollToX = pageWidth * 0;
  var scrollToY = pageHeight * 0.5; // Desplazamiento vertical del 50% de la altura de la página

  window.scrollTo(scrollToX, scrollToY);
}

function scrollUsuario() {
  var pageHeight = document.body.scrollHeight;
  var pageWidth = document.body.scrollWidth;

  var scrollToX = pageWidth * 0; 
  var scrollToY = pageHeight * 0.9; // Desplazamiento vertical del 90% de la altura de la página

  window.scrollTo(scrollToX, scrollToY);
}