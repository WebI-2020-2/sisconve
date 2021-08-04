var pass1 = document.getElementById("senha");
var pass2 = document.getElementById("confi-senha");
var divWrongPass = document.getElementById("pw-wrong");
var btnSubmit = document.getElementById("submit");

pass1.addEventListener("focusout", () => {
    if(pass1.value != pass2.value){
        divWrongPass.innerHTML = "<small><strong>As senhas estão diferentes!</strong></small>";
        btnSubmit.disabled = true;
    } else {
        divWrongPass.innerHTML = "";
        btnSubmit.disabled = false;
    }
});

pass2.addEventListener("focusout", () => {
    if(pass1.value != pass2.value){
        divWrongPass.innerHTML = "<small><strong>As senhas estão diferentes!</strong></small>";
        btnSubmit.disabled = true;
    } else {
        divWrongPass.innerHTML = "";
        btnSubmit.disabled = false;
    }
});
