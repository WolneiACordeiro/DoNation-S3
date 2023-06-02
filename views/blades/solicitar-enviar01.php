<?php include("session_info.php"); ?>
<form class="solicite">
    <div class="solicite-title">
        <p>Solicitar - Manutenção Geral</p>
    </div>

    <div class="solicite-about">
        <div class="solicite-users__imgs">
            <div class="user__img">
                <img src="../imgs/avatars/photouser01.png" alt="">
            </div>
            <svg width="24" height="18" viewBox="0 0 24 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9.66935 0.484308C9.97754 0.807178 10.1255 1.19731 10.1131 1.65471C10.1008 2.11211 9.94004 2.50224 9.63083 2.82511L5.27771 7.38565L22.4591 7.38565C22.8957 7.38565 23.2619 7.54063 23.5577 7.85058C23.8536 8.16054 24.001 8.54368 24 9C24 9.4574 23.8521 9.84108 23.5562 10.151C23.2603 10.461 22.8946 10.6154 22.4591 10.6144L5.27771 10.6144L9.66935 15.2152C9.97754 15.5381 10.1316 15.9218 10.1316 16.3663C10.1316 16.8108 9.97754 17.1939 9.66935 17.5157C9.36117 17.8386 8.99494 18 8.57067 18C8.1464 18 7.78069 17.8386 7.47353 17.5157L0.423782 10.13C0.269689 9.96861 0.160281 9.79372 0.0955612 9.60538C0.030843 9.41704 -0.00100403 9.21525 2.40087e-05 9C2.39899e-05 8.78476 0.032386 8.58296 0.0971042 8.39462C0.161824 8.20628 0.270715 8.03139 0.423781 7.86996L7.51205 0.44395C7.79456 0.147985 8.14743 1.38588e-06 8.57067 1.34887e-06C8.99391 1.31187e-06 9.36014 0.161437 9.66935 0.484308Z" fill="url(#paint0_linear_401_1618)" />
                <defs>
                    <linearGradient id="paint0_linear_401_1618" x1="23.9875" y1="8.99728" x2="-0.0012812" y2="8.99729" gradientUnits="userSpaceOnUse">
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

        <div class="solicite-service__container">
            <button class="btn outline">
                Solicitar
                <?php include('../svgs/hands.svg'); ?>
            </button>

        </div>

    </div>
</form>