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
      "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime commodi adipisci animi possimus, natus laudantium ab quaerat sed qui neque, aliquid iure porro labore voluptatibus atque a ducimus pariatur ut!",
    filaEspera: 8,
  },
  // adicione mais objetos conforme necessário
];

const buildTimeSlotsHTML = (horarios) => {
  return horarios
    .map(
      (horario, index) =>
        `<div class="time-slot ${index % 2 === 0 ? "even" : "odd"}">
            <span class="start-time">${horario.inicio}</span> às <span class="end-time">${horario.fim}</span>
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
            <span class="start-time">${horario.inicio}</span> às <span class="end-time">${horario.fim}</span>
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
          <!-- Coloque o SVG aqui -->
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
          <button class="btn outline">
            Solicitar
            <!-- Coloque o SVG aqui -->
          </button>
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


// // services-type__search 01 - botões
// const typesServicesBtn = document.querySelectorAll(".types-services__btn");

// typesServicesBtn.forEach((typeServiceBtn) => {
//   typeServiceBtn.addEventListener("click", () => {
//     if (!typeServiceBtn.classList.contains("active")) {
//       typesServicesBtn.forEach((typeService) => {
//         typeService.classList.remove("active");
//       });
//       typeServiceBtn.classList.add("active");
//     }
//   });
// });

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
