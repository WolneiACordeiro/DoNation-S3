<?php
session_start();
require_once '../models/conexao.php';
require_once '../vendor/autoload.php';

if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] !== 'SIM') {
    header('Location: ../index.php?login=erro2');
    exit;
} else {
    $id = $_SESSION['id'];
    $objectId = new \MongoDB\BSON\ObjectID($id);
    $registroUsuario = $colecaoUsuario->findOne(['_id' => $objectId]);

    $solicitacaoId = $_GET['idSolicitacao'];
    $solId = new \MongoDB\BSON\ObjectID($solicitacaoId);
    $registroSolicitacao = $colecaoSolicitacao->findOne(['_id' => $solId]);

    $doacaoId = $registroSolicitacao['idDoacao'];
    $donationId = new \MongoDB\BSON\ObjectID($doacaoId);
    $registroDoacao = $colecaoContribuicao->findOne(['_id' => $donationId]);

    $doadorId = $registroDoacao['idContribuidor'];
    $donatorId = new \MongoDB\BSON\ObjectID($doadorId);
    $registroDoador = $colecaoUsuario->findOne(['_id' => $donatorId]);

    $solicitadorId = $registroSolicitacao['idSolicitante'];
    $soliId = new \MongoDB\BSON\ObjectID($solicitadorId);
    $registroSolicitador = $colecaoUsuario->findOne(['_id' => $soliId]);

    $checkStatus = $registroSolicitacao['status'];

}
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
function pauseAjax() {
    // Armazena o estado atual do AJAX na localStorage
    localStorage.setItem('ajaxPaused', 'true');
}
</script>
<?php
if ($checkStatus === 'pendente' && $registroSolicitacao['idSolicitante'] == $id) {
    ?>

<form class="solicite">
    <div class="solicite-title">
        <p>Solicitar -
            <?php echo $registroDoacao['atividadeContribuicao']; ?> - (Pendente)
        </p>
    </div>

    <div class="solicite-about">
        <div class="solicite-users__imgs">
            <div class="user__img">
                <img src="../imgs/avatars/<?php echo $registroUsuario['fotoUsuario']; ?>" alt="">
            </div>
            <svg width="14" height="4" viewBox="0 0 14 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M7 3.5C7.82843 3.5 8.5 2.82843 8.5 2C8.5 1.17157 7.82843 0.5 7 0.5C6.17157 0.5 5.5 1.17157 5.5 2C5.5 2.82843 6.17157 3.5 7 3.5Z"
                    stroke="url(#paint0_linear_401_1826)" stroke-linecap="round" stroke-linejoin="round" />
                <path
                    d="M12.25 3.25C12.9404 3.25 13.5 2.69036 13.5 2C13.5 1.30964 12.9404 0.75 12.25 0.75C11.5596 0.75 11 1.30964 11 2C11 2.69036 11.5596 3.25 12.25 3.25Z"
                    stroke="url(#paint1_linear_401_1826)" stroke-linecap="round" stroke-linejoin="round" />
                <path
                    d="M1.75 3.25C2.44036 3.25 3 2.69036 3 2C3 1.30964 2.44036 0.75 1.75 0.75C1.05964 0.75 0.5 1.30964 0.5 2C0.5 2.69036 1.05964 3.25 1.75 3.25Z"
                    stroke="url(#paint2_linear_401_1826)" stroke-linecap="round" stroke-linejoin="round" />
                <defs>
                    <linearGradient id="paint0_linear_401_1826" x1="5.50157" y1="2.00045" x2="8.50016" y2="2.00045"
                        gradientUnits="userSpaceOnUse">
                        <stop stop-color="#9E005D" />
                        <stop offset="1" stop-color="#FF0000" />
                    </linearGradient>
                    <linearGradient id="paint1_linear_401_1826" x1="11.0013" y1="2.00038" x2="13.5001" y2="2.00038"
                        gradientUnits="userSpaceOnUse">
                        <stop stop-color="#9E005D" />
                        <stop offset="1" stop-color="#FF0000" />
                    </linearGradient>
                    <linearGradient id="paint2_linear_401_1826" x1="0.501307" y1="2.00038" x2="3.00013" y2="2.00038"
                        gradientUnits="userSpaceOnUse">
                        <stop stop-color="#9E005D" />
                        <stop offset="1" stop-color="#FF0000" />
                    </linearGradient>
                </defs>
            </svg>
            <div class="user__img">
                <img src="../imgs/avatars/<?php echo $registroDoador['fotoUsuario']; ?>" alt="">
            </div>
        </div>

        <div class="disabled">
            <div class="who-solicites">
                <p class="solicite-text__about"><span class="contrast-name">
                        <?php echo $registroSolicitador['nomeUsuario']; ?>
                    </span> está solicitando <span class="contrast-service">
                        <?php echo $registroDoacao['atividadeContribuicao']; ?>
                    </span></p>
            </div>

            <textarea class="custom__text-area"
                style="height: 80px; font-size: 12px;"><?php echo $registroSolicitacao['mensagemSolicitacao']; ?></textarea>

            <div class="calendar-input__selected">
                <div class="selected-date__show">
                    <span>No dia/hora</span>
                    <div class="bg-calendar">
                        <?php include('../views/svgs/calendarInput.svg'); ?>
                    </div>
                </div>

                <div class="calendar-date__selected">
                    <span>
                        <?php echo $registroSolicitacao['dataHorario']; ?>
                    </span>
                </div>
            </div>
        </div>

        <div class="process">
            <div class="process-message">
                Pendente
                <svg width="14" height="4" viewBox="0 0 14 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M7 3.5C7.82843 3.5 8.5 2.82843 8.5 2C8.5 1.17157 7.82843 0.5 7 0.5C6.17157 0.5 5.5 1.17157 5.5 2C5.5 2.82843 6.17157 3.5 7 3.5Z"
                        stroke="url(#paint0_linear_575_482)" stroke-linecap="round" stroke-linejoin="round" />
                    <path
                        d="M12.25 3.25C12.9404 3.25 13.5 2.69036 13.5 2C13.5 1.30964 12.9404 0.75 12.25 0.75C11.5596 0.75 11 1.30964 11 2C11 2.69036 11.5596 3.25 12.25 3.25Z"
                        stroke="url(#paint1_linear_575_482)" stroke-linecap="round" stroke-linejoin="round" />
                    <path
                        d="M1.75 3.25C2.44036 3.25 3 2.69036 3 2C3 1.30964 2.44036 0.75 1.75 0.75C1.05964 0.75 0.5 1.30964 0.5 2C0.5 2.69036 1.05964 3.25 1.75 3.25Z"
                        stroke="url(#paint2_linear_575_482)" stroke-linecap="round" stroke-linejoin="round" />
                    <defs>
                        <linearGradient id="paint0_linear_575_482" x1="5.50157" y1="2.00045" x2="8.50016" y2="2.00045"
                            gradientUnits="userSpaceOnUse">
                            <stop stop-color="#9E005D" />
                            <stop offset="1" stop-color="#FF0000" />
                        </linearGradient>
                        <linearGradient id="paint1_linear_575_482" x1="11.0013" y1="2.00038" x2="13.5001" y2="2.00038"
                            gradientUnits="userSpaceOnUse">
                            <stop stop-color="#9E005D" />
                            <stop offset="1" stop-color="#FF0000" />
                        </linearGradient>
                        <linearGradient id="paint2_linear_575_482" x1="0.501307" y1="2.00038" x2="3.00013" y2="2.00038"
                            gradientUnits="userSpaceOnUse">
                            <stop stop-color="#9E005D" />
                            <stop offset="1" stop-color="#FF0000" />
                        </linearGradient>
                    </defs>
                </svg>

            </div>
        </div>

    </div>
</form>

<?php
} else if ($checkStatus === 'pendente' && $registroSolicitacao['idDoador'] == $id) {
    ?>

<form style="display: inline-block;" method="POST" action="../../controllers/processar.php" target="hidden_iframe"
    onsubmit="reloadPage()">

    <div class="shadow"></div>

    <div class="modal-confirm" id="modalRejeitar">
        <input type="hidden" name="idSolicitacao" value="<?php echo $solicitacaoId ?>">
        <div class="confirm-title">
            <h2>Atenção</h2>
            <p>Você está prestes a rejeitar essa contribuição. Você tem certeza disso?</p>
        </div>

        <div class="confirm-buttons">
            <!-- <a href="solicite-receber05_rejeitado.php" class="btn outline">Sim, rejeitar</a> -->
            <input type="submit" class="btn outline" name="action2" value="Sim, Rejeitar">
            <a class="btn contained cancel-button">Cancelar</a>
        </div>
    </div>

    <div class="modal-confirm" id="modalAprovar">
        <input type="hidden" name="idSolicitacao" id="idSolicitacao" value="<?php echo $solicitacaoId ?>">
        <div class="confirm-title">
            <h2>Atenção</h2>
            <p>Você está prestes a aprovar essa doação. Você tem certeza disso?</p>
        </div>

        <div class="confirm-buttons">
            <input type="submit" class="btn outline" name="action1" value="Sim, Aprovar">
            <a class="btn contained cancel-button">Cancelar</a>
        </div>
    </div>

    <div class="solicite">
        <input type="hidden" name="idSolicitacao" id="idSolicitacao" value="<?php echo $solicitacaoId ?>">
        <div class="solicite-title">
            <p>Solicitar -
                <?php echo $registroDoacao['atividadeContribuicao']; ?> - (Pendente)
            </p>
        </div>

        <div class="solicite-about">
            <div class="solicite-users__imgs">
                <div class="user__img">
                    <img src="../imgs/avatars/<?php echo $registroSolicitador['fotoUsuario']; ?>" alt="">
                </div>
                <svg width="15" height="4" viewBox="0 0 15 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M7.5 3.5C8.32843 3.5 9 2.82843 9 2C9 1.17157 8.32843 0.5 7.5 0.5C6.67157 0.5 6 1.17157 6 2C6 2.82843 6.67157 3.5 7.5 3.5Z"
                        stroke="url(#paint0_linear_401_3287)" stroke-linecap="round" stroke-linejoin="round" />
                    <path
                        d="M12.75 3.25C13.4404 3.25 14 2.69036 14 2C14 1.30964 13.4404 0.75 12.75 0.75C12.0596 0.75 11.5 1.30964 11.5 2C11.5 2.69036 12.0596 3.25 12.75 3.25Z"
                        stroke="url(#paint1_linear_401_3287)" stroke-linecap="round" stroke-linejoin="round" />
                    <path
                        d="M2.25 3.25C2.94036 3.25 3.5 2.69036 3.5 2C3.5 1.30964 2.94036 0.75 2.25 0.75C1.55964 0.75 1 1.30964 1 2C1 2.69036 1.55964 3.25 2.25 3.25Z"
                        stroke="url(#paint2_linear_401_3287)" stroke-linecap="round" stroke-linejoin="round" />
                    <defs>
                        <linearGradient id="paint0_linear_401_3287" x1="6.00157" y1="2.00045" x2="9.00016" y2="2.00045"
                            gradientUnits="userSpaceOnUse">
                            <stop stop-color="#9E005D" />
                            <stop offset="1" stop-color="#FF0000" />
                        </linearGradient>
                        <linearGradient id="paint1_linear_401_3287" x1="11.5013" y1="2.00038" x2="14.0001" y2="2.00038"
                            gradientUnits="userSpaceOnUse">
                            <stop stop-color="#9E005D" />
                            <stop offset="1" stop-color="#FF0000" />
                        </linearGradient>
                        <linearGradient id="paint2_linear_401_3287" x1="1.00131" y1="2.00038" x2="3.50013" y2="2.00038"
                            gradientUnits="userSpaceOnUse">
                            <stop stop-color="#9E005D" />
                            <stop offset="1" stop-color="#FF0000" />
                        </linearGradient>
                    </defs>
                </svg>

                <div class="user__img">
                    <img src="../imgs/avatars/<?php echo $registroDoador['fotoUsuario']; ?>" alt="">
                </div>
            </div>

            <div class="disabled">
                <div class="who-solicites">
                    <p class="solicite-text__about"><span class="contrast-name">
                            <?php echo $registroSolicitador['nomeUsuario']; ?>
                        </span> está solicitando <span class="contrast-service">
                            <?php echo $registroDoacao['atividadeContribuicao']; ?>
                        </span></p>
                </div>

                <textarea class="custom__text-area"
                    style="height: 80px; font-size: 12px;"><?php echo $registroSolicitacao['mensagemSolicitacao']; ?></textarea>

                <div class="calendar-input__selected">
                    <div class="selected-date__show">
                        <span>No dia/hora</span>
                        <div class="bg-calendar">
                            <?php include('../views/svgs/calendarInput.svg'); ?>
                        </div>
                    </div>

                    <div class="calendar-date__selected">
                        <span>
                            <?php echo $registroSolicitacao['dataHorario']; ?>
                        </span>
                    </div>
                </div>
            </div>

            <textarea class="custom__text-area" id="r-2" name="resposta-2" autofocus name="response-message"></textarea>

            <div class="solicite-service__container">
                <a class="btn outline" style="flex: 230px 0 1;" onclick="pauseAjax(); confirmModal('modalRejeitar');">
                    Rejeitar
                    <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M5.77 0L0.5 5.27V12.73L5.77 18H13.23L18.5 12.73V5.27L13.23 0M5.91 4L9.5 7.59L13.09 4L14.5 5.41L10.91 9L14.5 12.59L13.09 14L9.5 10.41L5.91 14L4.5 12.59L8.09 9L4.5 5.41"
                            fill="url(#paint0_linear_401_3312)" />
                        <defs>
                            <linearGradient id="paint0_linear_401_3312" x1="0.509411" y1="9.00272" x2="18.501"
                                y2="9.00272" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#9E005D" />
                                <stop offset="1" stop-color="#FF0000" />
                            </linearGradient>
                        </defs>
                    </svg>
                </a>

                <a class="btn contained" style="flex: 230px 0 1;" onclick="pauseAjax(); confirmModal('modalAprovar');">
                    Aprovar
                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M20.71 7.70944C21.96 6.45944 21.39 4.99944 20.71 4.28944L17.71 1.28944C16.45 0.0394408 15 0.609441 14.29 1.28944L12.59 2.99944H9.99999C8.09999 2.99944 6.99999 3.99944 6.43999 5.14944L1.99999 9.58944V13.5894L1.28999 14.2894C0.0399901 15.5494 0.60999 16.9994 1.28999 17.7094L4.28999 20.7094C4.82999 21.2494 5.40999 21.4494 5.95999 21.4494C6.66999 21.4494 7.31999 21.0994 7.70999 20.7094L10.41 17.9994H14C15.7 17.9994 16.56 16.9394 16.87 15.8994C18 15.5994 18.62 14.7394 18.87 13.8994C20.42 13.4994 21 12.0294 21 10.9994V7.99944H20.41L20.71 7.70944ZM19 10.9994C19 11.4494 18.81 11.9994 18 11.9994H17V12.9994C17 13.4494 16.81 13.9994 16 13.9994H15V14.9994C15 15.4494 14.81 15.9994 14 15.9994H9.58999L6.30999 19.2794C5.99999 19.5694 5.81999 19.3994 5.70999 19.2894L2.71999 16.3094C2.42999 15.9994 2.59999 15.8194 2.70999 15.7094L3.99999 14.4094V10.4094L5.99999 8.40944V9.99944C5.99999 11.2094 6.79999 12.9994 8.99999 12.9994C11.2 12.9994 12 11.2094 12 9.99944H19V10.9994ZM19.29 6.28944L17.59 7.99944H9.99999V9.99944C9.99999 10.4494 9.80999 10.9994 8.99999 10.9994C8.18999 10.9994 7.99999 10.4494 7.99999 9.99944V6.99944C7.99999 6.53944 8.16999 4.99944 9.99999 4.99944H13.41L15.69 2.71944C16 2.42944 16.18 2.59944 16.29 2.70944L19.28 5.68944C19.57 5.99944 19.4 6.17944 19.29 6.28944Z"
                            fill="white" />
                    </svg>
                </a>

            </div>

        </div>
    </div>

</form>
<iframe name="hidden_iframe" style="display: none;"></iframe>
<script>
function reloadPage() {
    location.reload();
}
</script>

<script src="../js/modalConfirm.js"></script>

<?php
} else if (($checkStatus === 'recusado' && $registroSolicitacao['idDoador'] == $id) || ($checkStatus === 'recusado' && $registroSolicitacao['idSolicitante'] == $id)) {
    ?>

<form class="solicite">
    <div class="solicite-title">
        <p>Solicitar -
            <?php echo $registroDoacao['atividadeContribuicao']; ?> - (Rejeitado)
        </p>
    </div>

    <div class="solicite-about">
        <div class="solicite-users__imgs">
            <div class="user__img">
                <img src="../imgs/avatars/<?php echo $registroSolicitador['fotoUsuario']; ?>" alt="">
            </div>
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M2 18H16V20H2C1.46957 20 0.960859 19.7893 0.585786 19.4142C0.210714 19.0391 0 18.5304 0 18V4H2V18ZM18.22 0H5.78C4.8 0 4 0.8 4 1.78V14.22C4 15.2 4.8 16 5.78 16H18.22C19.2 16 20 15.2 20 14.22V1.78C20 0.8 19.2 0 18.22 0ZM17 11.6L15.6 13L12 9.4L8.4 13L7 11.6L10.6 8L7 4.4L8.4 3L12 6.6L15.6 3L17 4.4L13.4 8L17 11.6Z"
                    fill="url(#paint0_linear_401_2047)" />
                <defs>
                    <linearGradient id="paint0_linear_401_2047" x1="0.0104563" y1="10.003" x2="20.0011" y2="10.003"
                        gradientUnits="userSpaceOnUse">
                        <stop stop-color="#9E005D" />
                        <stop offset="1" stop-color="#FF0000" />
                    </linearGradient>
                </defs>
            </svg>

            <div class="user__img">
                <img src="../imgs/avatars/<?php echo $registroDoador['fotoUsuario']; ?>" alt="">
            </div>
        </div>

        <div class="opacity disabled">
            <div class="who-solicites">
                <p class="solicite-text__about"><span class="contrast-name">
                        <?php echo $registroSolicitador['nomeUsuario']; ?>
                    </span> está solicitando <span class="contrast-service">
                        <?php echo $registroDoacao['atividadeContribuicao']; ?>
                    </span></p>
            </div>

            <textarea class="custom__text-area"
                style="height: 80px; font-size: 12px;"><?php echo $registroSolicitacao['mensagemSolicitacao']; ?></textarea>

            <div class="calendar-input__selected">
                <div class="selected-date__show">
                    <span>No dia/hora</span>
                    <div class="bg-calendar">
                        <?php include('../views/svgs/calendarInput.svg'); ?>
                    </div>
                </div>

                <div class="calendar-date__selected">
                    <span>
                        <?php echo $registroSolicitacao['dataHorario']; ?>
                    </span>
                </div>
            </div>
        </div>

        <div class="process-solicite disabled">
            <p class="solicite-text__about"><span class="contrast-name">
                    <?php echo $registroDoador['nomeUsuario']; ?>
                </span> rejeitou a solicitação <span class="contrast-service">
                    <?php echo $registroDoacao['atividadeContribuicao']; ?>
                </span></p>
            <textarea class="custom__text-area" style="height: 80px; font-size: 12px;"
                name="response-message"><?php echo $registroSolicitacao['mensagemRetorno']; ?></textarea>
        </div>

        <div class="process">
            <div class="process-message active">
                Rejeitado
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M2 18H16V20H2C1.46957 20 0.960859 19.7893 0.585786 19.4142C0.210714 19.0391 0 18.5304 0 18V4H2V18ZM18.22 0H5.78C4.8 0 4 0.8 4 1.78V14.22C4 15.2 4.8 16 5.78 16H18.22C19.2 16 20 15.2 20 14.22V1.78C20 0.8 19.2 0 18.22 0ZM17 11.6L15.6 13L12 9.4L8.4 13L7 11.6L10.6 8L7 4.4L8.4 3L12 6.6L15.6 3L17 4.4L13.4 8L17 11.6Z"
                        fill="white" />
                </svg>

            </div>
        </div>

    </div>
</form>

<?php
} else if ($checkStatus === 'aprovado' && $registroSolicitacao['idDoador'] == $id) {
    ?>

<form style="display: inline-block;" method="POST" action="../../controllers/dCancelar.php" target="hidden_iframe"
    onsubmit="reloadPage()">
    <input type="hidden" name="idSolicitacao" value="<?php echo $solicitacaoId ?>">

    <div class="shadow"></div>

    <div class="modal-confirm" id="modalCancelar">
        <div class="confirm-title">
            <h2>Atenção</h2>
            <p>Você está prestes a cancelar essa contribuição. Você tem certeza disso?</p>
        </div>

        <div class="confirm-buttons">
            <!-- <a href="solicite-receber05_rejeitado.php" class="btn outline">Sim, rejeitar</a> -->
            <input type="submit" class="btn outline" name="action2" value="Sim, Cancelar">
            <a class="btn contained cancel-button">Cancelar</a>
        </div>
    </div>

    <div class="modal-confirm" id="modalConcluir">
        <div class="confirm-title">
            <h2>Atenção</h2>
            <p>Você está prestes a concluir essa doação. Você tem certeza disso?</p>
        </div>

        <div class="confirm-buttons">
            <input type="submit" class="btn outline" name="action1" value="Sim, Concluir">
            <a class="btn contained cancel-button">Cancelar</a>
        </div>
    </div>

    <div class="solicite">
        <div class="solicite-title">
            <p>Solicitar -
                <?php echo $registroDoacao['atividadeContribuicao']; ?> - (Aprovado)
            </p>
        </div>

        <div class="solicite-about">
            <div class="solicite-users__imgs">
                <div class="user__img">
                    <img src="../imgs/avatars/<?php echo $registroSolicitador['fotoUsuario']; ?>" alt="">
                </div>
                <svg width="21" height="22" viewBox="0 0 21 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M20.1589 7.70944C21.4089 6.45944 20.8389 4.99944 20.1589 4.28944L17.1589 1.28944C15.8989 0.0394408 14.4489 0.609441 13.7389 1.28944L12.0389 2.99944H9.4489C7.5489 2.99944 6.4489 3.99944 5.8889 5.14944L1.4489 9.58944V13.5894L0.738904 14.2894C-0.511096 15.5494 0.0589036 16.9994 0.738904 17.7094L3.7389 20.7094C4.2789 21.2494 4.8589 21.4494 5.4089 21.4494C6.1189 21.4494 6.7689 21.0994 7.1589 20.7094L9.8589 17.9994H13.4489C15.1489 17.9994 16.0089 16.9394 16.3189 15.8994C17.4489 15.5994 18.0689 14.7394 18.3189 13.8994C19.8689 13.4994 20.4489 12.0294 20.4489 10.9994V7.99944H19.8589L20.1589 7.70944ZM18.4489 10.9994C18.4489 11.4494 18.2589 11.9994 17.4489 11.9994H16.4489V12.9994C16.4489 13.4494 16.2589 13.9994 15.4489 13.9994H14.4489V14.9994C14.4489 15.4494 14.2589 15.9994 13.4489 15.9994H9.0389L5.7589 19.2794C5.4489 19.5694 5.2689 19.3994 5.1589 19.2894L2.1689 16.3094C1.8789 15.9994 2.0489 15.8194 2.1589 15.7094L3.4489 14.4094V10.4094L5.4489 8.40944V9.99944C5.4489 11.2094 6.2489 12.9994 8.4489 12.9994C10.6489 12.9994 11.4489 11.2094 11.4489 9.99944H18.4489V10.9994ZM18.7389 6.28944L17.0389 7.99944H9.4489V9.99944C9.4489 10.4494 9.2589 10.9994 8.4489 10.9994C7.6389 10.9994 7.4489 10.4494 7.4489 9.99944V6.99944C7.4489 6.53944 7.6189 4.99944 9.4489 4.99944H12.8589L15.1389 2.71944C15.4489 2.42944 15.6289 2.59944 15.7389 2.70944L18.7289 5.68944C19.0189 5.99944 18.8489 6.17944 18.7389 6.28944Z"
                        fill="url(#paint0_linear_401_3701)" />
                    <defs>
                        <linearGradient id="paint0_linear_401_3701" x1="0.0109257" y1="11.0031" x2="20.8989"
                            y2="11.0031" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#9E005D" />
                            <stop offset="1" stop-color="#FF0000" />
                        </linearGradient>
                    </defs>
                </svg>
                <div class="user__img">
                    <img src="../imgs/avatars/<?php echo $registroDoador['fotoUsuario']; ?>" alt="">
                </div>
            </div>

            <div class="disabled opacity">
                <div class="who-solicites">
                    <p class="solicite-text__about"><span class="contrast-name">
                            <?php echo $registroSolicitador['nomeUsuario']; ?>
                        </span> está solicitando <span class="contrast-service">
                            <?php echo $registroDoacao['atividadeContribuicao']; ?>
                        </span></p>
                </div>

                <textarea class="custom__text-area"
                    style="height: 80px; font-size: 12px;"><?php echo $registroSolicitacao['mensagemSolicitacao']; ?></textarea>

                <div class="calendar-input__selected">
                    <div class="selected-date__show">
                        <span>No dia/hora</span>
                        <div class="bg-calendar">
                            <?php include('../views/svgs/calendarInput.svg'); ?>
                        </div>
                    </div>

                    <div class="calendar-date__selected">
                        <span>11/05/2023 às 19h30m</span>
                    </div>
                </div>

                <div class="process">
                    <div class="process-solicite">
                        <p class="solicite-text__about"><span class="contrast-name">
                                <?php echo $registroDoador['nomeUsuario']; ?>
                            </span> aprovou a solicitação <span class="contrast-service">
                                <?php echo $registroDoacao['atividadeContribuicao']; ?>
                            </span></p>
                        <textarea class="custom__text-area" name="response-message"
                            style="height: 80px; font-size: 12px;"><?php echo $registroSolicitacao['mensagemRetorno']; ?></textarea>
                    </div>

                    <div class="process-message active">
                        Aprovado
                        <svg width="22" height="21" viewBox="0 0 22 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M20.7099 7.20944C21.9599 5.95944 21.3899 4.49944 20.7099 3.78944L17.7099 0.789441C16.4499 -0.460559 14.9999 0.109441 14.2899 0.789441L12.5899 2.49944H9.99993C8.09993 2.49944 6.99993 3.49944 6.43993 4.64944L1.99993 9.08944V13.0894L1.28993 13.7894C0.039929 15.0494 0.609929 16.4994 1.28993 17.2094L4.28993 20.2094C4.82993 20.7494 5.40993 20.9494 5.95993 20.9494C6.66993 20.9494 7.31993 20.5994 7.70993 20.2094L10.4099 17.4994H13.9999C15.6999 17.4994 16.5599 16.4394 16.8699 15.3994C17.9999 15.0994 18.6199 14.2394 18.8699 13.3994C20.4199 12.9994 20.9999 11.5294 20.9999 10.4994V7.49944H20.4099L20.7099 7.20944ZM18.9999 10.4994C18.9999 10.9494 18.8099 11.4994 17.9999 11.4994H16.9999V12.4994C16.9999 12.9494 16.8099 13.4994 15.9999 13.4994H14.9999V14.4994C14.9999 14.9494 14.8099 15.4994 13.9999 15.4994H9.58993L6.30993 18.7794C5.99993 19.0694 5.81993 18.8994 5.70993 18.7894L2.71993 15.8094C2.42993 15.4994 2.59993 15.3194 2.70993 15.2094L3.99993 13.9094V9.90944L5.99993 7.90944V9.49944C5.99993 10.7094 6.79993 12.4994 8.99993 12.4994C11.1999 12.4994 11.9999 10.7094 11.9999 9.49944H18.9999V10.4994ZM19.2899 5.78944L17.5899 7.49944H9.99993V9.49944C9.99993 9.94944 9.80993 10.4994 8.99993 10.4994C8.18993 10.4994 7.99993 9.94944 7.99993 9.49944V6.49944C7.99993 6.03944 8.16993 4.49944 9.99993 4.49944H13.4099L15.6899 2.21944C15.9999 1.92944 16.1799 2.09944 16.2899 2.20944L19.2799 5.18944C19.5699 5.49944 19.3999 5.67944 19.2899 5.78944Z"
                                fill="white" />
                        </svg>
                    </div>
                </div>
            </div>

            <textarea class="custom__text-area" id="r-2" name="resposta-2"></textarea>

            <div class="solicite-service__container">
                <a class="btn outline" style="flex: 230px 0 1;" onclick="pauseAjax(); confirmModal('modalCancelar')">
                    Cancelar
                    <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M5.77 0L0.5 5.27V12.73L5.77 18H13.23L18.5 12.73V5.27L13.23 0M5.91 4L9.5 7.59L13.09 4L14.5 5.41L10.91 9L14.5 12.59L13.09 14L9.5 10.41L5.91 14L4.5 12.59L8.09 9L4.5 5.41"
                            fill="url(#paint0_linear_401_3312)" />
                        <defs>
                            <linearGradient id="paint0_linear_401_3312" x1="0.509411" y1="9.00272" x2="18.501"
                                y2="9.00272" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#9E005D" />
                                <stop offset="1" stop-color="#FF0000" />
                            </linearGradient>
                        </defs>
                    </svg>
                </a>

            </div>

        </div>
    </div>

</form>
<iframe name="hidden_iframe" style="display: none;"></iframe>
<script>
function reloadPage() {
    location.reload();
}
</script>
<script src="../js/modalConfirm.js"></script>
<?php
} else if ($checkStatus === 'aprovado' && $registroSolicitacao['idSolicitante'] == $id) {
    ?>
<form style="display: inline-block;" method="POST" action="../../controllers/sCancelarConcluir.php"
    target="hidden_iframe" onsubmit="reloadPage()">
    <input type="hidden" name="idSolicitacao" value="<?php echo $solicitacaoId ?>">
    <div class="shadow"></div>

    <div class="modal-confirm" id="modalCancelar">

        <div class="confirm-title">
            <h2>Atenção</h2>
            <p>Você está prestes a cancelar essa contribuição. Você tem certeza disso?</p>
        </div>

        <div class="confirm-buttons">

            <input type="submit" class="btn outline" name="action2" value="Sim, Cancelar">
            <a class="btn contained cancel-button">Cancelar</a>
        </div>
    </div>

    <div class="modal-confirm" id="modalConcluir">
        <input type="hidden" name="idSolicitacao" id="idSolicitacao" value="<?php echo $solicitacaoId ?>">
        <div class="confirm-title">
            <h2>Atenção</h2>
            <p>Você está prestes a concluir essa doação. Você tem certeza disso?</p>
        </div>

        <div class="confirm-buttons">
            <input type="submit" class="btn outline" name="action1" value="Sim, Concluir">
            <a class="btn contained cancel-button">Cancelar</a>
        </div>
    </div>

    <div class="solicite">
        <div class="solicite-title">
            <p>Solicitar -
                <?php echo $registroDoacao['atividadeContribuicao']; ?> - (Aprovado)
            </p>
        </div>

        <div class="solicite-about">
            <div class="solicite-users__imgs">
                <div class="user__img">
                    <img src="../imgs/avatars/<?php echo $registroSolicitador['fotoUsuario']; ?>" alt="">
                </div>
                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M20.71 7.70968C21.96 6.45968 21.39 4.99968 20.71 4.28968L17.71 1.28968C16.45 0.0396849 15 0.609685 14.29 1.28968L12.59 2.99968H9.99999C8.09999 2.99968 6.99999 3.99968 6.43999 5.14968L1.99999 9.58969V13.5897L1.28999 14.2897C0.0399901 15.5497 0.60999 16.9997 1.28999 17.7097L4.28999 20.7097C4.82999 21.2497 5.40999 21.4497 5.95999 21.4497C6.66999 21.4497 7.31999 21.0997 7.70999 20.7097L10.41 17.9997H14C15.7 17.9997 16.56 16.9397 16.87 15.8997C18 15.5997 18.62 14.7397 18.87 13.8997C20.42 13.4997 21 12.0297 21 10.9997V7.99968H20.41L20.71 7.70968ZM19 10.9997C19 11.4497 18.81 11.9997 18 11.9997H17V12.9997C17 13.4497 16.81 13.9997 16 13.9997H15V14.9997C15 15.4497 14.81 15.9997 14 15.9997H9.58999L6.30999 19.2797C5.99999 19.5697 5.81999 19.3997 5.70999 19.2897L2.71999 16.3097C2.42999 15.9997 2.59999 15.8197 2.70999 15.7097L3.99999 14.4097V10.4097L5.99999 8.40968V9.99969C5.99999 11.2097 6.79999 12.9997 8.99999 12.9997C11.2 12.9997 12 11.2097 12 9.99969H19V10.9997ZM19.29 6.28968L17.59 7.99968H9.99999V9.99969C9.99999 10.4497 9.80999 10.9997 8.99999 10.9997C8.18999 10.9997 7.99999 10.4497 7.99999 9.99969V6.99968C7.99999 6.53968 8.16999 4.99968 9.99999 4.99968H13.41L15.69 2.71968C16 2.42968 16.18 2.59968 16.29 2.70968L19.28 5.68968C19.57 5.99968 19.4 6.17968 19.29 6.28968Z"
                        fill="url(#paint0_linear_401_2340)" />
                    <defs>
                        <linearGradient id="paint0_linear_401_2340" x1="0.562012" y1="11.0034" x2="21.45" y2="11.0034"
                            gradientUnits="userSpaceOnUse">
                            <stop stop-color="#9E005D" />
                            <stop offset="1" stop-color="#FF0000" />
                        </linearGradient>
                    </defs>
                </svg>
                <div class="user__img">
                    <img src="../imgs/avatars/<?php echo $registroDoador['fotoUsuario']; ?>" alt="">
                </div>
            </div>

            <div class="opacity disabled">
                <div class="who-solicites">
                    <p class="solicite-text__about"><span class="contrast-name">
                            <?php echo $registroSolicitador['nomeUsuario']; ?>
                        </span> está solicitando <span class="contrast-service">
                            <?php echo $registroDoacao['atividadeContribuicao']; ?>
                        </span></p>
                </div>

                <textarea
                    class="custom__text-area"><?php echo $registroSolicitacao['mensagemSolicitacao']; ?></textarea>

                <div class="calendar-input__selected">
                    <div class="selected-date__show">
                        <span>No dia/hora</span>
                        <div class="bg-calendar">
                            <?php include('../views/svgs/calendarInput.svg'); ?>
                        </div>
                    </div>

                    <div class="calendar-date__selected">
                        <span>
                            <?php echo $registroSolicitacao['dataHorario']; ?>
                        </span>
                    </div>
                </div>

                <div class="process">
                    <div class="process-solicite">
                        <p class="solicite-text__about"><span class="contrast-name">
                                <?php echo $registroDoador['nomeUsuario']; ?>
                            </span> aprovou a solicitação <span class="contrast-service">
                                <?php echo $registroDoacao['atividadeContribuicao']; ?>
                            </span></p>
                        <textarea class="custom__text-area"
                            name="response-message"><?php echo $registroSolicitacao['mensagemRetorno']; ?></textarea>
                    </div>

                    <div class="process-message active">
                        Aprovado
                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M20.71 7.70968C21.96 6.45968 21.39 4.99968 20.71 4.28968L17.71 1.28968C16.45 0.0396849 15 0.609685 14.29 1.28968L12.59 2.99968H9.99999C8.09999 2.99968 6.99999 3.99968 6.43999 5.14968L1.99999 9.58969V13.5897L1.28999 14.2897C0.0399901 15.5497 0.60999 16.9997 1.28999 17.7097L4.28999 20.7097C4.82999 21.2497 5.40999 21.4497 5.95999 21.4497C6.66999 21.4497 7.31999 21.0997 7.70999 20.7097L10.41 17.9997H14C15.7 17.9997 16.56 16.9397 16.87 15.8997C18 15.5997 18.62 14.7397 18.87 13.8997C20.42 13.4997 21 12.0297 21 10.9997V7.99968H20.41L20.71 7.70968ZM19 10.9997C19 11.4497 18.81 11.9997 18 11.9997H17V12.9997C17 13.4497 16.81 13.9997 16 13.9997H15V14.9997C15 15.4497 14.81 15.9997 14 15.9997H9.58999L6.30999 19.2797C5.99999 19.5697 5.81999 19.3997 5.70999 19.2897L2.71999 16.3097C2.42999 15.9997 2.59999 15.8197 2.70999 15.7097L3.99999 14.4097V10.4097L5.99999 8.40968V9.99969C5.99999 11.2097 6.79999 12.9997 8.99999 12.9997C11.2 12.9997 12 11.2097 12 9.99969H19V10.9997ZM19.29 6.28968L17.59 7.99968H9.99999V9.99969C9.99999 10.4497 9.80999 10.9997 8.99999 10.9997C8.18999 10.9997 7.99999 10.4497 7.99999 9.99969V6.99968C7.99999 6.53968 8.16999 4.99968 9.99999 4.99968H13.41L15.69 2.71968C16 2.42968 16.18 2.59968 16.29 2.70968L19.28 5.68968C19.57 5.99968 19.4 6.17968 19.29 6.28968Z"
                                fill="white" />
                        </svg>
                    </div>
                </div>
            </div>

            <textarea class="custom__text-area" id="r-2" name="resposta-2"></textarea>

            <div class="solicite-service__container">
                <a class="btn outline" style="flex: 205px 0 1;" onclick="pauseAjax(); confirmModal('modalCancelar');">
                    Cancelar doação
                    <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M5.77 0L0.5 5.27V12.73L5.77 18H13.23L18.5 12.73V5.27L13.23 0M5.91 4L9.5 7.59L13.09 4L14.5 5.41L10.91 9L14.5 12.59L13.09 14L9.5 10.41L5.91 14L4.5 12.59L8.09 9L4.5 5.41"
                            fill="url(#paint0_linear_401_3312)" />
                        <defs>
                            <linearGradient id="paint0_linear_401_3312" x1="0.509411" y1="9.00272" x2="18.501"
                                y2="9.00272" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#9E005D" />
                                <stop offset="1" stop-color="#FF0000" />
                            </linearGradient>
                        </defs>
                    </svg>
                </a>

                <a class="btn contained" style="flex: 205px 0 1;" onclick="pauseAjax(); confirmModal('modalConcluir');">
                    Concluir doação
                    <svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M6.1368 13.5C5.98135 13.5 5.83561 13.4756 5.69958 13.4267C5.56356 13.3778 5.43725 13.2956 5.32066 13.1801L0.307221 8.17784C0.0934697 7.96457 -0.00874234 7.68809 0.000584989 7.3484C0.00991232 7.00871 0.12184 6.73262 0.336368 6.52012C0.55012 6.30685 0.822167 6.20022 1.15251 6.20022C1.48285 6.20022 1.7549 6.30685 1.96865 6.52012L6.1368 10.679L16.0179 0.81991C16.2317 0.606637 16.5088 0.5 16.8492 0.5C17.1897 0.5 17.4664 0.606637 17.6794 0.81991C17.8931 1.03318 18 1.30966 18 1.64935C18 1.98904 17.8931 2.26513 17.6794 2.47763L6.95294 13.1801C6.83635 13.2964 6.71004 13.379 6.57402 13.4279C6.438 13.4767 6.29226 13.5008 6.1368 13.5Z"
                            fill="white" />
                    </svg>
                </a>

            </div>

        </div>
    </div>

</form>
<iframe name="hidden_iframe" style="display: none;"></iframe>
<script>
function reloadPage() {
    location.reload();
}
</script>

<script src="../js/modalConfirm.js"></script>

<?php
} else if ($checkStatus === 'concluido' && ($registroSolicitacao['idSolicitante'] == $id || $registroSolicitacao['idDoador'] == $id)) {
    ?>

<form class="solicite">
    <div class="solicite-title">
        <p>Solicitar - <?php echo $registroDoacao['atividadeContribuicao']; ?> - (Concluído)</p>
    </div>

    <div class="solicite-about">
        <div class="solicite-users__imgs">
            <div class="user__img">
                <img src="../imgs/avatars/<?php echo $registroSolicitador['fotoUsuario']; ?>" alt="">
            </div>
            <svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M6.1368 13.5C5.98135 13.5 5.83561 13.4756 5.69958 13.4267C5.56356 13.3778 5.43725 13.2956 5.32066 13.1801L0.307221 8.17784C0.0934697 7.96457 -0.00874234 7.68809 0.000584989 7.3484C0.00991232 7.00871 0.12184 6.73262 0.336368 6.52012C0.55012 6.30685 0.822167 6.20022 1.15251 6.20022C1.48285 6.20022 1.7549 6.30685 1.96865 6.52012L6.1368 10.679L16.0179 0.81991C16.2317 0.606637 16.5088 0.5 16.8492 0.5C17.1897 0.5 17.4664 0.606637 17.6794 0.81991C17.8931 1.03318 18 1.30966 18 1.64935C18 1.98904 17.8931 2.26513 17.6794 2.47763L6.95294 13.1801C6.83635 13.2964 6.71004 13.379 6.57402 13.4279C6.438 13.4767 6.29226 13.5008 6.1368 13.5Z" fill="url(#paint0_linear_401_4060)" />
                <defs>
                    <linearGradient id="paint0_linear_401_4060" x1="0.00941066" y1="7.00196" x2="18.001" y2="7.00196" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#9E005D" />
                        <stop offset="1" stop-color="#FF0000" />
                    </linearGradient>
                </defs>
            </svg>
            <div class="user__img">
                <img src="../imgs/avatars/<?php echo $registroDoador['fotoUsuario']; ?>" alt="">
            </div>
        </div>

        <div class="disabeld opacity">
            <div class="who-solicites">
                <p class="solicite-text__about"><span class="contrast-name"><?php echo $registroSolicitador['nomeUsuario']; ?></span> está solicitando <span class="contrast-service">Manutenção Geral</span></p>
            </div>

            <textarea class="custom__text-area" style="height: 80px; font-size: 12px;"><?php echo $registroSolicitacao['mensagemSolicitacao']; ?></textarea>

            <div class="calendar-input__selected">
                <div class="selected-date__show">
                    <span>No dia/hora</span>
                    <div class="bg-calendar">
                        <?php include('../views/svgs/calendarInput.svg'); ?>
                    </div>
                </div>

                <div class="calendar-date__selected">
                    <span>11/05/2023 às 19h30m</span>
                </div>
            </div>

            <div class="process">
                <div class="process-solicite">
                    <p class="solicite-text__about"><span class="contrast-name">Edgar Rios</span> aprovou a solicitação <span class="contrast-service">Manutenção Geral</span></p>
                    <textarea class="custom__text-area" style="height: 80px; font-size: 12px;" name="response-message"><?php echo $registroSolicitacao['mensagemRetorno']; ?></textarea>
                </div>

                <div class="process-message active">
                    Aprovado
                    <svg width="22" height="21" viewBox="0 0 22 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20.7099 7.20944C21.9599 5.95944 21.3899 4.49944 20.7099 3.78944L17.7099 0.789441C16.4499 -0.460559 14.9999 0.109441 14.2899 0.789441L12.5899 2.49944H9.99993C8.09993 2.49944 6.99993 3.49944 6.43993 4.64944L1.99993 9.08944V13.0894L1.28993 13.7894C0.039929 15.0494 0.609929 16.4994 1.28993 17.2094L4.28993 20.2094C4.82993 20.7494 5.40993 20.9494 5.95993 20.9494C6.66993 20.9494 7.31993 20.5994 7.70993 20.2094L10.4099 17.4994H13.9999C15.6999 17.4994 16.5599 16.4394 16.8699 15.3994C17.9999 15.0994 18.6199 14.2394 18.8699 13.3994C20.4199 12.9994 20.9999 11.5294 20.9999 10.4994V7.49944H20.4099L20.7099 7.20944ZM18.9999 10.4994C18.9999 10.9494 18.8099 11.4994 17.9999 11.4994H16.9999V12.4994C16.9999 12.9494 16.8099 13.4994 15.9999 13.4994H14.9999V14.4994C14.9999 14.9494 14.8099 15.4994 13.9999 15.4994H9.58993L6.30993 18.7794C5.99993 19.0694 5.81993 18.8994 5.70993 18.7894L2.71993 15.8094C2.42993 15.4994 2.59993 15.3194 2.70993 15.2094L3.99993 13.9094V9.90944L5.99993 7.90944V9.49944C5.99993 10.7094 6.79993 12.4994 8.99993 12.4994C11.1999 12.4994 11.9999 10.7094 11.9999 9.49944H18.9999V10.4994ZM19.2899 5.78944L17.5899 7.49944H9.99993V9.49944C9.99993 9.94944 9.80993 10.4994 8.99993 10.4994C8.18993 10.4994 7.99993 9.94944 7.99993 9.49944V6.49944C7.99993 6.03944 8.16993 4.49944 9.99993 4.49944H13.4099L15.6899 2.21944C15.9999 1.92944 16.1799 2.09944 16.2899 2.20944L19.2799 5.18944C19.5699 5.49944 19.3999 5.67944 19.2899 5.78944Z" fill="white" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="process disabled">
            <div class="process-solicite">
                <p class="solicite-text__about"><span class="contrast-name"><?php echo $registroSolicitador['nomeUsuario']; ?></span> concluiu a solicitação <span class="contrast-service">Manutenção Geral</span></p>
                <textarea class="custom__text-area" style="height: 80px; font-size: 12px;" name="response-message"><?php echo $registroSolicitacao['mensagemConclusao']; ?></textarea>
            </div>

            <div class="process-message active">
                Concluído
                <svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6.1368 13.5C5.98135 13.5 5.83561 13.4756 5.69958 13.4267C5.56356 13.3778 5.43725 13.2956 5.32066 13.1801L0.307221 8.17784C0.0934697 7.96457 -0.00874234 7.68809 0.000584989 7.3484C0.00991232 7.00871 0.12184 6.73262 0.336368 6.52012C0.55012 6.30685 0.822167 6.20022 1.15251 6.20022C1.48285 6.20022 1.7549 6.30685 1.96865 6.52012L6.1368 10.679L16.0179 0.81991C16.2317 0.606637 16.5088 0.5 16.8492 0.5C17.1897 0.5 17.4664 0.606637 17.6794 0.81991C17.8931 1.03318 18 1.30966 18 1.64935C18 1.98904 17.8931 2.26513 17.6794 2.47763L6.95294 13.1801C6.83635 13.2964 6.71004 13.379 6.57402 13.4279C6.438 13.4767 6.29226 13.5008 6.1368 13.5Z" fill="white" />
                </svg>
            </div>
        </div>

    </div>
</form>

<?php
} else if (($checkStatus === 'cancelado' && $registroSolicitacao['idDoador'] == $id) || ($checkStatus === 'cancelado' && $registroSolicitacao['idSolicitante'] == $id)) {
    ?>
<form class="solicite">
    <div class="solicite-title">
        <p>Solicitar -
            <?php echo $registroDoacao['atividadeContribuicao']; ?> - (Cancelado)
        </p>
    </div>

    <div class="solicite-about">
        <div class="solicite-users__imgs">
            <div class="user__img">
                <img src="../imgs/avatars/<?php echo $registroSolicitador['fotoUsuario']; ?>" alt="">
            </div>
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M5.27 0L0 5.27V12.73L5.27 18H12.73L18 12.73V5.27L12.73 0M5.41 4L9 7.59L12.59 4L14 5.41L10.41 9L14 12.59L12.59 14L9 10.41L5.41 14L4 12.59L7.59 9L4 5.41"
                    fill="url(#paint0_linear_401_2907)" />
                <defs>
                    <linearGradient id="paint0_linear_401_2907" x1="0.00941066" y1="9.00272" x2="18.001" y2="9.00272"
                        gradientUnits="userSpaceOnUse">
                        <stop stop-color="#9E005D" />
                        <stop offset="1" stop-color="#FF0000" />
                    </linearGradient>
                </defs>
            </svg>

            <div class="user__img">
                <img src="../imgs/avatars/<?php echo $registroDoador['fotoUsuario']; ?>" alt="">
            </div>
        </div>

        <div class="disabled opacity">
            <div class="who-solicites">
                <p class="solicite-text__about"><span class="contrast-name">
                        <?php echo $registroSolicitador['nomeUsuario']; ?>
                    </span> está solicitando <span
                        class="contrast-service"><?php echo $registroDoacao['atividadeContribuicao']; ?></span></p>
            </div>

            <textarea class="custom__text-area"
                style="height: 80px; font-size: 12px;"><?php echo $registroSolicitacao['mensagemSolicitacao']; ?></textarea>

            <div class="calendar-input__selected">
                <div class="selected-date__show">
                    <span>No dia/hora</span>
                    <div class="bg-calendar">
                        <?php include('../views/svgs/calendarInput.svg'); ?>
                    </div>
                </div>

                <div class="calendar-date__selected">
                    <?php echo $registroSolicitacao['dataHorario']; ?>
                </div>
            </div>

            <div class="process">
                <div class="process-solicite">
                    <p class="solicite-text__about"><span class="contrast-name">
                            <?php echo $registroDoador['nomeUsuario']; ?>
                        </span> aprovou a solicitação
                        <span class="contrast-service">
                            <?php echo $registroDoacao['atividadeContribuicao']; ?>
                        </span>
                    </p>
                    <textarea class="custom__text-area" style="height: 80px; font-size: 12px;"
                        name="response-message"><?php echo $registroSolicitacao['mensagemRetorno']; ?></textarea>
                </div>

                <div class="process-message active">
                    Aprovado
                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M20.71 7.70968C21.96 6.45968 21.39 4.99968 20.71 4.28968L17.71 1.28968C16.45 0.0396849 15 0.609685 14.29 1.28968L12.59 2.99968H9.99999C8.09999 2.99968 6.99999 3.99968 6.43999 5.14968L1.99999 9.58969V13.5897L1.28999 14.2897C0.0399901 15.5497 0.60999 16.9997 1.28999 17.7097L4.28999 20.7097C4.82999 21.2497 5.40999 21.4497 5.95999 21.4497C6.66999 21.4497 7.31999 21.0997 7.70999 20.7097L10.41 17.9997H14C15.7 17.9997 16.56 16.9397 16.87 15.8997C18 15.5997 18.62 14.7397 18.87 13.8997C20.42 13.4997 21 12.0297 21 10.9997V7.99968H20.41L20.71 7.70968ZM19 10.9997C19 11.4497 18.81 11.9997 18 11.9997H17V12.9997C17 13.4497 16.81 13.9997 16 13.9997H15V14.9997C15 15.4497 14.81 15.9997 14 15.9997H9.58999L6.30999 19.2797C5.99999 19.5697 5.81999 19.3997 5.70999 19.2897L2.71999 16.3097C2.42999 15.9997 2.59999 15.8197 2.70999 15.7097L3.99999 14.4097V10.4097L5.99999 8.40968V9.99969C5.99999 11.2097 6.79999 12.9997 8.99999 12.9997C11.2 12.9997 12 11.2097 12 9.99969H19V10.9997ZM19.29 6.28968L17.59 7.99968H9.99999V9.99969C9.99999 10.4497 9.80999 10.9997 8.99999 10.9997C8.18999 10.9997 7.99999 10.4497 7.99999 9.99969V6.99968C7.99999 6.53968 8.16999 4.99968 9.99999 4.99968H13.41L15.69 2.71968C16 2.42968 16.18 2.59968 16.29 2.70968L19.28 5.68968C19.57 5.99968 19.4 6.17968 19.29 6.28968Z"
                            fill="white" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="process disabled">
            <div class="process-solicite">
                <p class="solicite-text__about"><span class="contrast-name">
                        <?php echo $registroSolicitacao['quemCancelou']; ?>
                    </span> cancelou a solicitação
                    <span class="contrast-service">
                        <?php echo $registroDoacao['atividadeContribuicao']; ?>
                    </span>
                </p>
                <textarea class="custom__text-area" style="height: 80px; font-size: 12px;"
                    name="response-message"><?php echo $registroSolicitacao['mensagemCancelamento']; ?></textarea>
            </div>

            <div class="process-message active">
                Cancelado
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M5.27 0L0 5.27V12.73L5.27 18H12.73L18 12.73V5.27L12.73 0M5.41 4L9 7.59L12.59 4L14 5.41L10.41 9L14 12.59L12.59 14L9 10.41L5.41 14L4 12.59L7.59 9L4 5.41"
                        fill="white" />
                </svg>
            </div>
        </div>

    </div>
</form>

<?php
} else {
    ?>
<h3>404! Solicitação não encontrada!</h3>
<?php
}
?>