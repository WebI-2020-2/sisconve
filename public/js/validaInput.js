function validaInput(input) {

    var valor = input.value;

    if(valor[0] === " "){
        input.value = valor.substring(0, valor.length-1);
       return;
    }

}