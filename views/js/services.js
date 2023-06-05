// services-type__search 01 - botões
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

// all-services 02
const servicesCardsAboutServices = document.querySelectorAll(
  ".service-card__about-service"
);

servicesCardsAboutServices.forEach((serviceCard) => {
  const infos = serviceCard.querySelector(".infos");
  const moreInfos = serviceCard.querySelector(".more-infos");

  infos.addEventListener("click", () => {
    infos.classList.toggle("active");
    moreInfos.classList.toggle("active");
  });

  const weekdayButtons = serviceCard.querySelectorAll(".weekday-btn");
  const hourServices = serviceCard.querySelectorAll(".hour-service");
  const timeSlotsContainer = serviceCard.querySelector(".time-slots");

  function updateActiveService(target) {
    hourServices.forEach((service) => {
      service.classList.remove("active");
    });

    const targetService = serviceCard.querySelector(`#${target}`);
    targetService.classList.add("active");
  }

  weekdayButtons.forEach((button) => {
    button.addEventListener("click", () => {
      weekdayButtons.forEach((btn) => {
        btn.classList.remove("active");
      });

      button.classList.add("active");

      const target = button.getAttribute("data-target");
      updateActiveService(target);
    });
  });

  const initialWeekdayButton = serviceCard.querySelector(".weekday-btn");
  const initialTarget = initialWeekdayButton.getAttribute("data-target");
  updateActiveService(initialTarget);

  function updateTimeSlots(html) {
    timeSlotsContainer.innerHTML = html;
  }
});

// FUNÇÃO DO BOTÃO "MOSTRAR MAIS" SÓ É ATIVADO QUANDO TEM MAIS DE 12 CARDS NA PÁGINA.
document.addEventListener("DOMContentLoaded", function() {
  const showMoreButton = document.getElementById("showMoreButton");
  const serviceCards = document.querySelectorAll(".service-card");
  const visibleCards = 12;
  let currentVisible = visibleCards;

  function showCards() {
    for (let i = 0; i < serviceCards.length; i++) {
      if (i < currentVisible) {
        serviceCards[i].style.display = "flex";
      } else {
        serviceCards[i].style.display = "none";
      }
    }

    if (currentVisible < serviceCards.length) {
      showMoreButton.style.display = "flex";
    } else {
      showMoreButton.style.display = "none";
    }
  }

  showCards();

  showMoreButton.addEventListener("click", function() {
    currentVisible += visibleCards;
    showCards();
  });
});

