// let email = document.getElementById('email');
// let senha = document.getElementById('senha');
// let nome = document.getElementById('nome');
// let endereco = document.getElementById('endereco');
// let telefone = document.getElementById('telefone');
// let tipo_pessoa = document.getElementById('tipo_pessoa');
// let cpf = document.getElementById('cpf');
// let cnpj = document.getElementById('cnpj');
// let form = document.querySelector('form');
// let textForm = document.getElementById('textForm'); 
// let textEmail = document.getElementById('textEmail'); 
// let textSenha = document.getElementById('textSenha'); 
    
// form.addEventListener('submit', (event) => {
//     if(email.value == '' && senha.value == '' && nome.value == '' && endereco.value == '' && telefone.value == '' || cpf.value == '' || cnpj == '') {
//         textForm.textContent = 'Você precisa preencher todos os campos';
//         console.log('Você precisa preencher todos os campos');
//     }
//     else
//     {
//         console.log(nome.value);
//         console.log(email.value);
//         console.log(senha.value);
//         console.log(endereco.value);
//         console.log(telefone.value);
//         console.log(tipo_pessoa.value);
//         console.log(cpf.value);
//         console.log(cnpj.value);
//     }
//     event.preventDefault()
// })

// email.addEventListener("keyup", () => {
//     if(validatorEmail(email.value) !== true) {
//         textEmail.textContent = "O formato do email deve ser: abc@.com";
//     }
//     else
//     {
//         textEmail.textContent = '';
//     }
// })

// // senha.addEventListener("keyup", () => {
// //     if(validatorSenha(senha.value) !== true) {
// //         textSenha.textContent = "O formato da senha deve ser de no min, 6 caracteres";
// //     }
// //     else
// //     {
// //         textSenha.textContent = '';
// //     }
// // })

// function validatorEmail(email) {
//     let emailVar = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/;
//     return emailVar.test(email);
// }

// // function validatorSenha(senha) {
// //     let senhaVar = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/;
// //     return senhaVar.test(senha);
// // }

