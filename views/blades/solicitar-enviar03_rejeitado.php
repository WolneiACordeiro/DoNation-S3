<?php include("session_info.php"); ?>
<form class="solicite">
    <div class="solicite-title">
        <p>Solicitar - Manutenção Geral - (Rejeitado)</p>
    </div>

    <div class="solicite-about">
        <div class="solicite-users__imgs">
            <div class="user__img">
                <img src="../imgs/avatars/photouser01.png" alt="">
            </div>
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M2 18H16V20H2C1.46957 20 0.960859 19.7893 0.585786 19.4142C0.210714 19.0391 0 18.5304 0 18V4H2V18ZM18.22 0H5.78C4.8 0 4 0.8 4 1.78V14.22C4 15.2 4.8 16 5.78 16H18.22C19.2 16 20 15.2 20 14.22V1.78C20 0.8 19.2 0 18.22 0ZM17 11.6L15.6 13L12 9.4L8.4 13L7 11.6L10.6 8L7 4.4L8.4 3L12 6.6L15.6 3L17 4.4L13.4 8L17 11.6Z" fill="url(#paint0_linear_401_2047)" />
                <defs>
                    <linearGradient id="paint0_linear_401_2047" x1="0.0104563" y1="10.003" x2="20.0011" y2="10.003" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#9E005D" />
                        <stop offset="1" stop-color="#FF0000" />
                    </linearGradient>
                </defs>
            </svg>


            <div class="user__img">
                <img src="../imgs/avatars/photouser02.png" alt="">
            </div>
        </div>

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
                <p class="solicite-text__about"><span class="contrast-name">Edgar Rios</span> rejeitou a solicitação <span class="contrast-service">Manutenção Geral</span></p>
                <textarea class="custom__text-area" name="response-message"></textarea>
            </div>

            <div class="process-message active">
                Rejeitado
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2 18H16V20H2C1.46957 20 0.960859 19.7893 0.585786 19.4142C0.210714 19.0391 0 18.5304 0 18V4H2V18ZM18.22 0H5.78C4.8 0 4 0.8 4 1.78V14.22C4 15.2 4.8 16 5.78 16H18.22C19.2 16 20 15.2 20 14.22V1.78C20 0.8 19.2 0 18.22 0ZM17 11.6L15.6 13L12 9.4L8.4 13L7 11.6L10.6 8L7 4.4L8.4 3L12 6.6L15.6 3L17 4.4L13.4 8L17 11.6Z" fill="white" />
                </svg>

            </div>
        </div>

    </div>
</form>