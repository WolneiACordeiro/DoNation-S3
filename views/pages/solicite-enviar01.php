<?php include('../blades/header.php');
session_start();
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<main class="donation">
    <header class="donation-home">
        <nav class="comunitys">
            <?php
            include('../blades/comunity.php')
                ?>
        </nav>
        <section class="donation-global">
            <div class="about-comunitys">
                <?php
                include('../blades/aboutComunity.php')
                    ?>
            </div>
            <div class="profile-services">
                <sidebar class="profile">
                    <?php include('../blades/profile.php') ?>
                </sidebar>
                <section class="services">
                    <div class="modal-error" id="modalError">
                        <div class="confirm-title" style="border-radius: 5px;">
                            <h2>Atenção</h2>
                            <p>Você não pode deixar nenhum campo vazio.</p>
                        </div>
                        <button class="cancel-button" onclick="closeError()" style="
                                width: 35px;
                                height: 35px;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                position: absolute;
                                right: -35px;
                                top: -35px;
                                background-color: var(--branco);
                                border-radius: 50%;
                                z-index: 10;
                                cursor: pointer;">
                            <svg width="17" height="16" viewBox="0 0 17 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M8.25 0C3.831 0 0.25 3.582 0.25 8C0.25 12.418 3.831 16 8.25 16C12.669 16 16.25 12.418 16.25 8C16.25 3.582 12.669 0 8.25 0ZM11.957 10.293C12.1445 10.4805 12.2498 10.7348 12.2498 11C12.2498 11.2652 12.1445 11.5195 11.957 11.707C11.7695 11.8945 11.5152 11.9998 11.25 11.9998C10.9848 11.9998 10.7305 11.8945 10.543 11.707L8.25 9.414L5.957 11.707C5.86435 11.8002 5.75419 11.8741 5.63285 11.9246C5.51152 11.9751 5.38141 12.001 5.25 12.001C5.11859 12.001 4.98848 11.9751 4.86715 11.9246C4.74581 11.8741 4.63565 11.8002 4.543 11.707C4.45005 11.6142 4.37632 11.504 4.32601 11.3827C4.2757 11.2614 4.2498 11.1313 4.2498 11C4.2498 10.8687 4.2757 10.7386 4.32601 10.6173C4.37632 10.496 4.45005 10.3858 4.543 10.293L6.836 8L4.543 5.707C4.35549 5.51949 4.25015 5.26518 4.25015 5C4.25015 4.73482 4.35549 4.48051 4.543 4.293C4.73051 4.10549 4.98482 4.00015 5.25 4.00015C5.51518 4.00015 5.76949 4.10549 5.957 4.293L8.25 6.586L10.543 4.293C10.7305 4.10549 10.9848 4.00015 11.25 4.00015C11.5152 4.00015 11.7695 4.10549 11.957 4.293C12.1445 4.48051 12.2498 4.73482 12.2498 5C12.2498 5.26518 12.1445 5.51949 11.957 5.707L9.664 8L11.957 10.293Z"
                                    fill="#232323" />
                            </svg>
                        </button>
                    </div>
                    <?php
                    include("../blades/session_info.php");

                    $id = $_SESSION['id'];
                    $objectId = new \MongoDB\BSON\ObjectID($id);
                    $registroUsuario = $colecaoUsuario->findOne(['_id' => $objectId]);

                    $doacaoId = $_GET['idDoacao'];
                    $donationId = new \MongoDB\BSON\ObjectID($doacaoId);
                    $registroDoacao = $colecaoContribuicao->findOne(['_id' => $donationId]);

                    $doadorId = $registroDoacao['idContribuidor'];
                    $donatorId = new \MongoDB\BSON\ObjectID($doadorId);
                    $registroDoador = $colecaoUsuario->findOne(['_id' => $donatorId]);
                    ?>

                    <form id="solicitarForm" style="display: inline-block;" method="POST"
                        action="../../controllers/enviarSolicitacao.php" onsubmit="return validateForm()">

                        <input type="hidden" name="destinario" id="destinatario"
                            value="<?php echo $registroDoador['emailUsuario']; ?>">
                        <input type="hidden" name="servico" id="servico"
                            value="<?php echo $registroDoacao['atividadeContribuicao']; ?>">
                        
                        <div class="shadow"></div>
                        <div class="modal-confirm" id="modalSolicitar">
                            <div class="confirm-title">
                                <h2>Atenção</h2>
                                <p>Você está prestes a solicitar essa contribuição. Você tem certeza disso?</p>
                            </div>

                            <div class="confirm-buttons">
                                <a type="input" class="btn outline" onclick="endModal(); sendEmail();">Sim,
                                    solicitar</a>
                                <a class="btn contained cancel-button">Não</a>
                            </div>
                        </div>

                        <?php if ($registroDoacao['idContribuidor'] != $id): ?>
                            <div class="solicite">
                                <input type="hidden" name="idDoacao" value="<?php echo $doacaoId ?>">
                                <div class="solicite-title">
                                    <p>Solicitar -
                                        <?php echo $registroDoacao['atividadeContribuicao']; ?>
                                    </p>
                                </div>

                                <div class="solicite-about">
                                    <div class="solicite-users__imgs">
                                        <div class="user__img">
                                            <img src="../imgs/avatars/<?php echo $registroUsuario['fotoUsuario']; ?>"
                                                alt="">
                                        </div>
                                        <svg width="24" height="18" viewBox="0 0 24 18" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M9.66935 0.484308C9.97754 0.807178 10.1255 1.19731 10.1131 1.65471C10.1008 2.11211 9.94004 2.50224 9.63083 2.82511L5.27771 7.38565L22.4591 7.38565C22.8957 7.38565 23.2619 7.54063 23.5577 7.85058C23.8536 8.16054 24.001 8.54368 24 9C24 9.4574 23.8521 9.84108 23.5562 10.151C23.2603 10.461 22.8946 10.6154 22.4591 10.6144L5.27771 10.6144L9.66935 15.2152C9.97754 15.5381 10.1316 15.9218 10.1316 16.3663C10.1316 16.8108 9.97754 17.1939 9.66935 17.5157C9.36117 17.8386 8.99494 18 8.57067 18C8.1464 18 7.78069 17.8386 7.47353 17.5157L0.423782 10.13C0.269689 9.96861 0.160281 9.79372 0.0955612 9.60538C0.030843 9.41704 -0.00100403 9.21525 2.40087e-05 9C2.39899e-05 8.78476 0.032386 8.58296 0.0971042 8.39462C0.161824 8.20628 0.270715 8.03139 0.423781 7.86996L7.51205 0.44395C7.79456 0.147985 8.14743 1.38588e-06 8.57067 1.34887e-06C8.99391 1.31187e-06 9.36014 0.161437 9.66935 0.484308Z"
                                                fill="url(#paint0_linear_401_1618)" />
                                            <defs>
                                                <linearGradient id="paint0_linear_401_1618" x1="23.9875" y1="8.99728"
                                                    x2="-0.0012812" y2="8.99729" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#9E005D" />
                                                    <stop offset="1" stop-color="#FF0000" />
                                                </linearGradient>
                                            </defs>
                                        </svg>
                                        <div class="user__img">
                                            <img src="../imgs/avatars/<?php echo $registroDoador['fotoUsuario']; ?>" alt="">
                                        </div>
                                    </div>

                                    <div class="who-solicites">
                                        <p class="solicite-text__about"><span class="contrast-name">
                                                <?php echo $registroUsuario['nomeUsuario']; ?>
                                            </span> está solicitando <span class="contrast-service">
                                                <?php echo $registroDoacao['atividadeContribuicao']; ?>
                                            </span></p>
                                    </div>

                                    <textarea class="custom__text-area" id="r-1"
                                        name="resposta-1">Olá <?php echo $registroDoador['nomeUsuario']; ?> estou enviando esta mensagem para solicitar a doação de <?php echo $registroDoacao['atividadeContribuicao']; ?></textarea>

                                    <div class="calendar-input">
                                        <span>No dia/hora</span>
                                        <div class="calendar-date">
                                            <i class="fa-solid fa-calendar-days"></i>
                                            <input type="date" id="datetime-input" name="dataHora"
                                                placeholder="__/__/____ às __h__m" readonly>
                                        </div>
                                    </div>

                                    <div class="solicite-service__container">
                                        <a class="btn outline" onclick="confirmModal('modalSolicitar');">
                                            Solicitar
                                            <?php include('../svgs/hands.svg'); ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php else: ?>
                            <h1>Você não pode pedir uma solicitação para si mesmo!</h1>
                        <?php endif; ?>

                    </form>
                </section>
            </div>
        </section>
    </header>

    <footer class="donation-footer">
        donation.com © 2022-2023 donation LTDA
    </footer>
</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="../js/profile.js"></script>
<script src="../js/calendar.js"></script>
<script src="../js/modalConfirm.js"></script>
<script>
    function sendEmail() {
        const destinatario = document.getElementById('destinatario').value;
        const servico = document.getElementById('servico').value;
        fetch('http://localhost:5000/send_email', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                destinatario,
                servico
            })
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(data.message);
                    var form = document.getElementById('solicitarForm');
                    form.submit();
                } else {
                    alert(data.message);
                }
            })
            .catch(error => {
                console.error('Erro na solicitação de envio de e-mail:', error);
                alert('Ocorreu um erro ao enviar o e-mail. Por favor, tente novamente.');
            });
    }
</script>
<script>
    sessionStorage.clear();
    async function endModal() {
        sessionStorage.setItem("modalOpen", "false");
    }
</script>

<?php include('../blades/footer.php'); ?>