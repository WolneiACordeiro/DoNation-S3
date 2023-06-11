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
    sessionStorage.setItem("modalOpen", "false"); // Define o modal como fechado
  });

  cancelButtons.forEach((cancelButton) => {
    cancelButton.addEventListener("click", () => {
      shadowBackground.classList.remove("active");
      modalConfirm.classList.remove("active");

      sessionStorage.setItem("modalOpen", "false"); // Define o modal como fechado
      sessionStorage.setItem("ajaxPaused", "false");
    });
  });

  sessionStorage.setItem("modalOpen", "true"); // Define o modal como aberto
  sessionStorage.setItem('ajaxPaused', 'true');
}
