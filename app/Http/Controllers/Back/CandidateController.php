<?php

namespace App\Http\Controllers\Back;
use App\ {
    Http\Controllers\Controller,
    Http\Requests\CandidateRequest,
    Repositories\ConfigAppRepository,
    Repositories\EnvRepository,
    Services\PannelAdmin
};
use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('back.candidates.inscription-candidate');
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

        

       
         $id = DB::table('candidates')->insertGetId(
        ['nom' => $request->input('nom'), 
        'prenom' => $request->input('prenom'),
        'date-nais' =>$request->input('datenais'),
        'lieu-nais' =>$request->input('lieunais'),
        'email' =>$request->input('email') ,
        'numtel' =>$request->input('numtel') ,
        'niveau-etude' =>$request->input('niveau'),
        'region-origine' =>$request->input('ro') ,
        'region-concours' => $request->input('rc'),
        'paysderesidence'=> $request->input('pays'), 
        'annee' =>$request->input('annee'),
        'shortdesc' => substr($request->input('description') ,0,50),
        'longdesc' =>$request->input('description') , 
        'facebook-link' =>$request->input('fb') , 
         'instagram-link' =>$request->input('in') ,
          'twitter-link' =>$request->input('tw')
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
    ['chemin' => $id.$chemin,
     'id-candidate' => $id , 
     'type' => '44'
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
                         ['chemin' => $id.$chemin,
                         'id-candidate' => $id , 
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
