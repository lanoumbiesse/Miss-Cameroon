<?php

namespace App\Http\Controllers\Back;
use App\ {
    Http\Controllers\Controller,
    Http\Requests\CandidateRequest,
    Repositories\CandRepository,
    Services\PannelAdmin
};
use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class CandidateController extends Controller
{
   use Indexable;

   /**
     * Create a new ContactController instance.
     *
     * @param  \App\Repositories\CandRepository $repository
     */
    public function __construct(CandRepository $repository)
    {
        $this->repository = $repository;

        $this->table = 'candidates';
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

        
        $parametre = DB::table('parametre')->where('is_active', 1)->first();
        $mytime = Carbon::now();
       
         $id = DB::table('candidates')->insertGetId(
        ['nom' => $request->input('nom'), 
        'prenom' => $request->input('prenom'),
        'date_nais' =>$request->input('datenais'),
        'lieu_nais' =>$request->input('lieunais'),
        'email' =>$request->input('email') ,
        'numtel' =>$request->input('numtel') ,
        'niveau_etude' =>$request->input('niveau'),
        'region_origine' =>$request->input('ro') ,
        'regionconcours' => $request->input('rc'),
        'pays_de_residence'=> $request->input('pays'), 
        'web_id' =>$request->input('nom') ,
        'annee' =>$parametre->annee,
        'short_desc' => substr($request->input('description') ,0,50),
        'long_desc' =>$request->input('description') , 
        'facebook_link' =>$request->input('fb') , 
        'instagram_link' =>$request->input('in') ,
        'twitter_link' =>$request->input('tw'),
        'video_link' =>$request->input('vi'),
        'updated_at'=> $mytime,
        'created_at'=> $mytime
          ]
);
        
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
        $first = $request->file('first');
        $extension = $first->guessExtension();
        $chemin= " ";
        if (!$first->isValid()) {
    throw new \Exception('Error on upload file: '.$first->getErrorMessage());
}
         do {
            $chemin = substr(str_shuffle($permitted_chars), 0, 10);
            $chemin = $chemin.'.'.$extension;

         }
         while (file_exists(public_path().'/images/2019/'.$id.$chemin));

            $first->move(public_path().'/images/2019/',$id.$chemin); 

            DB::table('pictures-path')->insertGetId(
    ['chemin' => public_path().'/images/2019/',$id.$chemin,
     'id_candidate' => $id , 
     'type' => '4*4'
    ]
);

          
            for ($i = 1;$i <= 3; $i++){
                if ($request->hasfile('p'.$i)){
                $pic = $request->file('p'.$i);
                $extension = $pic->guessExtension();
                      if (!$pic->isValid()) {
    throw new \Exception('Error on upload file: '.$pic->getErrorMessage());
}
              
                
                do {
            $chemin = substr(str_shuffle($permitted_chars), 0, 10);
             $chemin = $chemin.'.'.$extension;
         }
          while (file_exists(public_path().'/images/2019/'.$id.$chemin.$extension));
                $request->file('p'.$i)->move(public_path().'/images/2019/',$id.$chemin); 

                          DB::table('pictures-path')->insertGetId(
                         ['chemin' => public_path().'/images/2019/',$id.$chemin,
                         'id_candidate' => $id , 
                          'type' => 'portrait'
    ]

);
                          }
              
            }

           return redirect('admin');
         
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
         return view('back.candidates.edit', compact('candidate'));
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
        //requette de mise a jourDB::table('users')
        $parametre = DB::table('parametre')->where('is_active', 1)->first();
        $mytime = Carbon::now();
        $finaliste;
        if ($request->input('finaliste'))
            $finaliste = true;
        else
            $finaliste = false;

        DB::table('candidates')
            ->where('id', $id)
            ->update(['nom' => $request->input('nom'),
                'prenom' => $request->input('prenom'),
                'date_nais' =>$request->input('datenais'),
                'lieu_nais' =>$request->input('lieunais'),
                'email' =>$request->input('email') ,
                'numtel' =>$request->input('numtel') ,
                'niveau_etude' =>$request->input('niveau'),
                'region_origine' =>$request->input('ro') ,
                'regionconcours' => $request->input('rc'),
                'pays_de_residence'=> $request->input('pays'),
                'web_id'=> $request->input('web_id'),
                'annee' =>$parametre->annee,
                'short_desc' => substr($request->input('description') ,0,50),
                'long_desc' =>$request->input('description') , 
                'finaliste' =>$finaliste, 
                'facebook_link' =>$request->input('fb') , 
                'instagram_link' =>$request->input('in') ,
                'twitter_link' =>$request->input('tw'),
                'video_link' =>$request->input('vi'),
                'updated_at'=> $mytime
                // Ajouter la date du système pour le updated-at 

                ]);
        return redirect('admin')->with('status', __('Modification effectuee!'));
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
    }
}
