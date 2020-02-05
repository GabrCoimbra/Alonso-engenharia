@extends('layout.app')
@section('main')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <h2>Propostas</h2>
                <div class="form-group">
                    <form action="/proposta/filtro" method="post">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <input 
                                type="text" name="busca" class="form-control" id="exampleInputEmail1"
                                placeholder="Busca" 
                                >
                            </div>
                            <div col">
                                <select name="tipo" class="form-control" id="exampleInputEmail1">
                                    <option value="nm_Responsavel"> Nome do Responsavel</option>
                                    <option value="ic_Aberto"> Status do pedido</option>
                                    <option value="dt_Registro"> Data do Registro</option>
                                </select>
                            </div>
                            <div class="col">
                                <input
                                type="submit" value="Buscar"
                                class="btn btn-primary"
                                />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Cliente</th>
                        <th>Proposta feita</th>
                        <th>Inicio Pag.</th>
                        <th>Serviço</th>
                        <th>Qtd. Parcelas</th>
                        <th>Sinal R$</th>
                        <th>Valor das Parcelas</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($proposta as $p)
                        <tr>
                            <td>
                                <a href="/cliente/{{ $p->cd_Cliente }}">
                                    {{ $p->nm_Responsavel }}
                                </a>
                            </td>
                            <td>{{ $p->dt_Registro }}</td>
                            <td>{{ $p->dt_Inicio_Pagamento }}</td>
                            <td>{{ $p->ds_Endereco_Obra }}</td>
                            <td>{{ $p->qt_Parcelas }}</td>
                            <td>{{ $p->vl_Sinal }}</td>
                            <td>{{ $p->vl_Parcelas }}</td>
                            <td>{{ $p->vl_Total }}</td>
                            <td>@if ($p->ic_Aberto === 1) Aberto @else Fechado  @endif </td>
                            <td>
                                <a href="/proposta/{{ $p->cd_Proposta }}/editar"
                                    class="btn btn-sm btn-success">
                                    <strong>Edit</strong>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="/proposta/exportar"><div class="btn btn-secondary"> Exportar  </div></a>
        </div>
    </div>
</div>
@endsection