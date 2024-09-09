function formatarTelefone(tel) {
    // Remove todos os caracteres não numéricos
    let telefone = tel.value.replace(/\D/g, '');

    // Formata o número de telefone para DDD + 9 dígitos
    if (telefone.length > 0) {
        telefone = '(' + telefone.substring(0, 2) + ') ' + telefone.substring(2, 7) + '-' + telefone.substring(7, 11);
    }

    // Define o valor do input com a formatação aplicada
    tel.value = telefone;
}

function formatarCNPJ(cnpj) {
    // Remove todos os caracteres não numéricos
    let cnpjNumeros = cnpj.value.replace(/\D/g, '');

    // Formata o CNPJ conforme os padrões
    if (cnpjNumeros.length > 2) {
        cnpjNumeros = cnpjNumeros.substring(0, 2) + '.' + cnpjNumeros.substring(2);
    }
    if (cnpjNumeros.length > 6) {
        cnpjNumeros = cnpjNumeros.substring(0, 6) + '.' + cnpjNumeros.substring(6);
    }
    if (cnpjNumeros.length > 9) {
        cnpjNumeros = cnpjNumeros.substring(0, 10) + '/' + cnpjNumeros.substring(10);
    }
    if (cnpjNumeros.length > 13) {
        cnpjNumeros = cnpjNumeros.substring(0, 15) + '-' + cnpjNumeros.substring(15, 17);
    }

    // Define o valor do input com a formatação aplicada
    cnpj.value = cnpjNumeros;
}
