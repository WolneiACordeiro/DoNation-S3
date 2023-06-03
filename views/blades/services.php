<?php include("session_info.php"); ?>
<!-- services-type__search 01 - botões -->
<div class="services-type__search">
    <div class="types-services">
        <button class="types-services__btn active">Para você</button>
        <button class="types-services__btn">Todos</button>
    </div>

    <div class="search-services">
        <input class="search-service__input" type="search" placeholder="Procurar por..." />
        <?php include('../svgs/search.svg'); ?>
    </div>
</div>

<!-- all-services 02 -->
<div class="all-services">
    <!-- codigo injetado via javascript -->
</div>

    <!-- <div class="service-card">
        <div class="service-card__img">
            <img src="../imgs/contribuicoes/mecanico.png" alt="Foto do serviço">
        </div>

        <div class="service-card__about-service">
            <div class="infos">
                <div class="photo-offer">
                    <img src="../imgs/avatars/photouser04.png" alt="Foto do ofertante">
                    <span class="type-service">Manutenção geral</span>
                </div>

                <div class="service__more-infos">
                    <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.35 7.85C10.25 7.75 10.1333 7.7 10 7.7C9.86667 7.7 9.75 7.75 9.65 7.85L6.85 10.65C6.68333 10.8167 6.64167 11 6.725 11.2C6.80833 11.4 6.96667 11.5 7.2 11.5L12.8 11.5C13.0333 11.5 13.1917 11.4 13.275 11.2C13.3583 11 13.3167 10.8167 13.15 10.65L10.35 7.85ZM10 0.500001C11.3833 0.500001 12.6833 0.762667 13.9 1.288C15.1167 1.81333 16.175 2.52567 17.075 3.425C17.975 4.325 18.6873 5.38333 19.212 6.6C19.7367 7.81667 19.9993 9.11667 20 10.5C20 11.8833 19.7373 13.1833 19.212 14.4C18.6867 15.6167 17.9743 16.675 17.075 17.575C16.175 18.475 15.1167 19.1873 13.9 19.712C12.6833 20.2367 11.3833 20.4993 10 20.5C8.61667 20.5 7.31667 20.2373 6.1 19.712C4.88333 19.1867 3.825 18.4743 2.925 17.575C2.025 16.675 1.31233 15.6167 0.787 14.4C0.261667 13.1833 -0.000668325 11.8833 -8.74228e-07 10.5C-9.95163e-07 9.11667 0.262666 7.81667 0.787999 6.6C1.31333 5.38333 2.02566 4.325 2.925 3.425C3.825 2.525 4.88333 1.81234 6.1 1.287C7.31667 0.761668 8.61667 0.499333 10 0.500001Z" fill="url(#paint0_linear_455_732)" />
                        <defs>
                            <linearGradient id="paint0_linear_455_732" x1="19.9895" y1="10.497" x2="-0.00106979" y2="10.497" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#9E005D" />
                                <stop offset="1" stop-color="#FF0000" />
                            </linearGradient>
                        </defs>
                    </svg>
                </div>
            </div>

            <div class="more-infos">

                <div class="availability">
                    Disponibilidade
                    <div class="weekdays">
                        <button class="weekday-btn active">Seg</button>
                        <button class="weekday-btn">Ter</button>
                        <button class="weekday-btn">Qua</button>
                        <button class="weekday-btn">Qui</button>
                        <button class="weekday-btn">Sex</button>
                        <button class="weekday-btn">Sab</button>
                        <button class="weekday-btn">Dom</button>
                    </div>

                    <div class="time-slots"></div>

                    <div class="description-service">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime commodi adipisci animi possimus, natus laudantium ab quaerat sed qui neque, aliquid iure porro labore voluptatibus atque a ducimus pariatur ut!
                    </div>
                </div>

                <div class="queue-solicite">
                    <div class="queue">
                        <span>Fila de espera</span>
                        <div class="notifications">08</div>
                    </div>

                    <button class="btn outline">
                        Solicitar
                        <svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0.24375 5.49062C-0.165625 4.93437 -0.046875 4.15313 0.509375 3.74375L4.46562 0.828125C5.19375 0.290625 6.07812 0 6.98438 0H17C17.5531 0 18 0.446875 18 1V3C18 3.55312 17.5531 4 17 4H15.85L14.4469 5.125C13.7375 5.69375 12.8562 6 11.9469 6H7C6.44688 6 6 5.55312 6 5C6 4.44688 6.44688 4 7 4H9.5C9.775 4 10 3.775 10 3.5C10 3.225 9.775 3 9.5 3H5.73125L1.99063 5.75625C1.43438 6.16563 0.653125 6.04688 0.24375 5.49062ZM17.7563 8.50937C18.1656 9.06562 18.0469 9.84688 17.4906 10.2563L13.5344 13.1719C12.8031 13.7094 11.9219 14 11.0125 14H1C0.446875 14 0 13.5531 0 13V11C0 10.4469 0.446875 10 1 10H2.15L3.55312 8.875C4.2625 8.30625 5.14375 8 6.05312 8H11C11.5531 8 12 8.44687 12 9C12 9.55313 11.5531 10 11 10H8.5C8.225 10 8 10.225 8 10.5C8 10.775 8.225 11 8.5 11H12.2688L16.0094 8.24375C16.5656 7.83437 17.3469 7.95312 17.7563 8.50937Z" fill="url(#paint0_linear_471_467)" />
                            <defs>
                                <linearGradient id="paint0_linear_471_467" x1="0.00941066" y1="7.00211" x2="18.001" y2="7.00211" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#9E005D" />
                                    <stop offset="1" stop-color="#FF0000" />
                                </linearGradient>
                            </defs>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

    <!--  -->