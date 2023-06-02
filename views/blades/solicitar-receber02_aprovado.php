<?php include("session_info.php"); ?>
<form class="solicite">
    <div class="solicite-title">
        <p>Solicitar - Manutenção Geral - (Aprovado)</p>
    </div>

    <div class="solicite-about">
        <div class="solicite-users__imgs">
            <div class="user__img">
                <img src="../imgs/avatars/photouser01.png" alt="">
            </div>
            <svg width="21" height="22" viewBox="0 0 21 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M20.1589 7.70944C21.4089 6.45944 20.8389 4.99944 20.1589 4.28944L17.1589 1.28944C15.8989 0.0394408 14.4489 0.609441 13.7389 1.28944L12.0389 2.99944H9.4489C7.5489 2.99944 6.4489 3.99944 5.8889 5.14944L1.4489 9.58944V13.5894L0.738904 14.2894C-0.511096 15.5494 0.0589036 16.9994 0.738904 17.7094L3.7389 20.7094C4.2789 21.2494 4.8589 21.4494 5.4089 21.4494C6.1189 21.4494 6.7689 21.0994 7.1589 20.7094L9.8589 17.9994H13.4489C15.1489 17.9994 16.0089 16.9394 16.3189 15.8994C17.4489 15.5994 18.0689 14.7394 18.3189 13.8994C19.8689 13.4994 20.4489 12.0294 20.4489 10.9994V7.99944H19.8589L20.1589 7.70944ZM18.4489 10.9994C18.4489 11.4494 18.2589 11.9994 17.4489 11.9994H16.4489V12.9994C16.4489 13.4494 16.2589 13.9994 15.4489 13.9994H14.4489V14.9994C14.4489 15.4494 14.2589 15.9994 13.4489 15.9994H9.0389L5.7589 19.2794C5.4489 19.5694 5.2689 19.3994 5.1589 19.2894L2.1689 16.3094C1.8789 15.9994 2.0489 15.8194 2.1589 15.7094L3.4489 14.4094V10.4094L5.4489 8.40944V9.99944C5.4489 11.2094 6.2489 12.9994 8.4489 12.9994C10.6489 12.9994 11.4489 11.2094 11.4489 9.99944H18.4489V10.9994ZM18.7389 6.28944L17.0389 7.99944H9.4489V9.99944C9.4489 10.4494 9.2589 10.9994 8.4489 10.9994C7.6389 10.9994 7.4489 10.4494 7.4489 9.99944V6.99944C7.4489 6.53944 7.6189 4.99944 9.4489 4.99944H12.8589L15.1389 2.71944C15.4489 2.42944 15.6289 2.59944 15.7389 2.70944L18.7289 5.68944C19.0189 5.99944 18.8489 6.17944 18.7389 6.28944Z" fill="url(#paint0_linear_401_3701)" />
                <defs>
                    <linearGradient id="paint0_linear_401_3701" x1="0.0109257" y1="11.0031" x2="20.8989" y2="11.0031" gradientUnits="userSpaceOnUse">
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

        <textarea class="custom__text-area"></textarea>

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
                <svg width="22" height="21" viewBox="0 0 22 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20.7099 7.20944C21.9599 5.95944 21.3899 4.49944 20.7099 3.78944L17.7099 0.789441C16.4499 -0.460559 14.9999 0.109441 14.2899 0.789441L12.5899 2.49944H9.99993C8.09993 2.49944 6.99993 3.49944 6.43993 4.64944L1.99993 9.08944V13.0894L1.28993 13.7894C0.039929 15.0494 0.609929 16.4994 1.28993 17.2094L4.28993 20.2094C4.82993 20.7494 5.40993 20.9494 5.95993 20.9494C6.66993 20.9494 7.31993 20.5994 7.70993 20.2094L10.4099 17.4994H13.9999C15.6999 17.4994 16.5599 16.4394 16.8699 15.3994C17.9999 15.0994 18.6199 14.2394 18.8699 13.3994C20.4199 12.9994 20.9999 11.5294 20.9999 10.4994V7.49944H20.4099L20.7099 7.20944ZM18.9999 10.4994C18.9999 10.9494 18.8099 11.4994 17.9999 11.4994H16.9999V12.4994C16.9999 12.9494 16.8099 13.4994 15.9999 13.4994H14.9999V14.4994C14.9999 14.9494 14.8099 15.4994 13.9999 15.4994H9.58993L6.30993 18.7794C5.99993 19.0694 5.81993 18.8994 5.70993 18.7894L2.71993 15.8094C2.42993 15.4994 2.59993 15.3194 2.70993 15.2094L3.99993 13.9094V9.90944L5.99993 7.90944V9.49944C5.99993 10.7094 6.79993 12.4994 8.99993 12.4994C11.1999 12.4994 11.9999 10.7094 11.9999 9.49944H18.9999V10.4994ZM19.2899 5.78944L17.5899 7.49944H9.99993V9.49944C9.99993 9.94944 9.80993 10.4994 8.99993 10.4994C8.18993 10.4994 7.99993 9.94944 7.99993 9.49944V6.49944C7.99993 6.03944 8.16993 4.49944 9.99993 4.49944H13.4099L15.6899 2.21944C15.9999 1.92944 16.1799 2.09944 16.2899 2.20944L19.2799 5.18944C19.5699 5.49944 19.3999 5.67944 19.2899 5.78944Z" fill="white" />
                </svg>
            </div>
        </div>

        <textarea class="custom__text-area" name="response-message"></textarea>


        <div class="solicite-service__container">
            <button class="btn outline">
                Cancelar
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

        </div>

    </div>
</form>