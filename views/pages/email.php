<!DOCTYPE html>
<html>
  <head>
    <title>Minha Página</title>
    <script>
      function sendEmail() {
        const destinatario = document.getElementById('destinatario').value;
        fetch('http://localhost:5000/send_email', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify({ destinatario })
        })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            alert(data.message);
          } else {
            alert(data.message);
          }
        })
        .catch(error => {
          console.error('Erro:', error);
          alert('Ocorreu um erro ao enviar o e-mail. Por favor, tente novamente.');
        });
      }
    </script>
  </head>
  <body>
    <h1>Minha Página</h1>
    <input type="text" id="destinatario" name="destinatario" placeholder="Digite o email do destinatário">
    <button onclick="sendEmail()">Enviar e-mail</button>
  </body>
</html>
