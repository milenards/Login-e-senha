function viewerSenha() {
    var passwordField = document.getElementById("exampleInputPassword1");
    var showPassword = document.getElementById("showPassword");
    if (showPassword.checked) {
        passwordField.type = "text";
    } else {
        passwordField.type = "password";
    }
}



function validarSenhas() {
    var senha = document.getElementById("senha").value;
    var confirmarSenha = document.getElementById("confirmar_senha").value;
    if (senha != confirmarSenha) {
        alert("As senhas precisam ser iguais.");
        return false;
    }
    return true;
}
