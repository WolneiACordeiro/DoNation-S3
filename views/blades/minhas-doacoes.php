<?php include("session_info.php");

$resultados = $colecaoSolicitacao->find();

?>
<section class="container-requests">
    <div class="requests-products">
        <div class="view-requests">
            <div class="user-solicites">
                <button class="user-solicites__button active" data-target="#my-address">Dashboard</button>
                <button class="user-solicites__button" data-target="#my-cards">Minhas doações</button>
            </div>
        </div>

        <div class="view-request__solicited">
            <div class="view-card__info active" id="my-address">
                <div class="view-requests__cards">
                    <div class="user-solicites">
                        <button class="user-solicited__button active" data-target="#in-progress">Em andamento</button>
                        <button class="user-solicited__button" data-target="#completed">Concluídos</button>
                        <button class="user-solicited__button" data-target="#canceled">Cancelados</button>
                    </div>

                    <div class="view-request__process">
                        <div class="view-card__process active" id="in-progress">
                            <?php
                            // Exibir resultados usando uma estrutura HTML repetida
                            foreach ($resultados as $registroSolicitacao) {
                                $id = $_SESSION['id'];
                                $objectId = new \MongoDB\BSON\ObjectID($id);
                                $registroUsuario = $colecaoUsuario->findOne(['_id' => $objectId]);

                                $doacaoId = $registroSolicitacao['idDoacao'];
                                $donationId = new \MongoDB\BSON\ObjectID($doacaoId);
                                $registroDoacao = $colecaoContribuicao->findOne(['_id' => $donationId]);

                                $doadorId = $registroDoacao['idContribuidor'];
                                $donatorId = new \MongoDB\BSON\ObjectID($doadorId);
                                $registroDoador = $colecaoUsuario->findOne(['_id' => $donatorId]);

                                $solicitadorId = $registroSolicitacao['idSolicitante'];
                                $soliId = new \MongoDB\BSON\ObjectID($solicitadorId);
                                $registroSolicitador = $colecaoUsuario->findOne(['_id' => $soliId]);

                                if ($id == $registroSolicitacao['idDoador']) {
                            ?>
                                    <div class="view-solicite__about">
                                        <div class="infos-solicite">
                                            <div class="solicite__about">
                                                <span style="max-width: 200px; width: 100%; min-width: 155px;">
                                                    <?php echo $registroSolicitacao['nomeDoacao'] ?>
                                                </span>
                                                <div>
                                                    <img src="../imgs/avatars/<?php echo $registroUsuario['fotoUsuario']; ?>" alt="Foto usuário">
                                                    <svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M9.55376 11.6771C9.34831 11.4619 9.24969 11.2018 9.25791 10.8969C9.26612 10.5919 9.3733 10.3318 9.57945 10.1166L12.4815 7.07623H1.02729C0.736225 7.07623 0.492074 6.97291 0.294835 6.76628C0.0975959 6.55964 -0.000681303 6.30421 3.55462e-06 6C3.55462e-06 5.69507 0.0986231 5.43928 0.295862 5.23265C0.493101 5.02601 0.73691 4.92305 1.02729 4.92377H12.4815L9.55376 1.8565C9.34831 1.64125 9.24558 1.38547 9.24558 1.08915C9.24558 0.792825 9.34831 0.537399 9.55376 0.32287C9.75922 0.107623 10.0034 0 10.2862 0C10.5691 0 10.8129 0.107623 11.0176 0.32287L15.7175 5.24664C15.8202 5.35426 15.8931 5.47085 15.9363 5.59641C15.9794 5.72197 16.0007 5.8565 16 6C16 6.1435 15.9784 6.27803 15.9353 6.40359C15.8921 6.52915 15.8195 6.64574 15.7175 6.75336L10.992 11.704C10.8036 11.9013 10.5684 12 10.2862 12C10.0041 12 9.75991 11.8924 9.55376 11.6771Z" fill="#232323" />
                                                    </svg>

                                                    <img src="../imgs/avatars/<?php echo $registroSolicitador['fotoUsuario']; ?>" alt="Foto usuário">
                                                </div>
                                            </div>

                                            <div class="solicite__about__date">
                                                <span class="border-divisory">
                                                    <?php echo $registroSolicitacao['dataHorario']; ?>
                                                </span>
                                            </div>
                                        </div>

                                        <div class="edit-delete__buttons">
                                            <a href="../pages/solicite-checar.php?idSolicitacao=<?php echo $registroSolicitacao['_id'] ?>" class="btn contained" style="flex: 1 0 auto; height: 100%;">Visualizar
                                                Solicitação</a>
                                        </div>
                                    </div>

                                <?php
                                } else if ($id == $registroSolicitacao['idSolicitante']) {
                                ?>

                                    <div class="view-solicite__about">
                                        <div class="infos-solicite">
                                            <div class="solicite__about">
                                                <span style="max-width: 200px; width: 100%; min-width: 155px;">
                                                    <?php echo $registroSolicitacao['nomeDoacao'] ?>
                                                </span>
                                                <div>
                                                    <img src="../imgs/avatars/<?php echo $registroUsuario['fotoUsuario']; ?>" alt="Foto usuário">
                                                    <svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M6.44623 0.322872C6.65169 0.538118 6.75031 0.798208 6.74209 1.10314C6.73388 1.40807 6.62669 1.66816 6.42055 1.88341L3.51847 4.92377L14.9727 4.92377C15.2638 4.92377 15.5079 5.02709 15.7052 5.23372C15.9024 5.44036 16.0007 5.69579 16 6C16 6.30493 15.9014 6.56072 15.7041 6.76735C15.5069 6.97399 15.2631 7.07695 14.9727 7.07623L3.51847 7.07623L6.44624 10.1435C6.65169 10.3587 6.75442 10.6145 6.75442 10.9109C6.75442 11.2072 6.65169 11.4626 6.44624 11.6771C6.24078 11.8924 5.99663 12 5.71378 12C5.43093 12 5.18713 11.8924 4.98235 11.6771L0.28252 6.75336C0.179791 6.64574 0.106853 6.52915 0.0637069 6.40359C0.0205607 6.27803 -0.000669991 6.1435 1.47343e-05 6C1.47217e-05 5.8565 0.0215887 5.72197 0.0647349 5.59641C0.107881 5.47085 0.180476 5.35426 0.28252 5.24664L5.00803 0.295966C5.19637 0.0986566 5.43162 9.23917e-07 5.71378 8.9925e-07C5.99594 8.74583e-07 6.24009 0.107625 6.44623 0.322872Z" fill="#232323" />
                                                    </svg>
                                                    <img src="../imgs/avatars/<?php echo $registroDoador['fotoUsuario']; ?>" alt="Foto usuário">
                                                </div>
                                            </div>

                                            <div class="solicite__about__date">
                                                <span class="border-divisory">
                                                    <?php echo $registroSolicitacao['dataHorario']; ?>
                                                </span>
                                            </div>
                                        </div>

                                        <div class="edit-delete__buttons">
                                            <a href="../pages/solicite-checar.php?idSolicitacao=<?php echo $registroSolicitacao['_id'] ?>" class="btn contained" style="flex: 1 0 auto; height: 100%;">Visualizar
                                                Solicitação</a>
                                        </div>
                                    </div>
                            <?php
                                }
                            }
                            ?>
                        </div>


                        <div class="view-card__process" id="completed">
                            <!-- <div class="view-solicite__about">
                                <div class="infos-solicite">
                                    <div class="solicite__about">
                                        <span style="max-width: 200px; width: 100%; min-width: 155px;">
                                            Título
                                        </span>
                                        <div>
                                            <img src="../imgs/avatars/53e8c7c5995be145543b5a5ba76bd268.jpg" alt="Foto usuário">
                                            <svg width="21" height="22" viewBox="0 0 21 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M20.1589 7.70944C21.4089 6.45944 20.8389 4.99944 20.1589 4.28944L17.1589 1.28944C15.8989 0.0394408 14.4489 0.609441 13.7389 1.28944L12.0389 2.99944H9.4489C7.5489 2.99944 6.4489 3.99944 5.8889 5.14944L1.4489 9.58944V13.5894L0.738904 14.2894C-0.511096 15.5494 0.0589036 16.9994 0.738904 17.7094L3.7389 20.7094C4.2789 21.2494 4.8589 21.4494 5.4089 21.4494C6.1189 21.4494 6.7689 21.0994 7.1589 20.7094L9.8589 17.9994H13.4489C15.1489 17.9994 16.0089 16.9394 16.3189 15.8994C17.4489 15.5994 18.0689 14.7394 18.3189 13.8994C19.8689 13.4994 20.4489 12.0294 20.4489 10.9994V7.99944H19.8589L20.1589 7.70944ZM18.4489 10.9994C18.4489 11.4494 18.2589 11.9994 17.4489 11.9994H16.4489V12.9994C16.4489 13.4494 16.2589 13.9994 15.4489 13.9994H14.4489V14.9994C14.4489 15.4494 14.2589 15.9994 13.4489 15.9994H9.0389L5.7589 19.2794C5.4489 19.5694 5.2689 19.3994 5.1589 19.2894L2.1689 16.3094C1.8789 15.9994 2.0489 15.8194 2.1589 15.7094L3.4489 14.4094V10.4094L5.4489 8.40944V9.99944C5.4489 11.2094 6.2489 12.9994 8.4489 12.9994C10.6489 12.9994 11.4489 11.2094 11.4489 9.99944H18.4489V10.9994ZM18.7389 6.28944L17.0389 7.99944H9.4489V9.99944C9.4489 10.4494 9.2589 10.9994 8.4489 10.9994C7.6389 10.9994 7.4489 10.4494 7.4489 9.99944V6.99944C7.4489 6.53944 7.6189 4.99944 9.4489 4.99944H12.8589L15.1389 2.71944C15.4489 2.42944 15.6289 2.59944 15.7389 2.70944L18.7289 5.68944C19.0189 5.99944 18.8489 6.17944 18.7389 6.28944Z" fill="#232323" />
                                            </svg>
                                            <img src="../imgs/avatars/bee6cf7c41d010822f3be0708b7616c3.png" alt="Foto usuário">
                                        </div>
                                    </div>

                                    <div class="solicite__about__date">
                                        <span class="border-divisory">19/11/2023</span>
                                        <span style="border-right: 3px solid var(--preto80); padding: 0 8px;">19:00h às
                                            20:00h</span>
                                    </div>
                                </div>

                                <div class="button-solicite">
                                    <a href="#" class="btn contained" style="flex: 1 0 auto; height: 100%;">Visualizar
                                        Solicitação</a>
                                </div>
                            </div> -->
                        </div>

                        <div class="view-card__process" id="canceled">
                            <!-- <div class="nothing-request">
                                <p>
                                    Ops!
                                    <svg width="23" height="22" viewBox="0 0 23 22"' fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6.94111 0L0.5 6.44111V15.5589L6.94111 22H16.0589L22.5 15.5589V6.44111L16.0589 0M7.11222 4.88889L11.5 9.27667L15.8878 4.88889L17.6111 6.61222L13.2233 11L17.6111 15.3878L15.8878 17.1111L11.5 12.7233L7.11222 17.1111L5.38889 15.3878L9.77667 11L5.38889 6.61222" fill="url(#paint0_linear_367_1723)" />
                                        <defs>
                                            <linearGradient id="paint0_linear_367_1723" x1="0.511502" y1="11.0033" x2="22.5012" y2="11.0033" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#9E005D" />
                                                <stop offset="1" stop-color="#FF0000" />
                                            </linearGradient>
                                        </defs>
                                    </svg>
                                <p>Você ainda não tem nenhuma solicitação cancelada.</p>
                            </div> -->
                        </div>

                    </div>
                </div>
            </div>

            <div class="view-card__info" id="my-cards">
                <div class="view-card__edit">
                    <?php
                    $contribuicoes = $colecaoContribuicao->find();
                    // Exibir resultados usando uma estrutura HTML repetida
                    foreach ($contribuicoes as $registroContribuicao) {
                        $id = $_SESSION['id'];
                        $objectId = new \MongoDB\BSON\ObjectID($id);
                        $registroUsuario = $colecaoUsuario->findOne(['_id' => $objectId]);
                        if ($id == $registroContribuicao['idContribuidor'] && $registroContribuicao['disponibilidadeContribuicao'] == 'ativada') {
                    ?>
                        <div class="view-solicite__about">
                            <div class="infos-solicite">
                                <input type="hidden" name="idContribuicao" value="<?php echo $registroContribuicao['_id']; ?>">
                                <span>
                                    <?php echo $registroContribuicao['atividadeContribuicao']; ?>
                            </span>
                                <div class="solicite__about__date" style="flex: 0;">
                                    <span class="border-divisory">
                                        <?php echo $registroContribuicao['diaContribuicao']; ?>
                                    </span>
                                    <span style="border-right: 3px solid var(--preto80); padding: 0 8px;">
                                        <?php echo $registroContribuicao['dasContribuicao']; ?>h às
                                        <?php echo $registroContribuicao['ateContribuicao']; ?>h
                                    </span>
                                </div>
                            </div>

                            <div class="edit-delete__container">
                                <form class="edit-delete__buttons" action="../pages/alterar-contribuir.php" method="POST">
                                    <input type="hidden" value="<?php echo $registroContribuicao['_id']; ?>" name="id">
                                    <button href="../pages/alterar-contribuir.php?id=<?php echo $registroContribuicao['_id']; ?>" class="btn outline">Editar
                                        <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M7.25 17.013L11.663 16.998L21.295 7.45802C21.673 7.08003 21.881 6.57802 21.881 6.04402C21.881 5.51002 21.673 5.00802 21.295 4.63002L19.709 3.04402C18.953 2.28802 17.634 2.29202 16.884 3.04102L7.25 12.583V17.013ZM18.295 4.45802L19.884 6.04102L18.287 7.62302L16.701 6.03802L18.295 4.45802ZM9.25 13.417L15.28 7.44402L16.866 9.03002L10.837 15.001L9.25 15.006V13.417Z" fill="#232323" />
                                            <path d="M5.25 21H19.25C20.353 21 21.25 20.103 21.25 19V10.332L19.25 12.332V19H8.408C8.382 19 8.355 19.01 8.329 19.01C8.296 19.01 8.263 19.001 8.229 19H5.25V5H12.097L14.097 3H5.25C4.147 3 3.25 3.897 3.25 5V19C3.25 20.103 4.147 21 5.25 21Z" fill="#232323" />
                                        </svg>
                                    </button>
                                </form>
                                <?php $_SESSION['idExcluir'] = $registroContribuicao['_id']; ?>
                                <button name="excluir" class="btn outline" onclick="confirmModal('modalExcluir')" style="flex: 1 0 130px;height: 100%;">Excluir
                                    <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8.25 0C3.831 0 0.25 3.582 0.25 8C0.25 12.418 3.831 16 8.25 16C12.669 16 16.25 12.418 16.25 8C16.25 3.582 12.669 0 8.25 0ZM11.957 10.293C12.1445 10.4805 12.2498 10.7348 12.2498 11C12.2498 11.2652 12.1445 11.5195 11.957 11.707C11.7695 11.8945 11.5152 11.9998 11.25 11.9998C10.9848 11.9998 10.7305 11.8945 10.543 11.707L8.25 9.414L5.957 11.707C5.86435 11.8002 5.75419 11.8741 5.63285 11.9246C5.51152 11.9751 5.38141 12.001 5.25 12.001C5.11859 12.001 4.98848 11.9751 4.86715 11.9246C4.74581 11.8741 4.63565 11.8002 4.543 11.707C4.45005 11.6142 4.37632 11.504 4.32601 11.3827C4.2757 11.2614 4.2498 11.1313 4.2498 11C4.2498 10.8687 4.2757 10.7386 4.32601 10.6173C4.37632 10.496 4.45005 10.3858 4.543 10.293L6.836 8L4.543 5.707C4.35549 5.51949 4.25015 5.26518 4.25015 5C4.25015 4.73482 4.35549 4.48051 4.543 4.293C4.73051 4.10549 4.98482 4.00015 5.25 4.00015C5.51518 4.00015 5.76949 4.10549 5.957 4.293L8.25 6.586L10.543 4.293C10.7305 4.10549 10.9848 4.00015 11.25 4.00015C11.5152 4.00015 11.7695 4.10549 11.957 4.293C12.1445 4.48051 12.2498 4.73482 12.2498 5C12.2498 5.26518 12.1445 5.51949 11.957 5.707L9.664 8L11.957 10.293Z" fill="#232323" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    <?php }
                    } ?>
                </div>
            </div>
        </div>
    </div>
    <!-- </div> -->
</section>
