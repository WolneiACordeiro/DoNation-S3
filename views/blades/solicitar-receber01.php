<?php include("session_info.php"); ?>
<div class="solicite">
    <div class="solicite-title">
        <p>Solicitar - Manutenção Geral - (Pendente)</p>
    </div>

    <div class="solicite-about">
        <div class="solicite-users__imgs">
            <div class="user__img">
                <img src="../imgs/avatars/photouser01.png" alt="">
            </div>
            <svg width="15" height="4" viewBox="0 0 15 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M7.5 3.5C8.32843 3.5 9 2.82843 9 2C9 1.17157 8.32843 0.5 7.5 0.5C6.67157 0.5 6 1.17157 6 2C6 2.82843 6.67157 3.5 7.5 3.5Z" stroke="url(#paint0_linear_401_3287)" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M12.75 3.25C13.4404 3.25 14 2.69036 14 2C14 1.30964 13.4404 0.75 12.75 0.75C12.0596 0.75 11.5 1.30964 11.5 2C11.5 2.69036 12.0596 3.25 12.75 3.25Z" stroke="url(#paint1_linear_401_3287)" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M2.25 3.25C2.94036 3.25 3.5 2.69036 3.5 2C3.5 1.30964 2.94036 0.75 2.25 0.75C1.55964 0.75 1 1.30964 1 2C1 2.69036 1.55964 3.25 2.25 3.25Z" stroke="url(#paint2_linear_401_3287)" stroke-linecap="round" stroke-linejoin="round" />
                <defs>
                    <linearGradient id="paint0_linear_401_3287" x1="6.00157" y1="2.00045" x2="9.00016" y2="2.00045" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#9E005D" />
                        <stop offset="1" stop-color="#FF0000" />
                    </linearGradient>
                    <linearGradient id="paint1_linear_401_3287" x1="11.5013" y1="2.00038" x2="14.0001" y2="2.00038" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#9E005D" />
                        <stop offset="1" stop-color="#FF0000" />
                    </linearGradient>
                    <linearGradient id="paint2_linear_401_3287" x1="1.00131" y1="2.00038" x2="3.50013" y2="2.00038" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#9E005D" />
                        <stop offset="1" stop-color="#FF0000" />
                    </linearGradient>
                </defs>
            </svg>

            <div class="user__img">
                <img src="../imgs/avatars/photouser02.png" alt="">
            </div>
        </div>

        <div class="disabled">
            <div class="who-solicites">
                <p class="solicite-text__about"><span class="contrast-name">Edgar Rios</span> está solicitando <span class="contrast-service">Manutenção Geral</span></p>
            </div>

            <textarea class="custom__text-area" style="height: 80px; font-size: 12px;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores quod vel beatae voluptatem velit at assumenda libero cupiditate error quidem laborum iusto voluptas, aliquid praesentium deserunt totam rerum ullam est sit quaerat facilis. Iusto nobis ratione voluptates doloribus! Atque, labore voluptates officiis, nam dignissimos aliquam provident necessitatibus aspernatur eaque natus suscipit fuga quod. Tempora saepe magni facere sit provident, sunt, impedit quae doloribus quaerat voluptatum dicta quia et dolor fugiat optio nesciunt molestias aperiam, dolores quo. Saepe, vel esse culpa voluptates molestiae corrupti laboriosam! Soluta, odio corrupti? Molestiae voluptas itaque adipisci modi ipsam earum aperiam sint omnis beatae, ducimus temporibus quis rerum praesentium tenetur officiis dolores reiciendis natus? Delectus, obcaecati dolorem possimus voluptatem nemo officiis beatae hic laboriosam aut voluptate quis atque, ducimus temporibus a eveniet ipsam optio molestias magni id eum cum? Mollitia, cum. Sed soluta placeat ut odit corrupti repellendus incidunt enim porro! Minus sit illum laboriosam modi.</textarea>

            <div class="calendar-input__selected">
                <div class="selected-date__show">
                    <span>No dia/hora</span>
                    <div class="bg-calendar">
                        <?php include('../svgs/calendarInput.svg'); ?>
                    </div>
                </div>

                <div class="calendar-date__selected">
                    <span>11/05/2023 às 19h30m</span>
                </div>
            </div>  
        </div>

        <textarea class="custom__text-area" name="response-message">Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores quod vel beatae voluptatem velit at assumenda libero cupiditate error quidem laborum iusto voluptas, aliquid praesentium deserunt totam rerum ullam est sit quaerat facilis. Iusto nobis ratione voluptates doloribus! Atque, labore voluptates officiis, nam dignissimos aliquam provident necessitatibus aspernatur eaque natus suscipit fuga quod. Tempora saepe magni facere sit provident, sunt, impedit quae doloribus quaerat voluptatum dicta quia et dolor fugiat optio nesciunt molestias aperiam, dolores quo. Saepe, vel esse culpa voluptates molestiae corrupti laboriosam! Soluta, odio corrupti? Molestiae voluptas itaque adipisci modi ipsam earum aperiam sint omnis beatae, ducimus temporibus quis rerum praesentium tenetur officiis dolores reiciendis natus? Delectus, obcaecati dolorem possimus voluptatem nemo officiis beatae hic laboriosam aut voluptate quis atque, ducimus temporibus a eveniet ipsam optio molestias magni id eum cum? Mollitia, cum. Sed soluta placeat ut odit corrupti repellendus incidunt enim porro! Minus sit illum laboriosam modi.</textarea>

        <div class="solicite-service__container">
            <button class="btn outline" style="flex: 230px 0 1;" onclick="confirmModal('modalRejeitar')">
                Rejeitar
                <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5.77 0L0.5 5.27V12.73L5.77 18H13.23L18.5 12.73V5.27L13.23 0M5.91 4L9.5 7.59L13.09 4L14.5 5.41L10.91 9L14.5 12.59L13.09 14L9.5 10.41L5.91 14L4.5 12.59L8.09 9L4.5 5.41" fill="url(#paint0_linear_401_3312)" />
                    <defs>
                        <linearGradient id="paint0_linear_401_3312" x1="0.509411" y1="9.00272" x2="18.501" y2="9.00272" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#9E005D" />
                            <stop offset="1" stop-color="#FF0000" />
                        </linearGradient>
                    </defs>
                </svg>
            </button>

            <button class="btn contained" style="flex: 230px 0 1;" onclick="confirmModal('modalAprovar')">
                Aprovar
                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20.71 7.70944C21.96 6.45944 21.39 4.99944 20.71 4.28944L17.71 1.28944C16.45 0.0394408 15 0.609441 14.29 1.28944L12.59 2.99944H9.99999C8.09999 2.99944 6.99999 3.99944 6.43999 5.14944L1.99999 9.58944V13.5894L1.28999 14.2894C0.0399901 15.5494 0.60999 16.9994 1.28999 17.7094L4.28999 20.7094C4.82999 21.2494 5.40999 21.4494 5.95999 21.4494C6.66999 21.4494 7.31999 21.0994 7.70999 20.7094L10.41 17.9994H14C15.7 17.9994 16.56 16.9394 16.87 15.8994C18 15.5994 18.62 14.7394 18.87 13.8994C20.42 13.4994 21 12.0294 21 10.9994V7.99944H20.41L20.71 7.70944ZM19 10.9994C19 11.4494 18.81 11.9994 18 11.9994H17V12.9994C17 13.4494 16.81 13.9994 16 13.9994H15V14.9994C15 15.4494 14.81 15.9994 14 15.9994H9.58999L6.30999 19.2794C5.99999 19.5694 5.81999 19.3994 5.70999 19.2894L2.71999 16.3094C2.42999 15.9994 2.59999 15.8194 2.70999 15.7094L3.99999 14.4094V10.4094L5.99999 8.40944V9.99944C5.99999 11.2094 6.79999 12.9994 8.99999 12.9994C11.2 12.9994 12 11.2094 12 9.99944H19V10.9994ZM19.29 6.28944L17.59 7.99944H9.99999V9.99944C9.99999 10.4494 9.80999 10.9994 8.99999 10.9994C8.18999 10.9994 7.99999 10.4494 7.99999 9.99944V6.99944C7.99999 6.53944 8.16999 4.99944 9.99999 4.99944H13.41L15.69 2.71944C16 2.42944 16.18 2.59944 16.29 2.70944L19.28 5.68944C19.57 5.99944 19.4 6.17944 19.29 6.28944Z" fill="white" />
                </svg>

            </button>

        </div>

    </div>
</div>