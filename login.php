<?php include "header.php" ?>

<section class="loginStage">
    <div class="loginContent">
        <img class="logo" src="imgs/logo_ryb.svg" alt="">
        <?php
        if (isset($_GET['message']) && $_GET['message'] == 'success') {
            echo "<h1>Bem-vindo ao Rock Your Business</h1>";
        } else {
            echo "<h1>Que bom que você está de volta</h1>";
        }
        ?>
        <form action="cruds/process_login.php" method="post">
        <div class="form-group">
            <input type="email" id="emailLogin" name="email" placeholder=" "/>
            <label for="email">Endereço de e-mail*</label>
        </div>
        <div class="form-group">
            <input type="password" id="password" name="password" placeholder=" "/>
            <label for="password">Digite sua senha</label>
        </div>
        <button type="submit">Entrar</button>
        </form>
        <span class="linkSignIn">Não tem uma conta ainda?&nbsp;<a href="signin.php">Cadastrar</a></span>
        <div id="msgLogin" class="error-message-login">
                <?php
                if (isset($_GET['error'])) {
                    if ($_GET['error'] == 'wrong_password') {
                        echo "<br>Senha incorreta. Por favor, tente novamente.";
                    } elseif ($_GET['error'] == 'user_not_found') {
                        echo "<br>Usuário não encontrado.<br> Por favor, verifique seu e-mail e tente novamente.";
                    }
                }
                ?>
            </div>
    </div>
</section>

<?php include "footer.php" ?>