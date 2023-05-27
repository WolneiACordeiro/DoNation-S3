<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dandelion - Login</title>

    <link rel="stylesheet" href="views/fonts/fonts.css" />
    <link rel="stylesheet" href="views/css/style.css" />
    <link rel="stylesheet" href="views/css/global.css" />
    <link rel="stylesheet" href="views/css/medias.css" />

    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/brands.min.js" integrity="sha512-1e+6G7fuQ5RdPcZcRTnR3++VY2mjeh0+zFdrD580Ell/XcUw/DQLgad5XSCX+y2p/dmJwboZYBPoiNn77YAL5A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <main class="login">
        <div class="login-container">
            <form class="form-login animate-apper" action="php/valida_login.php" method="POST">
                <div class="title">
                    <h1>Login</h1>
                </div>

                <section class="all-login">
                    <div class="inputs-infos">
                        <p>Não tem uma conta? <a href="pages/criarconta01.php">Crie sua conta</a>, leva menos de um minuto.</p>
                        <div>
                            <label for="exampleInputEmail1" class="form-label">E-mail</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                        </div>

                        <div>
                            <label for="exampleInputPassword1" class="form-label">Senha</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="senha">
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

                    <div class="row-check">
                        <div>
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Lembrar de mim</label>
                        </div>

                        <div>
                            <a href="#" class="forgot-password">Esqueceu sua senha?</a>
                        </div>
                    </div>

                    <div class="login-account">
                        <div class="login-account__button">
                            <input type="submit" class="buttonSubmit">
                            <span class="login-divisory"></span>
                        </div>
                        <div class="social-midia">
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

        <footer class="footer">
            <p>donation.com © 2022-2023 donation LTDA</p>
        </footer>

    </main>
</body>

</html>