var formSubmitting = false;
var setFormSubmitting = function() { formSubmitting = true; };

window.addEventListener("beforeunload", function (e) {
    if (formSubmitting) return undefined;

    var confirmationMessage = 'Ao sair da página, todos os possiveis dados inseridos serão perdidos';

    (e || window.event).returnValue = confirmationMessage; 
    return confirmationMessage; 
});