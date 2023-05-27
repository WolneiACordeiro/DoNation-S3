<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dandelion - Criar conta</title>
        <link rel="stylesheet" href="../assets/css/style.css" />

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

        <!-- FONT AWESOME -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/brands.min.js" integrity="sha512-1e+6G7fuQ5RdPcZcRTnR3++VY2mjeh0+zFdrD580Ell/XcUw/DQLgad5XSCX+y2p/dmJwboZYBPoiNn77YAL5A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </head>
<body class="animate-apper">
    <main class="create-account">
        <header class="create-account__title">
            <nav class="navbar-icons">
                <a href="../index.php" class="comeback-icon">
                <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="50" height="50" rx="5" fill="#232323"/>
                    <rect width="25" height="25" transform="translate(37.5 37.5) rotate(-180)" fill="#232323"/>
                    <path d="M32.2917 25L17.7083 25" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M25 32.2917L17.7083 25L25 17.7083" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                </a>
                <img src="../assets/imgs/dandelion_icon.png" class="dandelion-icon" alt="">
            </nav>

            <div class="title-container">
                <h1>Que incrível que você <br>quer participar da nossa comunidade.
                </h1>
                <p>O primeiro passo, é preencher esse <br>formulário de cadastro.</p>
            </div>
        </header>
    
        <section class="field-create-account__new">
            <form class="form-create-account__new" action="criarconta02.php" method="POST">
                <div class="title__new">
                    <div class="date-progress__new">
                        <h1>Seus dados</h1>
                        <span>01 de 03</span>
                    </div>
                    <span class="date-progress__divisory"></span>
                </div>

                <div class="form__email">
                    <label class="form-label">E-mail</label>
                    <input type="email" name="email" class="form-control" required>
                </div>

                <div class="form__password">
                    <div class="col__pass">
                        <label class="form-label">Senha</label>
                        <input type="password" name="senha" minlength="8" maxlength="12" class="form-control" required>
                    </div>

                    <div class="col__pass">
                        <label class="form-label">Repetir a senha <span>(De 8 a 12 caracteres)</span></label>
                        <input type="password" minlength="8" maxlength="12" class="form-control" required>
                    </div>
                </div>

                <div class="next-page__new">
                    <div class="next-page__container__new">
                        <span>
                        <i class="fa-solid fa-triangle-exclamation"></i>
                        Importante! <br> Preencha todos os dados.
                        </span>

                        <input type="submit" class="next-page__button" value="Próximo">
                    </div>
                </div>
            </form>
        </section>

        <footer class="informations">
            <div class="informations-container">
                <div class="informations-dandelion">
                    <h4>@Dandelion</h4>
                    <div class="informations__social-midia">
                        <a href="https://twitter.com">
                            <img src="../assets/imgs/twitter.png" alt="twitter icon" />
                        </a>

                        <a href="https://facebook.com">
                            <img src="../assets/imgs/facebook.png" alt="facebook icon" />
                        </a>

                        <a href="https://instagram.com">
                            <img src="../assets/imgs/instagram.png" alt="instagram icon" />
                        </a>
                    </div>
                </div>

                <span class="informations-divisory"></span>

                <div class="addres">
                    <span>Endereço</span>
                    <p>Registro, SP, Brasil <br>Centro, Never Land, 224</p>
                </div>

                <span class="informations-divisory"></span>

                <div class="legal">
                    <span>legal</span>
                    <a href="#">Termos de Uso Programa de Integridade</a>
                </div>

                <span class="informations-copyright">dandelion.com © 2022-2022 dandelion LTDA</span>

            </div>
        </footer>

    </main>
</body>
</html>