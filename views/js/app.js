// Obtém o elemento de input, o bloco de visualização e a imagem padrão
var input = document.getElementById('upload-input');
var preview = document.querySelector('.upload-preview');
var defaultImage = document.getElementById('default-image');

// Adiciona um evento de change no input
input.addEventListener('change', function(e) {
  // Obtém o arquivo selecionado
  var file = e.target.files[0];

  // Cria um objeto FileReader
  var reader = new FileReader();

  // Define a função de callback quando a imagem estiver carregada
  reader.onload = function(e) {
    // Cria um elemento de imagem
    var img = document.createElement('img');
    img.src = e.target.result;

    // Limpa o bloco de visualização e adiciona a imagem
    preview.innerHTML = '';
    preview.appendChild(img);
  };

  // Lê o arquivo como uma URL de dados
  reader.readAsDataURL(file);
});

// Verifica se nenhuma imagem foi selecionada e exibe a imagem padrão
if (!input.value) {
  defaultImage.style.display = 'block';
}