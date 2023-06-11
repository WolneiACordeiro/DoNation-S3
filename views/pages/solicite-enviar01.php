<?php include('../blades/header.php');
session_start();
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script>
function endModal() {
    sessionStorage.setItem("modalOpen", "false");
}
</script>
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
                            <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.25 0C3.831 0 0.25 3.582 0.25 8C0.25 12.418 3.831 16 8.25 16C12.669 16 16.25 12.418 16.25 8C16.25 3.582 12.669 0 8.25 0ZM11.957 10.293C12.1445 10.4805 12.2498 10.7348 12.2498 11C12.2498 11.2652 12.1445 11.5195 11.957 11.707C11.7695 11.8945 11.5152 11.9998 11.25 11.9998C10.9848 11.9998 10.7305 11.8945 10.543 11.707L8.25 9.414L5.957 11.707C5.86435 11.8002 5.75419 11.8741 5.63285 11.9246C5.51152 11.9751 5.38141 12.001 5.25 12.001C5.11859 12.001 4.98848 11.9751 4.86715 11.9246C4.74581 11.8741 4.63565 11.8002 4.543 11.707C4.45005 11.6142 4.37632 11.504 4.32601 11.3827C4.2757 11.2614 4.2498 11.1313 4.2498 11C4.2498 10.8687 4.2757 10.7386 4.32601 10.6173C4.37632 10.496 4.45005 10.3858 4.543 10.293L6.836 8L4.543 5.707C4.35549 5.51949 4.25015 5.26518 4.25015 5C4.25015 4.73482 4.35549 4.48051 4.543 4.293C4.73051 4.10549 4.98482 4.00015 5.25 4.00015C5.51518 4.00015 5.76949 4.10549 5.957 4.293L8.25 6.586L10.543 4.293C10.7305 4.10549 10.9848 4.00015 11.25 4.00015C11.5152 4.00015 11.7695 4.10549 11.957 4.293C12.1445 4.48051 12.2498 4.73482 12.2498 5C12.2498 5.26518 12.1445 5.51949 11.957 5.707L9.664 8L11.957 10.293Z" fill="#232323" />
                            </svg>
                        </button>
                    </div>

                    <form id="solicitarForm" style="display: inline-block;" method="POST" action="../../controllers/enviarSolicitacao.php" onsubmit="return validateForm()">
                        <div class="shadow"></div>
                        <div class="modal-confirm" id="modalSolicitar">
                            <div class="confirm-title">
                                <h2>Atenção</h2>
                                <p>Você está prestes a solicitar essa contribuição. Você tem certeza disso?</p>
                            </div>

                            <div class="confirm-buttons">
                                <button type="input" class="btn outline" onclick="endModal()">Sim, solicitar</button>
                                <a class="btn contained cancel-button">Não</a>
                            </div>
                        </div>
                        <?php include('../blades/solicitar-enviar01.php'); ?>
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

<?php include('../blades/footer.php'); ?>