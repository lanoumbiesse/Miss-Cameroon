<?php


namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class VoteRepository
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
        return DB::table('vote')
        ->where('anne', $parametre->annee)
         ->Join('candidates', 'candidates.id', '=', 'vote.id_candidate')
         ->Join('users', 'users.id', '=', 'vote.id_user')
        ->select('vote.*' ,\DB::raw('COUNT(vote.nbre_vote) as nbvote'),\DB::raw('users.name as nomu') ,\DB::raw('candidates.prenom as prenomc'),\DB::raw('candidates.nom as nomc') )
        ->groupBy('vote.id')
        ->orderBy($parameters['order'],$parameters['direction'])
        ->paginate(5);

    }


}