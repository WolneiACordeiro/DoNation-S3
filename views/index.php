<?php
session_start();

// Verifica se uma sessão está ativa
if (isset($_SESSION['autenticado']) && $_SESSION['autenticado'] === 'SIM') {
    // Destroi a sessão atual
    session_destroy();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dandelion - Login</title>

    <link rel="stylesheet" href="fonts/fonts.css" />
    <link rel="stylesheet" href="css/styles.css" />
    <link rel="stylesheet" href="css/global.css" />
    <link rel="stylesheet" href="css/medias.css" />


    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/brands.min.js"
        integrity="sha512-1e+6G7fuQ5RdPcZcRTnR3++VY2mjeh0+zFdrD580Ell/XcUw/DQLgad5XSCX+y2p/dmJwboZYBPoiNn77YAL5A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <main class="login">
        <div class="login-container">
            <form class="login-form animate-apper" action="../controllers/valida_login.php" method="POST">
                <div class="login-form__title">
                    <h1>Login</zh1>
                </div>

                <section class="login-form__login">
                    <div class="login-form__inputs">
                        <p>Não tem uma conta? <a href="pages/criarconta.php">Crie sua conta</a>, leva menos de um
                            minuto.</p>
                        <div class="login-inputs">
                            <div class="login-input">
                                <label class="label-g">E-mail</label>
                                <input class="input-g" type="email" name="email">
                            </div>

                            <div class="login-input">
                                <label class="label-g">Senha</label>
                                <input class="input-g" type="password" name="senha">
                            </div>
                        </div>
                    </div>

                    <?php if (isset($_GET['login']) && $_GET['login'] == 'erro') { ?>

                        <div class="text-danger">
                            Usuário ou senha inválido(s)!
                        </div>

                    <?php } ?>

                    <?php if (isset($_GET['login']) && $_GET['login'] == 'erro2') { ?>

                        <div class="text-danger">
                            Login Requerido!
                        </div>

                    <?php } ?>


                    <div class="login-form__check">
                        <div>
                            <input type="checkbox" />
                            <label>Lembrar de mim</label>
                        </div>

                        <div>
                            <a href="#" class="forgot-password">Esqueceu sua senha?</a>
                        </div>
                    </div>

                    <div class="login-form__submit">
                        <input type="submit" value="Enviar" />
                        <span class="login-divisory"></span>

                        <div class="social-media">
                            <a href="https://google.com">
                                <i class="fa-brands fa-google-plus-g"></i>
                            </a>

                            <a href="https://twitter.com/">
                                <i class="fa-brands fa-twitter"></i>
                            </a>

                            <a href="https://facebook.com">
                                <i class="fa-brands fa-facebook-f"></i>
                            </a>
                        </div>
                    </div>

                    <div class="total-comunity">
                        <p>Total de 285 comunidades criadas <i class="fa-solid fa-heart"></i></p>
                    </div>

                </section>
            </form>
        </div>

        <footer class="login-footer">
            <p>donation.com © 2022-2023 donation LTDA</p>
        </footer>
    </main>
</body>

</html>