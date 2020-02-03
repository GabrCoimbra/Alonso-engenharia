@extends('layout.app')

@section('main')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <h2>Clientes</h2>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Razão Social</th>
                        <th>Nome Fantasia</th>
                        <th>CNPJ</th>
                        <th>Endereço</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th>Nome do Responsável</th>
                        <th>CPF</th>
                        <th>Celular</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clientes as $cliente)
                        <tr>
                            <td>
                                <a href="/cliente/{{ $cliente->cd_Cliente }}">
                                    {{ $cliente->ds_Razao_Social }}
                                </a>
                            </td>
                            <td>{{ $cliente->nm_Fantasia }}</td>
                            <td>{{ $cliente->cd_CNP }}</td>
                            <td>{{ $cliente->ds_Endereco }}</td>
                            <td>{{ $cliente->ds_Email }}</td>
                            <td>{{ $cliente->cd_Telefone }}</td>
                            <td>{{ $cliente->nm_Responsavel }}</td>
                            <td>{{ $cliente->cd_CPF }}</td>
                            <td>{{ $cliente->cd_Celular }}</td>
                            <td>
                                <a href="/cliente/{{ $cliente->cd_Cliente }}/editar"
                                    class="btn btn-sm btn-success">
                                    <strong>Edit</strong>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection