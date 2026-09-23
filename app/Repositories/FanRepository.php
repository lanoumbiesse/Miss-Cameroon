<?php
namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class FanRepository
{
    /**
     * Get contacts paginate.
     *
     * @param  int  $nbrPages
     * @param  array  $parameters
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAll($nbrPages, $parameters)
    {
        $parametre = DB::table('parametre')->where('is_active', 1)->first();
        return DB::table('billets')
        ->where([['billets.annee', $parametre->annee],['billets.categorie','fan-club'],['status','success']])
        ->orderBy($parameters['order'],$parameters['direction'])
        
        ->paginate(5);

    }


}