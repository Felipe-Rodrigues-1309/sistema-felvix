document.getElementById('enviarDados').addEventListener('click', function() {
  const nome = document.getElementById('nome').value;
  const email = document.getElementById('email').value;

  fetch('/api/salvarDados', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({ nome: nome, email: email })
  })
  .then(response => response.json())
  .then(data => {
    if (data.sucesso) {
      // Exibir mensagem de sucesso
      alert('Dados salvos com sucesso!');
    } else {
      // Exibir mensagem de erro
      alert('Erro ao salvar os dados: ' + data.mensagem);
    }
  });
});


// modelo de envio do formulario para o banco de dados 