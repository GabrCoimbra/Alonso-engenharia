<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

use App\Proposta;

class PropostaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('proposta.index');
    }
    public function listar()
    {
        $proposta = DB::table('TB_Proposta as p')
            ->select(
                'p.*',
                'c.nm_Responsavel',
                'c.cd_Cliente'
            )
            ->join('TB_Cliente as c', 'c.cd_Cliente', '=', 'p.cd_Cliente')
            ->get();
        return view('proposta.listar', compact('proposta'));
    }
    public function filtro(Request $request)
    {
        switch($request->tipo){
            case 'nm_Responsavel':
                $proposta = DB::table('TB_Proposta as p')
            ->select(
                'p.*',
                'c.nm_Responsavel',
                'c.cd_Cliente'
            )
            ->join('TB_Cliente as c', 'c.cd_Cliente', '=', 'p.cd_Cliente')
            ->where('c.nm_Responsavel', 'like', '%'.$request->busca.'%')
            ->get();
            break;
            case 'ic_Aberto':
                $busca = $request->busca == 'aberto' ? '1' :'0';
                $proposta = DB::table('TB_Proposta as p')
                ->select(
                    'p.*',
                    'c.nm_Responsavel',
                    'c.cd_Cliente'
                )
                ->join('TB_Cliente as c', 'c.cd_Cliente', '=', 'p.cd_Cliente')
                ->where('p.ic_Aberto', $busca)
                ->get();
            break;
            case 'dt_Registro':
                $proposta = DB::table('TB_Proposta as p')
                ->select(
                    'p.*',
                    'c.nm_Responsavel',
                    'c.cd_Cliente'
                )
                ->join('TB_Cliente as c', 'c.cd_Cliente', '=', 'p.cd_Cliente')
                ->where('p.dt_Registro', 'like', '%'.$request->busca.'%')
                ->get(); 
                break;
        }
        return view('proposta.listar', compact('proposta'));
        
    }
    public function cadastro()
    {
        $clientes = \App\Cliente::all();
        return view('proposta.cadastro',compact('clientes'));
    }
    public function adicionar(Request $request)
    {
        $file = $request->file('ds_Arquivo');
        $path = $file->store('/public');
        $dados =$request->all();
        $fileArray= ['ds_Arquivo' => $path];
        $proposta = Proposta::create(array_merge(
            $dados,
            $fileArray
        ));;
    
        return redirect('proposta/listar');
    }
    public function editar($id)
    {
        $proposta = Proposta::find($id);
        $clientes = \App\Cliente::all();
        return view('proposta.editar', compact('proposta','clientes'));
    }
    public function exportar()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
    
    public function update(Request $request, $id)
    {
        
        var_dump($request->input('cd_Cliente'));
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
