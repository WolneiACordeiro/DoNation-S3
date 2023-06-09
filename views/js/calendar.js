const datetimeInput = document.getElementById("datetime-input");
const calendarInput = document.querySelector(".calendar-input");

// Obter a hora atual exata
const currentDateTime = moment();

// Arredondar para o próximo minuto
currentDateTime.add(1, 'minutes').startOf('minute');

flatpickr(datetimeInput, {
  enableTime: true,
  dateFormat: "d/m/Y \\à\\s H\\hi",
  minDate: "today",
  minTime: currentDateTime.format("HH:mm"), 
  onChange: function (selectedDates, dateStr, instance) {
    datetimeInput.value = moment(selectedDates[0]).format(
      "DD/MM/YYYY [às] HH[h]mm[m]"
    );
    calendarInput.classList.add("active");
  },
  onClose: function (selectedDates, dateStr, instance) {
    if (!selectedDates.length) {
      calendarInput.classList.remove("active");
    }
  },
});


const modalSolicitar = document.getElementById("modalSolicitar");
const modalError = document.getElementById("modalError");
const shadowBackground = document.querySelector(".shadow");

function validateForm() {
  const datetimeInput = document.getElementById("datetime-input");

  if (datetimeInput.value === "") {
    modalSolicitar.classList.remove("active");
    modalError.classList.add("active");

    shadowBackground.addEventListener('click', () => {
      modalSolicitar.classList.remove("active");
      modalError.classList.remove("active");
      shadowBackground.classList.remove("remove");
    });

    return false;
  }

  return true;
}

function closeError() {
  modalError.classList.remove("active");
  shadowBackground.classList.remove("active");
}
