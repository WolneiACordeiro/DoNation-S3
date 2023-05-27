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
                    <?php
                        include('../blades/avatar.php')
                    ?>
                </sidebar>
                <section class="services"></section>
            </div>
        </section>
    </header>

    <footer class="donation-footer">
        donation.com © 2022-2023 donation LTDA
    </footer>
</main>
<?php include('../blades/footer.php'); ?>