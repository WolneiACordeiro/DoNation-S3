<?php include('session_info.php');
$id = $_POST['id'];
$objectId = new \MongoDB\BSON\ObjectID($id);
$buscaDoacao = $colecaoContribuicao->findOne(['_id' => $objectId]);

?>

<script>
    function endModal() {
        sessionStorage.setItem("modalOpen", "false");
    }
</script>

<form class="form-service" action="../../controllers/alterar.php" enctype="multipart/form-data" method="POST">
    <input type="hidden" name="ida" value="<?php echo $id; ?>">
    <div class="title-service">
        <h1>Alterar contribuição</h1>
        <span>CMD São Marcos</span>
    </div>

    <div class="infos-services">
        <div class="col-info">
            <label class="label-g">Atividade</label>
            <input class="input-g" type="text" name="atividade" value="<?php echo $buscaDoacao['atividadeContribuicao']; ?>" required>
        </div>

        <div class="image-contribution">
            <div class="upload-container" style="width: 270px; height: 297px;">
                <div class="upload-preview" style="width: 270px; height: 297px;">
                    <img src="../imgs/contribuicoes/<?php echo $buscaDoacao['fotoContribuicao']; ?>" alt="Imagem Padrão" id="default-image">
                </div>
                <label for="upload-input" class="custom-button">
                    Foto do Serviço
                    <?php include('../svgs/fotoPerfil.svg'); ?>
                </label>
                <input type="file" name="file" id="upload-input" accept=".jpg, .png, .jpeg" style="display: none;">
            </div>
        </div>

        <div class="row">
            <div class="col-info">
                <label class="label-g">Categoria</label>
                <select id="inputState" class="input-g" name="categoria" required>
                    <option selected><?php echo $buscaDoacao['categoriaContribuicao']; ?></option>
                    <option>#Livros</option>
                    <option>#Serviços Gerais</option>
                    <option>#Serviços Domésticos</option>
                </select>
            </div>
        </div>

        <div class="row">
            <label class="label-g">Descrição</label>
            <textarea class="input-g desc-textarea" name="descricao" required><?php echo $buscaDoacao['descricaoContribuicao']; ?></textarea>
        </div>
    </div>

    <div class="infos-services">
        <h1>Horários disponíveis</h1>

        <div class="options-service">
            <div class="option">
                <label class="label-g">Dia da semana</label>
                <select id="inputState" class="input-g" name="dia" required>
                    <option selected class="option-neuter"><?php echo $buscaDoacao['diaContribuicao']; ?></option>
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
                    <label class="label-g">Das</label>
                    <input type="time" class="input-g" name="das" value="<?php echo $buscaDoacao['dasContribuicao']; ?>" />
                </div>

                <div class="option">
                    <label class="label-g">Até</label>
                    <input type="time" class="input-g" name="ate" value="<?php echo $buscaDoacao['ateContribuicao']; ?>" />
                </div>
            </div>
        </div>
    </div>

    <div class="next-page__contribuir">
        <div>
            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M16 16V10" stroke="url(#paint0_linear_205_3049)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M16 21.3334L16 21.3334" stroke="url(#paint1_linear_205_3049)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M4 19.1747V12.8253C4 10.6893 5.136 8.71465 6.98133 7.63998L12.9813 4.14798C14.8467 3.06265 17.152 3.06265 19.0173 4.14798L25.0173 7.63998C26.864 8.71465 28 10.6893 28 12.8253V19.1747C28 21.3107 26.864 23.2853 25.0187 24.36L19.0187 27.852C17.1533 28.9373 14.848 28.9373 12.9827 27.852L6.98267 24.36C5.136 23.2853 4 21.3107 4 19.1747V19.1747Z" stroke="url(#paint2_linear_205_3049)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <defs>
                    <linearGradient id="paint0_linear_205_3049" x1="16.0005" y1="13.0009" x2="17.0001" y2="13.0009" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#FF0000" />
                        <stop offset="1" stop-color="#FF0000" />
                    </linearGradient>
                    <linearGradient id="paint1_linear_205_3049" x1="16.0005" y1="21.8335" x2="17.0001" y2="21.8335" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#FF0000" />
                        <stop offset="1" stop-color="#FF0000" />
                    </linearGradient>
                    <linearGradient id="paint2_linear_205_3049" x1="4.01255" y1="16.0038" x2="28.0013" y2="16.0038" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#FF0000" />
                        <stop offset="1" stop-color="#FF0000" />
                    </linearGradient>
                </defs>
            </svg>

            <p>Importante! <br> Preencha todos os dados.</p>
        </div>

        <a class="btn contained" style="height: 45px" onclick="confirmModal('confirmAlterar')">Alterar</a>
    </div>

    <div class="shadow"></div>
    <div class="modal-confirm" id="confirmAlterar">
        <div class="confirm-title">
            <h2>Atenção</h2>
            <p>Você está prestes a alterar essa contribuição. Você tem certeza disso?</p>
        </div>

        <div class="confirm-buttons">
            <button type="submit" class="btn outline" onclick="endModal()">Sim, alterar</button>
            <a class="btn contained" id="cancel-button">Cancelar</a>
        </div>
    </div>
</form>