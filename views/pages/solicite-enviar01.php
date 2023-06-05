<?php include('../blades/header.php');
session_start();
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

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
                    <form style="display: inline-block;" method="POST" action="../../controllers/enviarSolicitacao.php">
                        <div class="shadow"></div>
                        <div class="modal-confirm" id="modalSolicitar">
                            <div class="confirm-title">
                                <h2>Atenção</h2>
                                <p>Você está prestes a solicitar essa contribuição. Você tem certeza disso?</p>
                            </div>

                            <div class="confirm-buttons">
                                <button type="input" class="btn outline">Sim, solicitar</button>
                                <a class="btn contained cancel-button">Não</a>
                            </div>
                        </div>
                        <?php include('../blades/profile.php') ?>
                    </form>
                </sidebar>
                <section class="services">
                    <?php include('../blades/solicitar-enviar01.php'); ?>
                </section>
            </div>
        </section>
    </header>

    <footer class="donation-footer">
        donation.com © 2022-2023 donation LTDA
    </footer>
</main>
<script src="../js/profile.js"></script>
<script src="../js/calendar.js"></script>
<script src="../js/modalConfirm.js"></script>

<?php include('../blades/footer.php'); ?>