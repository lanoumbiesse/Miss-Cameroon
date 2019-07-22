<?php

namespace App\Http\Controllers\Back;
use App\ {
    Http\Controllers\Controller,
    Http\Requests\AttribuervoteRequest,
    Repositories\VoteRepository,
    Services\PannelAdmin
};
use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class VoteController extends Controller
{
     use Indexable;

   /**
     * Create a new ContactController instance.
     *
     * @param  \App\Repositories\CandRepository $repository
     */
    public function __construct(VoteRepository $repository)
    {
        $this->repository = $repository;

        $this->table = 'vote';
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit ($id)
    {
        
        $candidate = DB::table('candidates')->where('id', $id)->get()->first();
        //echo $candidate->nom;
         return view('back.vote.create', compact('candidate'));
    }

    public function update (AttribuervoteRequest $request, $id) {
       $user = auth()->user();
       $parametre = DB::table('parametre')->where('is_active', 1)->first();
        $mytime = Carbon::now();
        $montant_comica = ($request->input('montant') * 70)/100;
        $montant_dev = $request->input('montant') - $montant_comica;
              $idvote = DB::table('vote')->insertGetId(
        ['id_candidate' => $id , 
        'id_user' => $user->id,
        'status' => $parametre->status,
        'nbre_vote' =>$request->input('nbre_vote') ,
        'type' =>"manuel" ,
        'operateur' => "aucun",
        'montant' =>$request->input('montant'),
        'montant_comica' => $montant_comica,
        'montant_dev' => $montant_dev,
        'anne' => $parametre->annee ,
        'updated_at' => $mytime,
        'created_at'=> $mytime   
          ]

);
              return redirect('admin');

    }
}
