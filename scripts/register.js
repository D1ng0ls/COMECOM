let email = document.getElementById('email');
let senha = document.getElementById('senha');
let nome = document.getElementById('nome');
let cidade = document.getElementById('cidade');
let telefone = document.getElementById('telefone');
let tipo_pessoa = document.getElementById('tipo_pessoa');
let cpf = document.getElementById('cpf');
let cnpj = document.getElementById('cnpj');
let qnt_lojas = document.getElementById('qnt_lojas');
let form = document.querySelector('form');
let textForm = document.getElementById('textForm'); 
let textEmail = document.getElementById('textEmail'); 
let textSenha = document.getElementById('textSenha');   

form.addEventListener('submit', (event) => {
    if (tipo_pessoa.value == 'fisica') {
        if(email.value == '' || senha.value == '' || nome.value == '' || cidade.value == '' || telefone.value == '' || cpf.value == '') {
            textForm.textContent = 'Há campos a cima que precisam ser preenchidos!';
        }
        else
        {
            if(validatorEmail(email.value) === true && validatorSenha(senha.value) === true) {
                textForm.textContent = '';
                textEmail.textContent = '';
                textSenha.textContent = '';
                header('Location: ../'); //Caso os dados estejam certo, ele irá para o home
            }
        }
        event.preventDefault()
    }
    else
    {
        if (tipo_pessoa.value == 'juridica') {
            if(email.value == '' || senha.value == '' || nome.value == '' || cidade.value == '' || telefone.value == '' || cnpj == '' || qnt_lojas == '') {
                textForm.textContent = 'Há campos a cima que precisam ser preenchidos!';
            }
            else
            {
                if(validatorEmail(email.value) === true && validatorSenha(senha.value) === true) {
                    textForm.textContent = '';
                    textEmail.textContent = '';
                    textSenha.textContent = '';
                    header('Location: ../'); //Caso os dados estejam certo, ele irá para o home
                }
            }
            event.preventDefault()
        }
    }
})

function validatorEmail(email) {
    let emailVar = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/;
    return emailVar.test(email);
}

function validatorSenha(senha) {
    let senhaVar = /^(?=.*[0-9])(?=.*[!@#$%_&*])[a-zA-Z0-9!@#$%_&*]{8,16}$/;
    return senhaVar.test(senha);
}

email.addEventListener("keyup", () => {
    if(validatorEmail(email.value) !== true) {
        textEmail.textContent = "O formato do email deve ser: name@abc.com";
    }
    else
    {
        textEmail.textContent = '';
    }
})

senha.addEventListener("keyup", () => {
    if(validatorSenha(senha.value) !== true) {
        textSenha.textContent = "Sua senha deve conter: no mínimo 8 caracteres, letra(s), número(s) e no mínimo 1 caracter especial (!@#$%_&*).";
    }
    else
    {
        textSenha.textContent = '';
    }
})