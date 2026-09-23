<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class CandRepository
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
        return DB::table('candidates')
        ->where('candidates.annee', $parametre->annee)
        //->orWhere([['candidates.annee', '2020'],['candidates.finaliste',0]])
        //->orWhere('candidates.annee', '2021')
        ->leftJoin('vote', 'candidates.id', '=', 'vote.id_candidate')
        ->select('candidates.*' ,\DB::raw('COUNT(vote.nbre_vote) as nbvote'))
        ->groupBy('candidates.id')
        ->orderBy($parameters['order'],$parameters['direction'])
        ->when (($parameters['regionconcours'] !== 'all'), function ($query) use ($parameters) {
                $query->whereRegionconcours ($parameters['regionconcours']);
            })->when ($parameters['finaliste'], function ($query) {
               $query->whereFinaliste (true);
            //  dd('arnold');
                })
        ->paginate(15);

    }


}
