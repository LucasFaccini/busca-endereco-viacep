<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <!-- Token CSRF necessário para requisições POST seguras no Laravel -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Cadastro de Endereço</title>
      <!-- Estilo embutido na página -->
    <style>
        * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        }

        body {
        font-family: Arial, sans-serif;
        background-color: #f2f4f8;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        }

        .container {
        background-color: #fff;
        padding: 30px 40px;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 400px;
        }

        h1 {
        margin-bottom: 20px;
        font-size: 24px;
        color: #2c3e50;
        text-align: center;
        }

        input[type="text"] {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 14px;
        }

        button {
        width: 100%;
        padding: 10px;
        background-color: #2ecc71;
        border: none;
        border-radius: 5px;
        color: white;
        font-size: 16px;
        cursor: pointer;
        transition: background 0.3s;
        }

        button:hover {
        background-color: #27ae60;
        }

        .mensagem {
        margin-top: 15px;
        text-align: center;
        font-weight: bold;
        }
    </style>
</head>
<body>

  <!-- Container principal centralizado -->
  <div class="container">
    <!-- Título da página -->
    <h1>Cadastro de Endereço</h1>

    <!-- Formulário com campos de endereço -->
    <form id="formEndereco">

      <!-- Campo para digitar o CEP -->
      <input type="text" id="cep" name="cep" placeholder="CEP" required><br>

      <!-- Campo preenchido automaticamente pelo CEP -->
      <input type="text" id="logradouro" name="logradouro" placeholder="Logradouro" required><br>

      <!-- Novo campo manual para Rua -->
      <input type="text" id="rua" name="rua" placeholder="Rua" required><br>

      <!-- Campo preenchido automaticamente pelo CEP -->
      <input type="text" id="bairro" name="bairro" placeholder="Bairro" required><br>

      <!-- Campo preenchido automaticamente pelo CEP -->
      <input type="text" id="cidade" name="cidade" placeholder="Cidade" required><br>

      <!-- Campo preenchido automaticamente pelo CEP -->
      <input type="text" id="estado" name="estado" placeholder="Estado" required><br>

      <!-- Campo manual para número da residência -->
      <input type="text" id="numero" name="numero" placeholder="Número" required><br>

      <!-- Botão para enviar o formulário -->
      <button type="submit">Salvar</button>
    </form>

    <!-- Div usada para exibir mensagens de sucesso ou erro -->
    <div id="mensagem" class="mensagem"></div>
  </div>

<!-- Script JavaScript para busca de CEP e envio do formulário -->
  <script>
    // Quando o campo de CEP perder o foco (evento 'blur')
    document.getElementById('cep').addEventListener('blur', function () {
      const cep = this.value.replace(/\D/g, ''); // Remove caracteres não numéricos

      // Verifica se o CEP tem 8 dígitos
      if (cep.length === 8) {
        // Consulta a API ViaCEP
        fetch(`https://viacep.com.br/ws/${cep}/json/`)
          .then(res => res.json())
          .then(data => {
            if (data.erro) {
              alert('CEP não encontrado!');
            } else {
              // Preenche os campos com os dados do endereço
              document.getElementById('logradouro').value = data.logradouro;
              document.getElementById('rua').value = data.logradouro;
              document.getElementById('bairro').value = data.bairro;
              document.getElementById('cidade').value = data.localidade;
              document.getElementById('estado').value = data.uf;
            }
          });
      }
    });

</body>
</html>