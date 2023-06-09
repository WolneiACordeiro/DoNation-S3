<?php include("session_info.php"); ?>
<div class="about">
    <div style="align-items: center; gap: 12px;">
        <img class="img-comunity selected" src="../imgs/comunidades/comunidade01.png" alt="Comunidade" />
        <div class="name-divisory">
            <span class="name-comunity">Grupo dos Moradores de SM</span>
            <div class="divisory"></div>
        </div>
    </div>

    <div class="menu">
        <div style="align-items: center; gap: 12px;">
            <div class="community-participants">
                <div><img src="../imgs/avatars/photouser01.png" alt=""></div>
                <div><img src="../imgs/avatars/photouser02.png" alt=""></div>
                <div><img src="../imgs/avatars/photouser03.png" alt=""></div>
            </div>

            <div class="number-users">
                <span>68</span>
                <?php include('../svgs/user.svg'); ?>
            </div>
        </div>

        <button class="about-menu__button">
            <?php include('../svgs/menu.svg'); ?>
        </button>
    </div>

</div>