<?php include('../blades/header.php');?>

<body class="animate-apper">
    <main class="login">
        <div class="login-container">
            <form class="register-form animate-apper" action="../../controllers/valida_login.php" method="POST">
                <div class="login-form__title">
                    <h1>Cadastrar</h1>
                </div>

                <section class="login-form__login">
                    <div class="login-form__inputs">
                        <div class="login-inputs">
                            <div class="upload-container">
                                <div class="upload-preview">
                                    <img src="../imgs/avatars/padrao.png" alt="Imagem Padrão" id="default-image">
                                </div>
                                <label for="upload-input" class="custom-button">
                                    Foto de perfil
                                    <?php include('../svgs/fotoPerfil.svg'); ?>
                                </label>
                                <input type="file" id="upload-input" style="display: none;">
                            </div>

                            <div class="login-input">
                                <label class="label-g">Nome completo</label>
                                <input class="input-g" type="text" name="nome" placeholder="Insira seu nome" required>
                            </div>

                            <div class="login-input">
                                <label class="label-g">E-mail</label>
                                <input class="input-g" type="email" name="email" placeholder="insiraseuemail@mail.com" required>
                            </div>

                            <div class="login-input">
                                <label class="label-g">Senha</label>
                                <input class="input-g" type="password" name="senha" placeholder="Insira sua senha (Mínimo 8 caracteres)" required>
                            </div>

                            <div class="login-input">
                                <label class="label-g">Repetir Senha</label>
                                <input class="input-g" type="password" name="senha" placeholder="Repita a sua senha" required>
                            </div>
                        </div>
                    </div>

                    <?php if (isset($_GET['login']) && $_GET['login'] == 'erro') { ?>

                        <div class="text-danger">
                            <?php include('../svgs/alertQuadrado.svg'); ?>
                            A senha deve ter ao mínimo 8 caracteres
                        </div>

                    <?php } ?>

                    <?php if (isset($_GET['login']) && $_GET['login'] == 'erro2') { ?>

                        <div class="text-danger">
                            <?php include('../svgs/alertQuadrado.svg'); ?>
                            Login Requerido
                        </div>

                    <?php } ?>

                    <div class="button-links">
                        <a class="btn outline" href="../index.php">Voltar</a>
                        <button class="btn contained">Finalizar</button>
                    </div>

                    <div class="alert-fill">
                        <?php include('../svgs/alertHexagono.svg'); ?>
                        <p>
                            Importante! <br> Preencha todos os dados
                        </p>
                    </div>



                </section>
            </form>
        </div>

        <footer class="login-footer">
            <p>donation.com © 2022-2023 donation LTDA</p>
        </footer>
    </main>


    <script src="../js/app.js"></script>
</body>

</html>