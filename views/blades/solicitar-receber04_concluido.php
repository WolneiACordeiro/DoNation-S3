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
            <svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M6.1368 13.5C5.98135 13.5 5.83561 13.4756 5.69958 13.4267C5.56356 13.3778 5.43725 13.2956 5.32066 13.1801L0.307221 8.17784C0.0934697 7.96457 -0.00874234 7.68809 0.000584989 7.3484C0.00991232 7.00871 0.12184 6.73262 0.336368 6.52012C0.55012 6.30685 0.822167 6.20022 1.15251 6.20022C1.48285 6.20022 1.7549 6.30685 1.96865 6.52012L6.1368 10.679L16.0179 0.81991C16.2317 0.606637 16.5088 0.5 16.8492 0.5C17.1897 0.5 17.4664 0.606637 17.6794 0.81991C17.8931 1.03318 18 1.30966 18 1.64935C18 1.98904 17.8931 2.26513 17.6794 2.47763L6.95294 13.1801C6.83635 13.2964 6.71004 13.379 6.57402 13.4279C6.438 13.4767 6.29226 13.5008 6.1368 13.5Z" fill="url(#paint0_linear_401_4060)" />
                <defs>
                    <linearGradient id="paint0_linear_401_4060" x1="0.00941066" y1="7.00196" x2="18.001" y2="7.00196" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#9E005D" />
                        <stop offset="1" stop-color="#FF0000" />
                    </linearGradient>
                </defs>
            </svg>
            <div class="user__img">
                <img src="../imgs/avatars/photouser02.png" alt="">
            </div>
        </div>

        <div class="disabeld opacity">
            <div class="who-solicites">
                <p class="solicite-text__about"><span class="contrast-name">Edgar Rios</span> está solicitando <span class="contrast-service">Manutenção Geral</span></p>
            </div>

            <textarea class="custom__text-area" style="height: 80px; font-size: 12px;">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fuga, repellendus?</textarea>

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

            <div class="process">
                <div class="process-solicite">
                    <p class="solicite-text__about"><span class="contrast-name">Edgar Rios</span> aprovou a solicitação <span class="contrast-service">Manutenção Geral</span></p>
                    <textarea class="custom__text-area" style="height: 80px; font-size: 12px;" name="response-message">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque, blanditiis.</textarea>
                </div>

                <div class="process-message active">
                    Aprovado
                    <svg width="22" height="21" viewBox="0 0 22 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20.7099 7.20944C21.9599 5.95944 21.3899 4.49944 20.7099 3.78944L17.7099 0.789441C16.4499 -0.460559 14.9999 0.109441 14.2899 0.789441L12.5899 2.49944H9.99993C8.09993 2.49944 6.99993 3.49944 6.43993 4.64944L1.99993 9.08944V13.0894L1.28993 13.7894C0.039929 15.0494 0.609929 16.4994 1.28993 17.2094L4.28993 20.2094C4.82993 20.7494 5.40993 20.9494 5.95993 20.9494C6.66993 20.9494 7.31993 20.5994 7.70993 20.2094L10.4099 17.4994H13.9999C15.6999 17.4994 16.5599 16.4394 16.8699 15.3994C17.9999 15.0994 18.6199 14.2394 18.8699 13.3994C20.4199 12.9994 20.9999 11.5294 20.9999 10.4994V7.49944H20.4099L20.7099 7.20944ZM18.9999 10.4994C18.9999 10.9494 18.8099 11.4994 17.9999 11.4994H16.9999V12.4994C16.9999 12.9494 16.8099 13.4994 15.9999 13.4994H14.9999V14.4994C14.9999 14.9494 14.8099 15.4994 13.9999 15.4994H9.58993L6.30993 18.7794C5.99993 19.0694 5.81993 18.8994 5.70993 18.7894L2.71993 15.8094C2.42993 15.4994 2.59993 15.3194 2.70993 15.2094L3.99993 13.9094V9.90944L5.99993 7.90944V9.49944C5.99993 10.7094 6.79993 12.4994 8.99993 12.4994C11.1999 12.4994 11.9999 10.7094 11.9999 9.49944H18.9999V10.4994ZM19.2899 5.78944L17.5899 7.49944H9.99993V9.49944C9.99993 9.94944 9.80993 10.4994 8.99993 10.4994C8.18993 10.4994 7.99993 9.94944 7.99993 9.49944V6.49944C7.99993 6.03944 8.16993 4.49944 9.99993 4.49944H13.4099L15.6899 2.21944C15.9999 1.92944 16.1799 2.09944 16.2899 2.20944L19.2799 5.18944C19.5699 5.49944 19.3999 5.67944 19.2899 5.78944Z" fill="white" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="process disabled">
            <div class="process-solicite">
                <p class="solicite-text__about"><span class="contrast-name">Edgar Rios</span> concluiu a solicitação <span class="contrast-service">Manutenção Geral</span></p>
                <textarea class="custom__text-area" style="height: 80px; font-size: 12px;" name="response-message">Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus, harum!</textarea>
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