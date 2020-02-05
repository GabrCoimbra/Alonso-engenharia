@extends('layout.app')
@section('main')
<div class="container">
    <div class="row">
        <div class="col-8 offset-2">
            <h2>Nova Proposta</h2>
            <form action="/proposta/atualizar/{{$proposta->cd_Proposta}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="cliente"> Cliente</label>
                    <select name="cd_Cliente" id="cd_Cliente">
                        @foreach ($clientes as $cliente)
                            <option value="{{ $cliente->cd_Cliente }}">{{$cliente->nm_Fantasia}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="endereco">Endereço da obra</label>
                    <input
                        type="text" name="ds_Endereco_Obra"
                        id="endereco" class="form-control"
                        value="{{ $proposta->ds_Endereco_Obra }}" required
                        autocomplete=off>
                </div>

                <div class="form-group">
                    <label for="total">Valor Total</label>
                    <input
                        type="total" name="vl_Total"  step=.01 
                        id="total" class="form-control"
                        value="{{ $proposta->vl_Total }}" required
                        autocomplete=off>
                </div>

                <div class="form-group">
                    <label for="sinal">Sinal</label>
                    <input
                        type="text" name="vl_Sinal"  step=.01 
                        id="sinal" class="form-control"
                        value="{{ $proposta->vl_Sinal }}" required
                        autocomplete=off>
                </div>

                <div class="form-group">
                    <label for="parcelas">Quantidade de parcelas</label>
                    <input
                        type="number" name="qt_Parcelas"
                        id="parcelas" class="form-control"
                        value="{{ $proposta->qt_Parcelas }}" required
                        autocomplete=off>
                </div>

                <div class="form-group">
                    <label for="valor_parcelas">Valor parcelas</label>
                    <input
                        type="number" name="vl_Parcelas"  step=.01 
                        id="valor_parcelas" class="form-control"
                        value="{{ $proposta->vl_Parcelas}}" required
                        autocomplete=off>
                </div>

                <div class="form-group">
                    <label for="inicio">Data inicio do pagamento</label>
                    <input
                        type="date" name="dt_Inicio_Pagamento"
                        id="inicio" class="form-control"
                        value="{{ $proposta->dt_Inicio_Pagamento }}" required
                        autocomplete=off>
                </div>

                <div class="form-group">
                    <label for="data">Data das parcelas</label>
                    <input
                        type="date" name="dt_Parcelas"
                        id="data" class="form-control"
                        value="{{ $proposta->dt_Parcelas}}" required
                        autocomplete=off>
                        @error('dt_Parcelas')
                        <strong>{{ $message }}</strong>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="anexo">Anexo</label>
                    <input
                        autocomplete=off
                        type="file" name="ds_Arquivo"
                        id="anexo" class="form-control"
                        value="{{$proposta->ds_Arquivo }}" required
                        autocomplete=off>
                </div>

                <div class="form-group">
                    <label for="cliente"> Status</label>
                    <select name="cd_Cliente">
                            <option value="1">Aberto</option>
                            <option value="0">Fechado</option>
                    </select>
                </div>

                <input type="submit" value="Enviar" class="btn btn-primary">

            </form>
        </div>
    </div>
</div>
@endsection