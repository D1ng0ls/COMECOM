var senha = document.getElementById('senha');
let senha2 = document.getElementById('novasenha');
var pode1 = false;
var pode2 = false;

function validatorSenha2(senha2) {
    let senhaNovaVar = /^(?=.*[0-9])(?=.*[!@#$%_&*])[a-zA-Z0-9!@#$%_&*]{8,16}$/;
    return senhaNovaVar.test(senha2);
}

senha2.addEventListener("keyup", () => {
    if(validatorSenha2(senha2.value) !== true) {
        textSenhaNova.textContent = "Sua senha deve conter: no mínimo 8 caracteres, letra(s), número(s) e no mínimo 1 caracter especial (!@#$%_&*).";
        pode1 = false;
        pode();
    }
    else {
        textSenhaNova.textContent = '';
        pode1 = true;
        pode();
    }
})

function verifica() {
    if(senha.value == '') {
        pode2 = false;
    } else {
        pode2 = true;
    }

    pode();
}

function pode() {
    if (pode1 == true && pode2 == true) {
        document.getElementById('botao').disabled = false;
    } else {
        document.getElementById('botao').disabled = true;
    }
}