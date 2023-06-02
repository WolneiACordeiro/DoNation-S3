<?php include("session_info.php"); ?>
<form class="solicite">
    <div class="solicite-title">
        <p>Solicitar - Manutenção Geral - (Concluído)</p>
    </div>

    <div class="solicite-about">
        <div class="solicite-users__imgs">
            <div class="user__img">
                <img src="../imgs/avatars/photouser01.png" alt="">
            </div>
            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M20.71 7.70968C21.96 6.45968 21.39 4.99968 20.71 4.28968L17.71 1.28968C16.45 0.0396849 15 0.609685 14.29 1.28968L12.59 2.99968H9.99999C8.09999 2.99968 6.99999 3.99968 6.43999 5.14968L1.99999 9.58969V13.5897L1.28999 14.2897C0.0399901 15.5497 0.60999 16.9997 1.28999 17.7097L4.28999 20.7097C4.82999 21.2497 5.40999 21.4497 5.95999 21.4497C6.66999 21.4497 7.31999 21.0997 7.70999 20.7097L10.41 17.9997H14C15.7 17.9997 16.56 16.9397 16.87 15.8997C18 15.5997 18.62 14.7397 18.87 13.8997C20.42 13.4997 21 12.0297 21 10.9997V7.99968H20.41L20.71 7.70968ZM19 10.9997C19 11.4497 18.81 11.9997 18 11.9997H17V12.9997C17 13.4497 16.81 13.9997 16 13.9997H15V14.9997C15 15.4497 14.81 15.9997 14 15.9997H9.58999L6.30999 19.2797C5.99999 19.5697 5.81999 19.3997 5.70999 19.2897L2.71999 16.3097C2.42999 15.9997 2.59999 15.8197 2.70999 15.7097L3.99999 14.4097V10.4097L5.99999 8.40968V9.99969C5.99999 11.2097 6.79999 12.9997 8.99999 12.9997C11.2 12.9997 12 11.2097 12 9.99969H19V10.9997ZM19.29 6.28968L17.59 7.99968H9.99999V9.99969C9.99999 10.4497 9.80999 10.9997 8.99999 10.9997C8.18999 10.9997 7.99999 10.4497 7.99999 9.99969V6.99968C7.99999 6.53968 8.16999 4.99968 9.99999 4.99968H13.41L15.69 2.71968C16 2.42968 16.18 2.59968 16.29 2.70968L19.28 5.68968C19.57 5.99968 19.4 6.17968 19.29 6.28968Z" fill="url(#paint0_linear_401_2340)" />
                <defs>
                    <linearGradient id="paint0_linear_401_2340" x1="0.562012" y1="11.0034" x2="21.45" y2="11.0034" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#9E005D" />
                        <stop offset="1" stop-color="#FF0000" />
                    </linearGradient>
                </defs>
            </svg>
            <div class="user__img">
                <img src="../imgs/avatars/photouser02.png" alt="">
            </div>
        </div>

        <div class="reject">
            <div class="who-solicites">
                <p class="solicite-text__about"><span class="contrast-name">Edgar Rios</span> está solicitando <span class="contrast-service">Manutenção Geral</span></p>
            </div>

            <textarea class="custom__text-area">Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores quod vel beatae voluptatem velit at assumenda libero cupiditate error quidem laborum iusto voluptas, aliquid praesentium deserunt totam rerum ullam est sit quaerat facilis. Iusto nobis ratione voluptates doloribus! Atque, labore voluptates officiis, nam dignissimos aliquam provident necessitatibus aspernatur eaque natus suscipit fuga quod. Tempora saepe magni facere sit provident, sunt, impedit quae doloribus quaerat voluptatum dicta quia et dolor fugiat optio nesciunt molestias aperiam, dolores quo. Saepe, vel esse culpa voluptates molestiae corrupti laboriosam! Soluta, odio corrupti? Molestiae voluptas itaque adipisci modi ipsam earum aperiam sint omnis beatae, ducimus temporibus quis rerum praesentium tenetur officiis dolores reiciendis natus? Delectus, obcaecati dolorem possimus voluptatem nemo officiis beatae hic laboriosam aut voluptate quis atque, ducimus temporibus a eveniet ipsam optio molestias magni id eum cum? Mollitia, cum. Sed soluta placeat ut odit corrupti repellendus incidunt enim porro! Minus sit illum laboriosam modi.</textarea>

            <div class="calendar-input">
                <span>No dia/hora</span>
                <div class="calendar-date">
                    <i class="fa-solid fa-calendar-days"></i>
                    <input type="text" id="datetime-input" placeholder="__/__/____ às __h__m" readonly>
                </div>
            </div>


            <div class="process">
                <div class="process-solicite">
                    <p class="solicite-text__about"><span class="contrast-name">Edgar Rios</span> aprovou a solicitação <span class="contrast-service">Manutenção Geral</span></p>
                    <textarea class="custom__text-area" name="response-message"></textarea>
                </div>

                <div class="process-message active">
                    Aprovado
                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20.71 7.70968C21.96 6.45968 21.39 4.99968 20.71 4.28968L17.71 1.28968C16.45 0.0396849 15 0.609685 14.29 1.28968L12.59 2.99968H9.99999C8.09999 2.99968 6.99999 3.99968 6.43999 5.14968L1.99999 9.58969V13.5897L1.28999 14.2897C0.0399901 15.5497 0.60999 16.9997 1.28999 17.7097L4.28999 20.7097C4.82999 21.2497 5.40999 21.4497 5.95999 21.4497C6.66999 21.4497 7.31999 21.0997 7.70999 20.7097L10.41 17.9997H14C15.7 17.9997 16.56 16.9397 16.87 15.8997C18 15.5997 18.62 14.7397 18.87 13.8997C20.42 13.4997 21 12.0297 21 10.9997V7.99968H20.41L20.71 7.70968ZM19 10.9997C19 11.4497 18.81 11.9997 18 11.9997H17V12.9997C17 13.4497 16.81 13.9997 16 13.9997H15V14.9997C15 15.4497 14.81 15.9997 14 15.9997H9.58999L6.30999 19.2797C5.99999 19.5697 5.81999 19.3997 5.70999 19.2897L2.71999 16.3097C2.42999 15.9997 2.59999 15.8197 2.70999 15.7097L3.99999 14.4097V10.4097L5.99999 8.40968V9.99969C5.99999 11.2097 6.79999 12.9997 8.99999 12.9997C11.2 12.9997 12 11.2097 12 9.99969H19V10.9997ZM19.29 6.28968L17.59 7.99968H9.99999V9.99969C9.99999 10.4497 9.80999 10.9997 8.99999 10.9997C8.18999 10.9997 7.99999 10.4497 7.99999 9.99969V6.99968C7.99999 6.53968 8.16999 4.99968 9.99999 4.99968H13.41L15.69 2.71968C16 2.42968 16.18 2.59968 16.29 2.70968L19.28 5.68968C19.57 5.99968 19.4 6.17968 19.29 6.28968Z" fill="white" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="process">
            <div class="process-solicite">
                <p class="solicite-text__about"><span class="contrast-name">Edgar Rios</span> concluiu a solicitação <span class="contrast-service">Manutenção Geral</span></p>
                <textarea class="custom__text-area" name="response-message"></textarea>
            </div>

            <div class="process-message active">
                Concluído
                <svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6.1368 13.5C5.98135 13.5 5.83561 13.4756 5.69958 13.4267C5.56356 13.3778 5.43725 13.2956 5.32066 13.1801L0.307221 8.17784C0.0934697 7.96457 -0.00874234 7.68809 0.000584989 7.3484C0.00991232 7.00871 0.12184 6.73262 0.336368 6.52012C0.55012 6.30685 0.822167 6.20022 1.15251 6.20022C1.48285 6.20022 1.7549 6.30685 1.96865 6.52012L6.1368 10.679L16.0179 0.81991C16.2317 0.606637 16.5088 0.5 16.8492 0.5C17.1897 0.5 17.4664 0.606637 17.6794 0.81991C17.8931 1.03318 18 1.30966 18 1.64935C18 1.98904 17.8931 2.26513 17.6794 2.47763L6.95294 13.1801C6.83635 13.2964 6.71004 13.379 6.57402 13.4279C6.438 13.4767 6.29226 13.5008 6.1368 13.5Z" fill="white" />
                </svg>
            </div>
        </div>
    </div>
</form>