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
      //  $parameters['status'] = !$parameters['status'];
        $parametre = DB::table('parametre')->where('is_active', 1)->first();
        return DB::table('inscriptions')
        ->where('inscriptions.annee', $parametre->annee)
        ->orderBy('created_at','desc')
         ->when ($parameters['finaliste'], function ($query) {
              $query->whereStatus(true);
               //dd('arnold');
                })
        ->when (($parameters['regionconcours'] !== 'all'), function ($query) use ($parameters) {
                $query->whereRegionconcours ($parameters['regionconcours']);
            })->paginate(15);
        
        

    }


}