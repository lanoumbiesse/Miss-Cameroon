<?php
namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class BilletRepository
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
        ->where([['billets.annee', $parametre->annee],['status','success']])
        ->orderBy('created_at','desc')
       ->when (($parameters['regionconcours'] !== 'all'), function ($query) use ($parameters) {
                $query->whereRegionconcours ($parameters['regionconcours']);
          })
        
        ->paginate(5);

    }


}