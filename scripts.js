// Simulação de um estado de login
let isLoggedIn = false; // Mude para true quando o usuário fizer login

function validateForm() {
    var senha = document.getElementById("senha").value;
    var confirmarSenha = document.getElementById("confirmar-senha").value;

    if (senha !== confirmarSenha) {
        alert("As senhas não coincidem. Por favor, verifique e tente novamente.");
        return false; // Impede o envio do formulário
    }

    return true; // Permite o envio do formulário
}

function validateLogin() {
    // Aqui você pode adicionar a lógica de verificação de login se necessário
    isLoggedIn = true; // Simula o login bem-sucedido
    alert("Login realizado com sucesso!");
    return true; // Permite o envio do formulário
}

// Redirecionar para login se o usuário não estiver logado
function checkLogin() {
    if (!isLoggedIn) {
        alert("Você precisa estar logado para acessar o carrinho.");
        window.location.href = "login.html"; // Redireciona para a página de login
    }
}

// Chame checkLogin() ao carregar a página do carrinho
window.onload = function() {
    if (window.location.pathname.includes('carrinho.html')) {
        checkLogin();
    }
}
