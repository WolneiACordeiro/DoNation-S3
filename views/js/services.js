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

// // all-services 02
const defaultActiveType = document.querySelector(".types-services__btn.active");
defaultActiveType.classList.add("active");

const servicesCardsAboutServices = document.querySelectorAll(".service-card__about-service");

servicesCardsAboutServices.forEach((serviceCard) => {
    const infos = serviceCard.querySelector(".infos");
    infos.addEventListener("click", () => {
        const moreInfos = serviceCard.querySelector(".more-infos");

        infos.classList.toggle("active");
        moreInfos.classList.toggle("active");
    });
});

// weekdays 03
const weekdayButtons = document.querySelectorAll(".weekday-btn");
const hourServices = document.querySelectorAll(".hour-service");
const timeSlotsContainer = document.querySelector(".time-slots");

function updateActiveService(target) {
    hourServices.forEach((service) => {
        service.classList.remove("active");
    });

    const targetService = document.getElementById(target);
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

const initialWeekdayButton = document.querySelector(".weekday-btn");
const initialTarget = initialWeekdayButton.getAttribute("data-target");
updateActiveService(initialTarget);

function updateTimeSlots(html) {
    timeSlotsContainer.innerHTML = html;
}