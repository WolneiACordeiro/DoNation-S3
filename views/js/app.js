// CÓDIGO JAVASCRIPT PARA MOSTRAR A IMAGEM SELECIONADA NA DIV.
const input = document.getElementById("upload-input");
const preview = document.querySelector(".upload-preview");
const defaultImage = document.getElementById("default-image");

input.addEventListener("change", function (e) {
  const file = e.target.files[0];

  const reader = new FileReader();

  reader.onload = function (e) {
    const img = document.createElement("img");
    img.src = e.target.result;

    preview.innerHTML = "";
    preview.appendChild(img);
  };

  reader.readAsDataURL(file);
});

if (!input.value) {
  defaultImage.style.display = "block";
}

// VERIFICANDO SE AS SENHAS SÃO IGUAIS.
function validarFormulario() {
  const senha = document.getElementById("senha").value;
  const repetirSenha = document.getElementById("repetir-senha").value;
  const msgError = document.querySelector(".error__equal-password");

  if (senha !== repetirSenha) {
    msgError.classList.remove("active");
    void msgError.offsetWidth;
    msgError.classList.add("active"); 

    return false;
  }

  return true;
}

