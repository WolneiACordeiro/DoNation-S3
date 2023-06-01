<?php include('../blades/header.php'); 
session_start();
require_once '../../models/conexao.php';
require_once '../../vendor/autoload.php';

if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] !== 'SIM') {
    header('Location: ../index.php?login=erro2');
    exit;
} else {
    $id = $_SESSION['id'];
    $objectId = new \MongoDB\BSON\ObjectID($id);
    $registroUsuario = $colecaoUsuario->findOne(['_id' => $objectId]);
    $contribuicao = $colecaoContribuicao->find();
}
?>

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
                    <?php include('../blades/services.php'); ?>
                </section>
            </div>
        </section>
    </header>

    <footer class="donation-footer">
        donation.com © 2022-2023 donation LTDA
    </footer>
</main>

<script src="../js/profile.js"></script>
<script src="../js/services.js"></script>

<?php include('../blades/footer.php'); ?>