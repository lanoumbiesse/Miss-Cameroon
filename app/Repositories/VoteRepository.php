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
        return DB::table('candidates')
         ->where([['candidates.annee', $parametre->annee] , ['candidates.regionconcours','Ouest']])
         ->LeftJoin('vote', 'candidates.id', '=', 'vote.id_candidate')
         
        ->select('candidates.*' , \DB::raw("SUM( ( CASE WHEN vote.status = 'regional' THEN vote.nbre_vote ELSE 0 END ) ) AS nbre_vote") ,\DB::raw('candidates.prenom as prenomc'),\DB::raw('candidates.nom as nomc') )
      ->groupBy('candidates.id')
      //  ->orderBy($parameters['order'],$parameters['direction'])
        ->paginate(5);
        
        
        
        
        
    
        
        
       //    $candidates= Candidate::where('candidates.annee',$parametre->annee)
      //         ->LeftJoin('vote', 'candidates.id', '=', 'vote.id_candidate')
      //        ->where('candidates.regionconcours','Ouest')
               //->where('vote.status',$parametre->status)
               //->where('vote.date','>','2019-11-29')
                //->where('candidates.finaliste',1)
         //   ->select('candidates.*', \DB::raw("SUM( ( CASE WHEN vote.status = 'regional' THEN vote.nbre_vote ELSE 0 END ) ) AS nbvote"))
        //    ->groupBy('candidates.id')
        //      ->orderby('nbvote','desc')
           //    ->get();

    }


}