const datetimeInput = document.getElementById("datetime-input");
const calendarInput = document.querySelector(".calendar-input");

flatpickr(datetimeInput, {
  enableTime: true,
  dateFormat: "d/m/Y \\à\\s H\\hi",
  minDate: "today", // Impede a seleção de datas anteriores a hoje
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