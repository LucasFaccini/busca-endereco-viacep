<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <!-- Token CSRF necessário para requisições POST seguras no Laravel -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Cadastro de Endereço</title>

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

</body>
</html>