function mascara(telefone) {
    var valor = telefone.value.replace(/\D/g, ''); // Remove caracteres não numéricos
    var formatado = '';

    if (valor.length > 0) {
        formatado += '(' + valor.substring(0, 2) + ')';
    }

    if (valor.length > 2) {
        formatado += ' ' + valor.substring(2, 7);
    }

    if (valor.length > 7) {
        formatado += '-' + valor.substring(7);
    }

    telefone.value = formatado;
}

function mascaraCpf(cpf) {
    var valor = cpf.value.replace(/\D/g, '');
    var formatado = '';

    if (valor.length > 0) {
        formatado += valor.substring(0, 3) + '.';
    }

    if (valor.length > 3) {
       formatado += valor.substring(3, 6) + '.';
    }

    if (valor.length > 6) {
        formatado += valor.substring(6, 9) + '-';
    }

    if (valor.length > 9) {
       formatado += valor.substring(9, 11);
    }

    cpf.value = formatado;
}


function mascaraCep(cep) {
    var valor = cep.value.replace(/\D/g, ''); // Remove caracteres não numéricos
    var formatado = '';

    if (valor.length > 5) {
        formatado += valor.substring(0, 5) + '-' + valor.substring(5, 8);
    } else if (valor.length > 2) {
        formatado += valor.substring(0, 2) + valor.substring(2, 5);
    } else {
        formatado += valor;
    }
    cep.value = formatado;
}