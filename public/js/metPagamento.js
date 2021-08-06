var selectMetPag = document.getElementById("metodo-pagamento");
var inputParcela = document.getElementById("input-parcela");

function metPagamento() {
    if(parseInt(selectMetPag.value) == 1) {
        inputParcela.value = 1;
        inputParcela.readOnly = true;
    } else {
        inputParcela.readOnly = false;
    }
}