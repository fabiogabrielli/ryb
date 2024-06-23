// Função para mostrar a mensagem de erro usando Popper.js
function showError(element, message) {
    const tooltip = document.createElement('div');
    tooltip.className = 'popper-tooltip';
    tooltip.innerHTML = message;
    document.body.appendChild(tooltip);

    Popper.createPopper(element, tooltip, {
        placement: 'bottom-end',
    });

    // Remove a tooltip quando o usuário começa a corrigir o campo
    element.addEventListener('input', () => {
        tooltip.remove();
    });
}

document.getElementById('email').addEventListener('blur', checkEmail);

document.getElementById('password').addEventListener('input', validatePassword);
document.getElementById('confirm_password').addEventListener('input', validatePassword);

function validatePassword() {
    var password = document.getElementById('password').value;
    var confirmPassword = document.getElementById('confirm_password').value;

    var lengthRequirement = password.length >= 8;
    var uppercaseRequirement = /[A-Z]/.test(password);
    var numberRequirement = /\d/.test(password);
    var specialRequirement = /[@$!%*?&]/.test(password);
    var matchRequirement = password === confirmPassword;

    toggleValidation('length', lengthRequirement);
    toggleValidation('uppercase', uppercaseRequirement);
    toggleValidation('number', numberRequirement);
    toggleValidation('special', specialRequirement);
    toggleValidation('match', matchRequirement);
}

function toggleValidation(id, isValid) {
    var element = document.getElementById(id);
    if (isValid) {
        element.classList.add('valid');
        element.classList.remove('invalid');
    } else {
        element.classList.add('invalid');
        element.classList.remove('valid');
    }
}


function validateForm() {

    var nome = document.getElementById('nome').value;
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;
    var confirmPassword = document.getElementById('confirm_password').value;

    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    var passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

    // Limpar mensagens de erro
    document.getElementById('msgNome').innerText = '';
    document.getElementById('msgEmail').innerText = '';
    document.getElementById('msgPassword').innerText = '';
    document.getElementById('msgConfirmedPassword').innerText = '';

    var isValid = true;

    // Validar o campo nome (adapte essa validação conforme necessário)
    if (nome.trim() === '') {
        showError(document.getElementById('nome'), 'Por favor, insira seu nome.');
        isValid = false;
    }

    if (!emailPattern.test(email)) {
        showError(document.getElementById('email'), 'Por favor, insira um e-mail válido.');
        isValid = false;
    }

    if (!passwordPattern.test(password)) {
        isValid = false;
    }

    if (password !== confirmPassword) {
        isValid = false;
    }

    if (email != " ") {
        checkEmail();
    }

    return isValid;

}

function checkEmail() {
    var email = document.getElementById('email').value;

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "cruds/check_email.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            if (response.exists) {
                showError(document.getElementById('email'), 'E-mail já cadastrado.');
                isValid = false;
            }
        }
    };

    xhr.send("email=" + encodeURIComponent(email));
}
