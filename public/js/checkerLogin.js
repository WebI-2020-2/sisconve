var checkBtn = document.getElementById("acc");

var inputUsuario = document.getElementById("usuario");
var inputLevel = document.getElementById("acess-level");
var inputSenha = document.getElementById("senha");
var inputconfSenha = document.getElementById("confi-senha");
var inputCaixa = document.getElementById("caixa-cadastro")

checkBtn.addEventListener("change", () => {
    if(checkBtn.checked){
        inputUsuario.disabled = false;
        inputLevel.disabled = false;
        inputSenha.disabled = false;
        inputconfSenha.disabled = false;
        inputCaixa.disabled = false;

        inputUsuario.style.backgroundColor = "#f6f6f6";
        inputLevel.style.backgroundColor = "#f6f6f6";
        inputSenha.style.backgroundColor = "#f6f6f6";
        inputconfSenha.style.backgroundColor = "#f6f6f6";
        inputCaixa.style.backgroundColor = "#f6f6f6"
    } else {
        inputUsuario.disabled = true;
        inputLevel.disabled = true;
        inputSenha.disabled = true;
        inputconfSenha.disabled = true;
        inputCaixa.disabled = true;

        inputUsuario.style.backgroundColor = "#e5e5e5";
        inputLevel.style.backgroundColor = "#e5e5e5";
        inputSenha.style.backgroundColor = "#e5e5e5";
        inputconfSenha.style.backgroundColor = "#e5e5e5";
        inputCaixa.style.backgroundColor = "#e5e5e5";
    }
})