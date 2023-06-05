function confirmModal(target) {
  // modal de deletar contribuição:
  const shadowBackground = document.querySelector(".shadow");
  const modalConfirm = document.querySelector(`#${target}`);
  const cancelButtons = document.querySelectorAll(".cancel-button");

  shadowBackground.classList.add("active");
  modalConfirm.classList.add("active");

  shadowBackground.addEventListener("click", () => {
    shadowBackground.classList.remove("active");
    modalConfirm.classList.remove("active");
    localStorage.setItem('modalOpen', 'false'); // Define o modal como fechado
  });

  cancelButtons.forEach(cancelButton => {
    cancelButton.addEventListener('click', () => {
      shadowBackground.classList.remove("active");
      modalConfirm.classList.remove("active");
      localStorage.setItem('modalOpen', 'false'); // Define o modal como fechado
    });
  });

  localStorage.setItem('modalOpen', 'true'); // Define o modal como aberto
}