function valida() {
    const email = document.getElementById('email');
    const senha = document.getElementById('senha');

    const avisoEmail = document.getElementById('e-mail');
    const avisoSenha = document.getElementById('password');

    if (email.textContent === "" && senha.textContent === "") {
        email.style.border = "red";
        avisoEmail.style.display = 'block';
    
        senha.style.border = "red";
        avisoSenha.style.display = 'block';
    }

    else if (email.textContent === "") {
        email.style.border = "red";
        avisoEmail.style.display = 'block';
        
        const teste = document.createElement('p');
        teste.textContent = 'Prossiga';
        document.getElementById('email').appendChild(teste);

    }

    else if (senha.textContent === "") {
        senha.style.border = "red";
        avisoSenha.style.display = 'block';
    }
}