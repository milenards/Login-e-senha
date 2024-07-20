function viewerSenha() {
    var passwordField = document.getElementById("exampleInputPassword1");
    var showPassword = document.getElementById("showPassword");
    if (showPassword.checked) {
        passwordField.type = "text";
    } else {
        passwordField.type = "password";
    }
}


