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
            'ds_Razao_Social'     => 'required|max:100',
            'nm_Fantasia'    => 'required|max:100',
            'cd_CNPJ'             => 'required|max:100',
            'ds_Endereco'         => 'required|max:100',
            'ds_Email'            => 'required|max:100|email',
            'cd_Telefone'         => 'required|max:100',
            'nm_Responsavel' => 'required|max:100',
            'cd_CPF'              => 'required|max:100',
            'cd_Celular'          => 'required|max:100'
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
