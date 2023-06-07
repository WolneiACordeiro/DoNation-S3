<?php 
session_start();
include('../blades/header.php'); 
?>

<div class="shadow"></div>
<form class="modal-confirm" id="modalExcluir" action="../../controllers/excluir.php" method="post">
    <input type="hidden" name="ida" value="<?php echo $_SESSION['idExcluir']; ?>">
    <div class="confirm-title">
        <h2>Atenção</h2>
        <p>Você está prestes a deletar essa contribuição. Você tem certeza disso?</p>
    </div>

    <div class="confirm-buttons">
        <button type="submit" class="btn outline">Sim, deletar</button>
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
                    <?php include('../blades/minhas-doacoes.php'); ?>
                </section>
            </div>
        </section>
    </header>

    <footer class="donation-footer">
        donation.com © 2022-2023 donation LTDA
    </footer>
</main>

<script src="../js/profile.js"></script>
<script src="../js/dashboard.js"></script>
<script src="../js/modalConfirm.js"></script>

<?php include('../blades/footer.php'); ?>