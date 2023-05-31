// // services-type__search 01 - botões
const typesServicesBtn = document.querySelectorAll(".types-services__btn");

typesServicesBtn.forEach((typeServiceBtn) => {
  typeServiceBtn.addEventListener("click", () => {
    if (!typeServiceBtn.classList.contains("active")) {
      typesServicesBtn.forEach((typeService) => {
        typeService.classList.remove("active");
      });
      typeServiceBtn.classList.add("active");
    }
  });
});

const allServices = document.querySelector(".all-services");

const servicos = [
  {
    imagemServico: "../imgs/contribuicoes/mecanico.png",
    fotoOfertante: "../imgs/avatars/photouser04.png",
    tipoServico: "Manutenção geral",
    diasSemana: {
      seg: [
        { inicio: "08:00", fim: "10:00" },
        { inicio: "14:00", fim: "16:00" },
        { inicio: "18:00", fim: "20:00" },
      ],
      ter: [
        { inicio: "11:00", fim: "13:00" },
        { inicio: "15:00", fim: "17:00" },
        { inicio: "19:00", fim: "21:00" },
      ],
      qua: [
        { inicio: "09:00", fim: "11:00" },
        { inicio: "13:00", fim: "15:00" },
      ],
      qui: [
        { inicio: "14:00", fim: "16:00" },
        { inicio: "18:00", fim: "20:00" },
      ],
      sex: [
        { inicio: "13:00", fim: "15:00" },
        { inicio: "17:00", fim: "19:00" },
      ],
      sab: [{ inicio: "10:00", fim: "12:00" }],
      dom: [], // domingo sem horários disponíveis
    },
    descricao:
      "Mecânica para carros novos da marca Volkswagen",
    filaEspera: 8,
  },
];

const buildTimeSlotsHTML = (horarios) => {
  return horarios
    .map(
      (horario, index) =>
        `<div class="time-slot ${index % 2 === 0 ? "even" : "odd"}">
            <span class="start-time">${
              horario.inicio
            }</span> às <span class="end-time">${horario.fim}</span>
          </div>`
    )
    .join("");
};

const buildServiceCardHTML = (servico) => {
  const weekdays = Object.keys(servico.diasSemana);
  let activeWeekday = weekdays[0]; // Defina o primeiro dia como ativo

  const buildTimeSlotsHTML = (horarios) => {
    return horarios
      .map(
        (horario, index) =>
          `<div class="time-slot ${index % 2 === 0 ? "even" : "odd"}">
            <span class="start-time">${
              horario.inicio
            }</span> às <span class="end-time">${horario.fim}</span>
          </div>`
      )
      .join("");
  };

  const timeSlotsHTML = buildTimeSlotsHTML(servico.diasSemana[activeWeekday]);

  const serviceCardHTML = `<div class="service-card">
    <div class="service-card__img">
      <img src="${servico.imagemServico}" alt="Foto do serviço">
    </div>
    <div class="service-card__about-service">
      <div class="infos">
        <div class="photo-offer">
          <img src="${servico.fotoOfertante}" alt="Foto do ofertante">
          <span class="type-service">${servico.tipoServico}</span>
        </div>
        <div class="service__more-infos">
          <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M10.35 7.85C10.25 7.75 10.1333 7.7 10 7.7C9.86667 7.7 9.75 7.75 9.65 7.85L6.85 10.65C6.68333 10.8167 6.64167 11 6.725 11.2C6.80833 11.4 6.96667 11.5 7.2 11.5L12.8 11.5C13.0333 11.5 13.1917 11.4 13.275 11.2C13.3583 11 13.3167 10.8167 13.15 10.65L10.35 7.85ZM10 0.500001C11.3833 0.500001 12.6833 0.762667 13.9 1.288C15.1167 1.81333 16.175 2.52567 17.075 3.425C17.975 4.325 18.6873 5.38333 19.212 6.6C19.7367 7.81667 19.9993 9.11667 20 10.5C20 11.8833 19.7373 13.1833 19.212 14.4C18.6867 15.6167 17.9743 16.675 17.075 17.575C16.175 18.475 15.1167 19.1873 13.9 19.712C12.6833 20.2367 11.3833 20.4993 10 20.5C8.61667 20.5 7.31667 20.2373 6.1 19.712C4.88333 19.1867 3.825 18.4743 2.925 17.575C2.025 16.675 1.31233 15.6167 0.787 14.4C0.261667 13.1833 -0.000668325 11.8833 -8.74228e-07 10.5C-9.95163e-07 9.11667 0.262666 7.81667 0.787999 6.6C1.31333 5.38333 2.02566 4.325 2.925 3.425C3.825 2.525 4.88333 1.81234 6.1 1.287C7.31667 0.761668 8.61667 0.499333 10 0.500001Z" fill="url(#paint0_linear_526_732)"/>
            <defs>
            <linearGradient id="paint0_linear_526_732" x1="19.9895" y1="10.497" x2="-0.00106979" y2="10.497" gradientUnits="userSpaceOnUse">
            <stop stop-color="#9E005D"/>
            <stop offset="1" stop-color="#FF0000"/>
            </linearGradient>
            </defs>
          </svg>
        </div>
      </div>
      <div class="more-infos">
        <div class="availability">
          <div class="weekdays">
            ${weekdays
              .map(
                (weekday) =>
                  `<button class="weekday-btn ${
                    weekday === activeWeekday ? "active" : ""
                  }">${weekday}</button>`
              )
              .join("")}
          </div>
          <div class="time-slots">
            ${timeSlotsHTML}
          </div>
          <div class="description-service">
            ${servico.descricao}
          </div>
        </div>
        <div class="queue-solicite">
          <div class="queue">
            <span>Fila de espera</span>
            <div class="notifications">${servico.filaEspera}</div>
          </div>
          <a href="../pages/solicite-enviar01.php" class="btn outline">
            Solicitar
            <svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path class="svg-path" d="M0.24375 5.49062C-0.165625 4.93437 -0.046875 4.15313 0.509375 3.74375L4.46562 0.828125C5.19375 0.290625 6.07812 0 6.98438 0H17C17.5531 0 18 0.446875 18 1V3C18 3.55312 17.5531 4 17 4H15.85L14.4469 5.125C13.7375 5.69375 12.8562 6 11.9469 6H7C6.44688 6 6 5.55312 6 5C6 4.44688 6.44688 4 7 4H9.5C9.775 4 10 3.775 10 3.5C10 3.225 9.775 3 9.5 3H5.73125L1.99063 5.75625C1.43438 6.16563 0.653125 6.04688 0.24375 5.49062ZM17.7563 8.50937C18.1656 9.06562 18.0469 9.84688 17.4906 10.2563L13.5344 13.1719C12.8031 13.7094 11.9219 14 11.0125 14H1C0.446875 14 0 13.5531 0 13V11C0 10.4469 0.446875 10 1 10H2.15L3.55312 8.875C4.2625 8.30625 5.14375 8 6.05312 8H11C11.5531 8 12 8.44687 12 9C12 9.55313 11.5531 10 11 10H8.5C8.225 10 8 10.225 8 10.5C8 10.775 8.225 11 8.5 11H12.2688L16.0094 8.24375C16.5656 7.83437 17.3469 7.95312 17.7563 8.50937Z" fill="url(#paint0_linear_471_467)" />
              <defs>
                  <linearGradient id="paint0_linear_471_467" x1="0.00941066" y1="7.00211" x2="18.001" y2="7.00211" gradientUnits="userSpaceOnUse">
                      <stop stop-color="#9E005D" />
                      <stop offset="1" stop-color="#FF0000" />
                  </linearGradient>
              </defs>
            </svg>
          </a>
        </div>
      </div>
    </div>
  </div>`;

  return serviceCardHTML;
};

const buildAllServicesHTML = () => {
  const servicesHTML = servicos
    .map((servico) => buildServiceCardHTML(servico))
    .join("");

  allServices.innerHTML = servicesHTML;
};

const handleRequestButtonClick = () => {
  console.log("Botão de solicitar clicado");
};

const handleAboutServiceClick = (event) => {
  const infos = event.currentTarget;
  const serviceCard = infos.closest(".service-card");
  const moreInfos = serviceCard.querySelector(".more-infos");

  infos.classList.toggle("active");
  moreInfos.classList.toggle("active");
};

const handleWeekdayClick = (event) => {
  const weekdayBtns = document.querySelectorAll(".weekday-btn");

  weekdayBtns.forEach((btn) => {
    btn.classList.remove("active");
  });

  event.target.classList.add("active");

  const selectedWeekday = event.target.textContent;
  console.log(`Dia da semana selecionado: ${selectedWeekday}`);

  const serviceCard = event.target.closest(".service-card");
  const timeSlotsContainer = serviceCard.querySelector(".time-slots");
  const servicoIndex = Array.from(allServices.children).indexOf(serviceCard);
  const servico = servicos[servicoIndex];

  const timeSlotsHTML = buildTimeSlotsHTML(servico.diasSemana[selectedWeekday]);
  timeSlotsContainer.innerHTML = timeSlotsHTML;
};

const addRequestButtonEvents = () => {
  const requestButtons = document.querySelectorAll(".service-card .btn");
  requestButtons.forEach((button) => {
    button.addEventListener("click", handleRequestButtonClick);
  });
};

const addServiceCardEvents = () => {
  const infosList = document.querySelectorAll(
    ".service-card__about-service .infos"
  );
  infosList.forEach((infos) => {
    infos.addEventListener("click", handleAboutServiceClick);
  });
};

const addWeekdayButtonEvents = () => {
  const weekdayBtns = document.querySelectorAll(".weekday-btn");
  weekdayBtns.forEach((btn) => {
    btn.addEventListener("click", handleWeekdayClick);
  });
};

buildAllServicesHTML();
addRequestButtonEvents();
addServiceCardEvents();
addWeekdayButtonEvents();

// // all-services 02
// const defaultActiveType = document.querySelector(".types-services__btn.active");
// defaultActiveType.classList.add("active");

// const servicesCardsAboutServices = document.querySelectorAll(
//   ".service-card__about-service"
// );

// servicesCardsAboutServices.forEach((serviceCard) => {
//   const infos = serviceCard.querySelector(".infos");
//   infos.addEventListener("click", () => {
//     const moreInfos = serviceCard.querySelector(".more-infos");

//     infos.classList.toggle("active");
//     moreInfos.classList.toggle("active");
//   });
// });

// // weekdays 03
// const weekdayButtons = document.querySelectorAll('.weekday-btn');
// const timeSlotsContainer = document.querySelector('.time-slots');

// weekdayButtons.forEach((button) => {
//   button.addEventListener('click', () => {
//     // Remove a classe 'active' de todos os botões
//     weekdayButtons.forEach((btn) => {
//       btn.classList.remove('active');
//     });

//     // Adiciona a classe 'active' apenas ao botão clicado
//     button.classList.add('active');

//     // Atualiza o conteúdo exibido com base no botão clicado (pode ser substituído por chamada a API, banco de dados, etc.)
//     const weekday = button.textContent;
//     const availableTimeSlots = getAvailableTimeSlots(weekday);
//     updateTimeSlots(availableTimeSlots);
//   });
// });

// // Exibe a disponibilidade inicial para "Seg"
// const initialWeekdayButton = document.querySelector('.weekday-btn');
// initialWeekdayButton.click();

// function getAvailableTimeSlots(weekday) {
//   // Simulação de dados de disponibilidade com base no dia da semana
//   if (weekday === 'Seg') {
//     return `
//       <div class="time-slot">
//         <span class="time-range">08:00 ás 12:00</span>|
//         <span class="time-range">14:00 ás 18:00</span>
//       </div>
//       <div class="time-slot">
//         <span class="time-range">19:00 ás 21:00</span>|
//         <span class="time-range">22:00 ás 23:00</span>
//       </div>
//     `;
//   } else if (weekday === 'Ter') {
//     return `
//       <div class="time-slot">
//         <span class="time-range">09:00 ás 13:00</span>|
//         <span class="time-range">15:00 ás 19:00</span>
//       </div>
//     `;
//   }

//   else {
//     return `
//         Sem disponibilidade de horário
//     `;
//   }
//   // E assim por diante, para cada dia da semana
//   // Retorne os horários disponíveis específicos para cada dia
// }

// function updateTimeSlots(html) {
//   timeSlotsContainer.innerHTML = html;
// }
