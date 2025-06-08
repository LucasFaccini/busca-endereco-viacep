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

@endsection
