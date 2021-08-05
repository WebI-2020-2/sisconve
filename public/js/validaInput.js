function validaInput(input) {

    var valor = input.value;

    if(valor[0] === " "){
        input.value = valor.substring(0, valor.length-1);
        return;
    }

}

function validaInputNumber(input) {

    var valor = input.value;

    if(valor[0] == " " || isNaN(valor[0])){
        return input.value = valor.substring(0, valor.length-1);
    }

    if(isNaN(valor[valor.length-1]) || valor[valor.length-1] == " "){
        return input.value = valor.substring(0, valor.length-1);
    }

}