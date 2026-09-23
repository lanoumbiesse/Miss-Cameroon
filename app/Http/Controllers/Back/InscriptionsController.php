<?php

namespace App\Http\Controllers\Back;
use App\ {
    Http\Controllers\Controller,
    Http\Requests\CandidateRequest,
    Repositories\InscriptionsRepository,
    Services\PannelAdmin
};
use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class InscriptionsController extends Controller
{
   use Indexable;

   /**
     * Create a new ContactController instance.
     *
     * @param  \App\Repositories\CandRepository $repository
     */
    public function __construct(InscriptionsRepository $repository)
    {
        $this->repository = $repository;

        $this->table = 'inscriptions';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('back.candidates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CandidateRequest $request)
    {
        //

    

           
         
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //requette pour gey les infos du dit user
        $candidate = DB::table('candidates')->where('id', $id)->get()->first();
        //echo $candidate->nom;
         //return view('back.candidates.edit', compact('candidate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CandidateRequest $request, $id)
    {
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $deleted = DB::table('inscriptions')->where('id',$id)->delete();
        return redirect()->back()->with('success', 'candidate supprimee');
        
        
    }
    
    public function supprimer($id)
    {
        //
        $deleted = DB::table('inscriptions')->where('id',$id)->delete();
        return redirect()->back()->with('arnold', 'candidate supprimee');
        
        
    }
    
    
    
}
