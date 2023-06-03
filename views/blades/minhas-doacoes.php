<?php include("session_info.php"); ?>
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
                            <div class="view-solicite__about">
                                <span>Manutenção Geral</span>
                                <div class="solicite__about">
                                    <img src="../imgs/avatars/photouser01.png" alt="Foto usuário">
                                    <svg width="22" height="16" viewBox="0 0 22 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13.1364 15.5695C12.8539 15.2825 12.7183 14.9357 12.7296 14.5291C12.7409 14.1226 12.8883 13.7758 13.1717 13.4888L17.1621 9.43498H1.41252C1.01231 9.43498 0.676601 9.29722 0.405398 9.0217C0.134194 8.74619 -0.000936791 8.40562 4.8876e-06 8C4.8876e-06 7.59342 0.135607 7.25238 0.40681 6.97686C0.678014 6.70134 1.01325 6.56407 1.41252 6.56502H17.1621L13.1364 2.47534C12.8539 2.18834 12.7127 1.84729 12.7127 1.4522C12.7127 1.0571 12.8539 0.716532 13.1364 0.430493C13.4189 0.143497 13.7546 0 14.1435 0C14.5325 0 14.8677 0.143497 15.1493 0.430493L21.6115 6.99552C21.7528 7.13901 21.8531 7.29447 21.9124 7.46188C21.9717 7.6293 22.0009 7.80867 22 8C22 8.19133 21.9703 8.3707 21.911 8.53812C21.8517 8.70553 21.7518 8.86099 21.6115 9.00448L15.114 15.6054C14.855 15.8685 14.5315 16 14.1435 16C13.7556 16 13.4199 15.8565 13.1364 15.5695Z" fill="#232323" />
                                    </svg>
                                    <img src="../imgs/avatars/photouser02.png" alt="Foto usuário">
                                </div>

                                <div class="solicite__about">
                                    <span>19/03/2023</span>
                                </div>

                                <div class="solicite__about">
                                    <span>19:00h às 20:00h</span>
                                </div>

                                <a href="#" class="btn contained" style="flex: 1 0 auto">Visualizar Solicitação</a>
                            </div>
                        </div>

                        <div class="view-card__process" id="completed">
                            <div class="view-solicite__about">
                                <span>Manutenção Geral</span>
                                <div class="solicite__about">
                                    <img src="../imgs/avatars/photouser01.png" alt="Foto usuário">
                                    <svg width="21" height="22" viewBox="0 0 21 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M20.1589 7.70944C21.4089 6.45944 20.8389 4.99944 20.1589 4.28944L17.1589 1.28944C15.8989 0.0394408 14.4489 0.609441 13.7389 1.28944L12.0389 2.99944H9.4489C7.5489 2.99944 6.4489 3.99944 5.8889 5.14944L1.4489 9.58944V13.5894L0.738904 14.2894C-0.511096 15.5494 0.0589036 16.9994 0.738904 17.7094L3.7389 20.7094C4.2789 21.2494 4.8589 21.4494 5.4089 21.4494C6.1189 21.4494 6.7689 21.0994 7.1589 20.7094L9.8589 17.9994H13.4489C15.1489 17.9994 16.0089 16.9394 16.3189 15.8994C17.4489 15.5994 18.0689 14.7394 18.3189 13.8994C19.8689 13.4994 20.4489 12.0294 20.4489 10.9994V7.99944H19.8589L20.1589 7.70944ZM18.4489 10.9994C18.4489 11.4494 18.2589 11.9994 17.4489 11.9994H16.4489V12.9994C16.4489 13.4494 16.2589 13.9994 15.4489 13.9994H14.4489V14.9994C14.4489 15.4494 14.2589 15.9994 13.4489 15.9994H9.0389L5.7589 19.2794C5.4489 19.5694 5.2689 19.3994 5.1589 19.2894L2.1689 16.3094C1.8789 15.9994 2.0489 15.8194 2.1589 15.7094L3.4489 14.4094V10.4094L5.4489 8.40944V9.99944C5.4489 11.2094 6.2489 12.9994 8.4489 12.9994C10.6489 12.9994 11.4489 11.2094 11.4489 9.99944H18.4489V10.9994ZM18.7389 6.28944L17.0389 7.99944H9.4489V9.99944C9.4489 10.4494 9.2589 10.9994 8.4489 10.9994C7.6389 10.9994 7.4489 10.4494 7.4489 9.99944V6.99944C7.4489 6.53944 7.6189 4.99944 9.4489 4.99944H12.8589L15.1389 2.71944C15.4489 2.42944 15.6289 2.59944 15.7389 2.70944L18.7289 5.68944C19.0189 5.99944 18.8489 6.17944 18.7389 6.28944Z" fill="#232323" />
                                    </svg>
                                    <img src="../imgs/avatars/photouser02.png" alt="Foto usuário">
                                </div>

                                <div class="solicite__about">
                                    <span>19/03/2023</span>
                                </div>

                                <div class="solicite__about">
                                    <span>19:00h às 20:00h</span>
                                </div>

                                <a href="#" class="btn contained" style="flex: 1 0 auto">Visualizar Solicitação</a>
                            </div>
                        </div>

                        <div class="view-card__process" id="canceled">
                            <div class="nothing-request">
                                <p>
                                    Ops!
                                    <svg width="23" height="22" viewBox="0 0 23 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6.94111 0L0.5 6.44111V15.5589L6.94111 22H16.0589L22.5 15.5589V6.44111L16.0589 0M7.11222 4.88889L11.5 9.27667L15.8878 4.88889L17.6111 6.61222L13.2233 11L17.6111 15.3878L15.8878 17.1111L11.5 12.7233L7.11222 17.1111L5.38889 15.3878L9.77667 11L5.38889 6.61222" fill="url(#paint0_linear_367_1723)" />
                                        <defs>
                                            <linearGradient id="paint0_linear_367_1723" x1="0.511502" y1="11.0033" x2="22.5012" y2="11.0033" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#9E005D" />
                                                <stop offset="1" stop-color="#FF0000" />
                                            </linearGradient>
                                        </defs>
                                    </svg>
                                <p>Você ainda não tem nenhuma solicitação cancelada.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="view-card__info" id="my-cards">
                <div class="view-card__edit">
                    <div class="view-solicite__about">
                        <span>Manutenção Geral</span>
                        <div class="solicite__about">
                            <img src="../imgs/avatars/photouser01.png" alt="Foto usuário">
                            <svg width="22" height="16" viewBox="0 0 22 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.1364 15.5695C12.8539 15.2825 12.7183 14.9357 12.7296 14.5291C12.7409 14.1226 12.8883 13.7758 13.1717 13.4888L17.1621 9.43498H1.41252C1.01231 9.43498 0.676601 9.29722 0.405398 9.0217C0.134194 8.74619 -0.000936791 8.40562 4.8876e-06 8C4.8876e-06 7.59342 0.135607 7.25238 0.40681 6.97686C0.678014 6.70134 1.01325 6.56407 1.41252 6.56502H17.1621L13.1364 2.47534C12.8539 2.18834 12.7127 1.84729 12.7127 1.4522C12.7127 1.0571 12.8539 0.716532 13.1364 0.430493C13.4189 0.143497 13.7546 0 14.1435 0C14.5325 0 14.8677 0.143497 15.1493 0.430493L21.6115 6.99552C21.7528 7.13901 21.8531 7.29447 21.9124 7.46188C21.9717 7.6293 22.0009 7.80867 22 8C22 8.19133 21.9703 8.3707 21.911 8.53812C21.8517 8.70553 21.7518 8.86099 21.6115 9.00448L15.114 15.6054C14.855 15.8685 14.5315 16 14.1435 16C13.7556 16 13.4199 15.8565 13.1364 15.5695Z" fill="#232323" />
                            </svg>
                            <img src="../imgs/avatars/photouser02.png" alt="Foto usuário">
                        </div>

                        <div class="solicite__about">
                            <span>19/03/2023</span>
                        </div>

                        <div class="solicite__about">
                            <span>19:00h às 20:00h</span>
                        </div>

                        <div class="edit-delete__buttons">
                            <a href="../pages/alterar-contribuir.php" class="btn outline">Editar </a>
                            <button class="btn outline" onclick="confirmModal()">Excluir</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>