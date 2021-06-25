var metPag = ["À VISTA", "À PRAZO", "CARTÃO DÉBITO", "CARTÃO CRÉDITO", "CARNÊ"];
var spanTxt = document.getElementById("met-pag");
var metodoPagamento = document.getElementById("metodo-pagamento");

metodoPagamento.addEventListener("change", () => {
    spanTxt.value = metPag[parseInt(metodoPagamento.value)]
});
 
