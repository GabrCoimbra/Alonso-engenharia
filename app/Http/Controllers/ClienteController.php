<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cliente;

class ClienteController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('cliente.index');
    }
    public function listar()
    {
        $clientes = Cliente::all();
        return view('cliente.listar', compact('clientes'));
    }
    public function cadastro()
    {
        return view('cliente.cadastro');
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
        $cliente = Cliente::create($dados);
        
        return redirect('cliente/listar');
    }
    public function editar($id)
    {
        $cliente = Cliente::find($id);
        return view('cliente.editar', compact('cliente'));
    }
    
    public function update(Request $request, $id)
    {
        $client = null;
        $client = Cliente::find($id);
        return $this->save($request->all(), $client);
    }
    public function save($fields, $client = null)
    {
        $result = $client->update($fields);
        return redirect('cliente/listar');
    }
}
