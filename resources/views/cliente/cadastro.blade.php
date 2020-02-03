@extends('layout.app')
@section('main')
<div class="container">
    <div class="row">
        <div class="col-8 offset-2">
            <h2>Novo Cliente</h2>
            <form action="/cliente/adicionar" method="post">
                @csrf

                <div class="form-group">
                    <label for="razao_social">Razão Social</label>
                    <input
                        type="text" name="ds_Razao_Social"
                        id="razao_social" class="form-control"
                        value="{{ old('razao_social') }}" required
                        autocomplete=off>
                </div>

                <div class="form-group">
                    <label for="nome_fantasia">Nome Fantasia</label>
                    <input
                        type="text" name="nm_Fantasia"
                        id="nome_fantasia" class="form-control"
                        value="{{ old('nome_fantasia') }}" required
                        autocomplete=off>
                </div>

                <div class="form-group">
                    <label for="cnpj">CNPJ</label>
                    <input
                        type="number" name="cd_CNPJ"
                        id="cnpj" class="form-control"
                        value="{{ old('cnpj') }}" required
                        autocomplete=off>
                </div>

                <div class="form-group">
                    <label for="endereco">Endereço</label>
                    <input
                        type="text" name="ds_Endereco"
                        id="endereco" class="form-control"
                        value="{{ old('endereco') }}" required
                        autocomplete=off>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input
                        type="email" name="ds_Email"
                        id="email" class="form-control"
                        value="{{ old('email') }}" required
                        autocomplete=off>
                </div>

                <div class="form-group">
                    <label for="telefone">Telefone</label>
                    <input
                        type="number" name="cd_Telefone"
                        id="telefone" class="form-control"
                        value="{{ old('telefone') }}" required
                        autocomplete=off>
                </div>

                <div class="form-group">
                    <label for="nome_responsavel">Nome do Responsável</label>
                    <input
                        type="text" name="nm_Responsavel"
                        id="nome_responsavel" class="form-control"
                        value="{{ old('nome_responsavel') }}" required
                        autocomplete=off>
                </div>

                <div class="form-group">
                    <label for="cpf">CPF</label>
                    <input
                        type="number" name="cd_CPF"
                        id="cpf" class="form-control"
                        value="{{ old('cpf') }}" required
                        autocomplete=off>
                        @error('cd_CPF')
                        <strong>{{ $message }}</strong>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="celular">Celular</label>
                    <input
                        type="number" name="cd_Celular"
                        id="celular" class="form-control"
                        value="{{ old('celular') }}" required
                        autocomplete=off>
                </div>

                <input type="submit" value="Enviar" class="btn btn-primary">

            </form>
        </div>
    </div>
</div>
@endsection