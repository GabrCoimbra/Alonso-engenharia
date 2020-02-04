<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Proposta;

class PropostaController extends Controller
{
    public function index()
    {
        return view('proposta.index');
    }
    public function listar()
    {
        $propostas = Proposta::all();
        return view('proposta.listar', compact('proposta'));
    }
    public function cadastro()
    {
        return view('proposta.cadastro');
    }
    public function adicionar(Request $request)
    {
        $dados = request()->validate([
            'cd_Cliente'          => 'required|exists:clientes,id',
            'ds_Endereco_Obra'       => 'required|max:100',
            'vl_Total'            => 'required|numeric',
            'vl_Sinal'               => 'required|max:100',
            'qt_Parcelas'         => 'required|numeric',
            'vl_Parcelas'         => 'required|numeric',
            'dt_Inicio_Pagamento' => 'required|date',
            'dt_Parcelas'         => 'required|date',
            'ds_Arquivo'             => 'required',
            'ic_Aberto'              => 'required|boolean'
        ]);

        $proposta = Proposta::create($dados);
        
        return redirect('/listar');
    }
    public function editar($id)
    {
        $proposta = Proposta::find($id);
        return view('proposta.editar', compact('proposta'));
    }
    
    public function update(Request $request, $id)
    {
        $client = null;
        $client = Proposta::find($id);
        return $this->save($request->all(), $client);
    }
    public function save($fields, $client = null)
    {
        $result = $client->update($fields);
        return redirect('proposta/listar');
    }
}
