const requestsProducts = document.querySelectorAll(".requests-products");

requestsProducts.forEach((requestsProduct) => {
  const buttons = requestsProduct.querySelectorAll(".user-solicites__button");
  const views = requestsProduct.querySelectorAll(".view-card__info");

  buttons.forEach((button) => {
    button.addEventListener("click", () => {
      const target = button.getAttribute("data-target");

      views.forEach((view) => {
        if (view.getAttribute("id") === target) {
          view.classList.add("active");
        } else {
          view.classList.remove("active");
        }
      });

      buttons.forEach((btn) => {
        if (btn === button) {
          btn.classList.add("active");
        } else {
          btn.classList.remove("active");
        }
      });

      const targetView = requestsProduct.querySelector(target);
      if (targetView) {
        targetView.classList.add("active");
      }
    });
  });
});

// Obtém os botões e os elementos a serem exibidos
const buttons = document.querySelectorAll('.user-solicited__button');
const cards = document.querySelectorAll('.view-card__process');

// Adiciona o evento de clique aos botões
buttons.forEach(button => {
  button.addEventListener('click', () => {
    // Remove a classe 'active' de todos os botões e elementos
    buttons.forEach(btn => btn.classList.remove('active'));
    cards.forEach(card => card.classList.remove('active'));

    // Adiciona a classe 'active' ao botão clicado
    button.classList.add('active');

    // Obtém o elemento a ser exibido com base no atributo 'data-target' do botão
    const targetId = button.getAttribute('data-target');
    const targetCard = document.querySelector(targetId);

    // Adiciona a classe 'active' ao elemento a ser exibido
    targetCard.classList.add('active');
  });
});

// modal de deletar contribuição:
const deleteModalButton = document.getElementById('delete-modal__button');
const shadowBackground = document.querySelector('.shadow');

deleteModalButton.addEventListener('click', () => {

  
  shadowBackground.classList.add('active');
});

shadowBackground.addEventListener('click', () => {
  shadowBackground.classList.remove('active');
});