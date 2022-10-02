let email = document.getElementById('email');
let senha = document.getElementById('senha');
let form = document.querySelector('form');
let textForm = document.getElementById('textForm'); 
let textEmail = document.getElementById('textEmail'); 
let textSenha = document.getElementById('textSenha');   

form.addEventListener('submit', (event) => {
        if(email.value == '' || senha.value == '') {
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
})

function validatorEmail(email) {
    let emailVar = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/;
    return emailVar.test(email);
}

function validatorSenha(senha) {
    let senhaVar = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/;
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
        textSenha.textContent = "Sua senha deve conter: no mínimo 6 caracteres, letra(s), número(s) e no mínimo 1 caracter especial.";
    }
    else
    {
        textSenha.textContent = '';
    }
})
