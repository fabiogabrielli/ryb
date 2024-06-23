<?php include "header.php" ?>

<section class="loginStage">
    <div class="loginContent">
        <img class="logo" src="imgs/logo_ryb.svg" alt="">
        <h1>Criar uma conta</h1>
        <form id="signupForm" action="cruds/process_signin.php" method="post" onsubmit="return validateForm()">
            <div class="form-group">
                <input type="text" id="nome" name="nome" placeholder=" " />
                <label for="nome">Nome*</label>
                <div id="msgNome" class="error-message"></div>
            </div>
            <div class="form-group">
                <input type="email" id="email" name="email" placeholder=" " />
                <label for="email">Endereço de e-mail*</label>
                <div id="msgEmail" class="error-message"></div>
            </div>
            <div class="form-group">
                <input type="password" id="password" name="password" placeholder=" " />
                <label for="password">Digite sua senha</label>
                <div id="msgPassword" class="error-message"></div>
            </div>
            <div class="form-group">
                <input type="password" id="confirm_password" name="confirm_password" placeholder=" " />
                <label for="confirm_password">Digite novamente sua senha</label>
                <div id="msgConfirmedPassword" class="error-message"></div>
            </div>
            <button type="submit">Entrar</button>
        </form>
        <span id="length" class="passwordValidated">Mínimo 8 caracteres</span>
        <span id="uppercase" class="passwordValidated">Uma letra Maiúscula</span>
        <span id="number" class="passwordValidated">Um número</span>
        <span id="special" class="passwordValidated">Um caractere especial</span>
        <span id="match" class="passwordValidated">As senhas precisam ser idênticas</span>
        <span class="linklogin">Já tem uma conta?&nbsp;<a href="login.php">Entrar</a></span>
    </div>
</section>

<?php include "footer.php" ?>