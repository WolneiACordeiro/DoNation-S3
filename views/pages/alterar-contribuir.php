<?php include('../blades/header.php'); ?>

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
                    <?php include('../blades/alterar-contribuir.php'); ?>
                </section>
            </div>
        </section>
    </header>

    <footer class="donation-footer">
        donation.com © 2022-2023 donation LTDA
    </footer>
</main>

<script src="../js/app.js"></script>
<script src="../js/profile.js"></script>
<script src="../js/services.js"></script>

<?php include('../blades/footer.php'); ?>