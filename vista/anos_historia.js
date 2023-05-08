function inicio() {

  let year = new Date().getFullYear();
  let anoFundacion = 1888;
  let anosHistoria = year - anoFundacion;
  let frase = "¡¡¡  "+anosHistoria + " años de historia  !!!";

  let historia = document.getElementById("historia");
  historia.textContent = frase;
 
return true;
}
window.onload = function () {
  inicio();
};
