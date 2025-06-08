@extends('layout.master')

@section('content')
    <div class="container">
        <h1>Cadastro de Endereço</h1>

        <form id="cep-form">
            @csrf

            <div>
                <label>CEP</label>
                <input type="text" id="cep" name="cep" placeholder="CEP" required>
            </div>

            <div>
                <label>Logradouro</label>
                <input type="text" id="logradouro" name="logradouro" placeholder="Logradouro" required>
            </div>

            <div>
                <label>Bairro</label>
                <input type="text" id="bairro" name="bairro" placeholder="Bairro" required>
            </div>

            <div>
                <label>Cidade</label>
                <input type="text" id="cidade" name="cidade" placeholder="Cidade" required>
            </div>

            <div>
                <label>Estado</label>
                <input type="text" id="estado" name="estado" placeholder="Estado" required>
            </div>

            <div>
                <label>Rua</label>
                <input type="text" id="rua" name="rua" placeholder="Rua">
            </div>

            <div>
                <label>Número</label>
                <input type="text" id="numero" name="numero" placeholder="Número" required>
            </div>

            <button type="submit">Salvar</button>
        </form>

        <div id="mensagem" style="margin-top: 15px;"></div>
    </div>
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#cep').on('blur', function () {
                const cep = $(this).val().replace(/\D/g, '');
                if (cep.length !== 8) {
                    $('#mensagem').text('CEP inválido.');
                    return;
                }

                $.getJSON(`https://viacep.com.br/ws/${cep}/json/`, function (data) {
                    if (data.erro) {
                        $('#mensagem').text('CEP não encontrado.');
                        return;
                    }

                    $('#logradouro').val(data.logradouro);
                    $('#bairro').val(data.bairro);
                    $('#cidade').val(data.localidade);
                    $('#estado').val(data.uf);
                }).fail(function () {
                    $('#mensagem').text('Erro ao buscar CEP.');
                });
            });

            $('#cep-form').on('submit', function (e) {
                e.preventDefault();

                $.ajax({
                    url: "{{ route('enderecos.store') }}",
                    type: 'POST',
                    data: {
                        _token: $('input[name="_token"]').val(),
                        cep: $('#cep').val(),
                        logradouro: $('#logradouro').val(),
                        rua: $('#rua').val(),
                        bairro: $('#bairro').val(),
                        cidade: $('#cidade').val(),
                        estado: $('#estado').val(),
                        numero: $('#numero').val()
                    },
                    success: function (response) {
                        $('#mensagem').text(response.message || 'Endereço salvo com sucesso!');
                        $('#cep-form')[0].reset();
                    },
                    error: function (xhr) {
                        $('#mensagem').text('Erro ao salvar o endereço.');
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
@endsection
