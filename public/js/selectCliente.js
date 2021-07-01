var cliente = [
    "CLIENTE PADRÃO", 
    "JOSÉ ALENCAR DE SOUZA", 
    "ZECA DA SILVA FAGUNDES", 
    "MARIA ANTONIETA MARGARIDA", 
    "ANA MARGARIDA MARTINS"
];

var spanTxtSC = document.getElementById("name-client");
var selectCliente = document.getElementById("nome-cliente");

selectCliente.addEventListener("change", () => {
    spanTxtSC.value = cliente[parseInt(selectCliente.value)]
});
