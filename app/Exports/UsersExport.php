<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use App\Proposta;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        
        $proposta = DB::table('TB_Proposta as p')
            ->select(
                'p.*',
                'c.nm_Responsavel',
                'c.cd_Cliente'
            )
            ->join('TB_Cliente as c', 'c.cd_Cliente', '=', 'p.cd_Cliente')
            ->get();
        return $proposta;
    }
}
