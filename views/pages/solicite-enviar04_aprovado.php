<?php include('../blades/header.php'); 
session_start();
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<div class="shadow"></div>
<form class="modal-confirm" id="modalCancelar">
    <div class="confirm-title">
        <h2>Atenção</h2>
        <p>Você está prestes a cancelar essa contribuição. Você tem certeza disso?</p>
    </div>

    <div class="confirm-buttons">
        <a href="solicite-enviar06_cancelado.php" class="btn outline">Sim, cancelar</a>
        <a class="btn contained cancel-button">Não</a>
    </div>
</form>

<form class="modal-confirm" id="modalConcluir">
    <div class="confirm-title" >
        <h2>Atenção</h2>
        <p>Você está prestes a completar essa contribuição. Você tem certeza disso?</p>
    </div>

    <div class="confirm-buttons">
        <a href="solicite-enviar05_concluido.php" class="btn outline">Sim, concluir</a>
        <a class="btn contained cancel-button">Cancelar</a>
    </div>
</form>

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
                    <?php include('../blades/solicitar-enviar04_aprovado.php'); ?>
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
<!-- <script src="../js/services.js"></script> -->

<?php include('../blades/footer.php'); ?>