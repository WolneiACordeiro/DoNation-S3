<form class="form-service" action="../php/alterar.php" enctype="multipart/form-data" method="POST">
    <div class="title-service">
        <h1>Sua Contribuição</h1>
        <span>CMD São Marcos</span>
    </div>

    <div class="infos-services">
        <div class="col-info">
            <label class="label-g">Atividade</label>
            <input class="input-g" type="text" name="atividade" required> <!-- value="< ?php echo $exibe[1] ?>" -->
        </div>

        <div class="row">
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
            <div class="col-info">
                <label class="label-g">Categoria</label>
                <select id="inputState" class="input-g" name="categoria" required>
                    <option selected></option> <!-- < ?php echo $exibe[4] ?> -->
                    <option>#Livros</option>
                    <option>#Serviços Gerais</option>
                    <option>#Serviços Domésticos</option>
                </select>
            </div>
        </div>

        <div class="row">
            <label class="label-g">Descrição</label>
            <textarea class="input-g" name="descricao" required></textarea> <!-- < ?php echo $exibe[3] ?>  -->
        </div>
    </div>

    <div class="available-times">
        <h1>Horários disponíveis</h1>
        <div class="options-service">
            <div class="option">
                <label class="form-label">Dia da semana</label>
                <select id="inputState" class="form-select" name="dia" required>
                    <option selected class="option-neuter"><?php echo $exibe[5] ?></option>
                    <option>Segunda-feira</option>
                    <option>Terça-feira</option>
                    <option>Quarta-feira</option>
                    <option>Quinta-feira</option>
                    <option>Sexta-feira</option>
                    <option>Sábado</option>
                    <option>Domingo</option>
                </select>
            </div>

            <div class="container-hours">
                <div class="option">
                    <label class="form-label">Das</label>
                    <input type="time" class="service-hours" name="das" value="<?php echo $exibe[6] ?>" />
                </div>

                <div class="option">
                    <label class="form-label">Até</label>
                    <input type="time" class="service-hours" name="ate" value="<?php echo $exibe[7] ?>" />
                </div>
            </div>
        </div>
    </div>

    <div class="next-page__contribuir">
        <div class="next-page__container__contribuir">
            <span>
                <i class="fa-solid fa-triangle-exclamation"></i>
                Importante! <br> Preencha todos os dados.
            </span>

            <div class="contributions__buttons">
                <a class="delete-button" id="delete-button">Deletar</a>
                <button type="submit" class="alter-button">Alterar</a>
            </div>
        </div>
    </div>
</form>