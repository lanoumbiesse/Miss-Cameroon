<?php
namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class InscriptionsRepository
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
        return DB::table('inscriptions')
        ->where('annee', $parametre->annee)
        ->orderBy($parameters['order'],$parameters['direction'])
        ->when (($parameters['regionconcours'] !== 'all'), function ($query) use ($parameters) {
                $query->whereRegionconcours ($parameters['regionconcours']);
            })->when ($parameters['finaliste'], function ($query) {
                $query->whereFinaliste (true);
                })
        ->paginate(5);

    }


}