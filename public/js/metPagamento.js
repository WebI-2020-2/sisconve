var metPag = ["À VISTA", "À PRAZO", "CARTÃO DÉBITO", "CARTÃO CRÉDITO", "CARNÊ"];
var spanTxt = document.getElementById("met-pag");
var aVista = document.getElementById("a-vista");
var aPrazo = document.getElementById("a-prazo");
var debito = document.getElementById("card-deb");
var credito = document.getElementById("card-cred");
var carne = document.getElementById("carne");

aVista.addEventListener("change", () => {
    spanTxt.value = metPag[parseInt(aVista.value)]
});
 
aPrazo.addEventListener("change", () => {
    spanTxt.value =  metPag[parseInt(aPrazo.value)]
});

debito.addEventListener("change", () => {
    spanTxt.value = metPag[parseInt(debito.value)]
});

credito.addEventListener("change", () => {
    spanTxt.value = metPag[parseInt(credito.value)]
});

carne.addEventListener("change", () => {
    spanTxt.value = metPag[parseInt(carne.value)]
});
