function confirmModal() {
  // modal de deletar contribuição:
  const shadowBackground = document.querySelector(".shadow");
  const modalConfirm = document.querySelector(".modal-confirm");
  const cancelButton = document.getElementById("cancel-button");

  shadowBackground.classList.add("active");
  modalConfirm.classList.add("active");

  shadowBackground.addEventListener("click", () => {
    shadowBackground.classList.remove("active");
    modalConfirm.classList.remove("active");
  });

  cancelButton.addEventListener("click", () => {
    shadowBackground.classList.remove("active");
    modalConfirm.classList.remove("active");
  });
}
