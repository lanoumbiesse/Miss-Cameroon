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
use Image;
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
        'numero_candidate' => $request->input('numcompet') ,
        'age' =>$request->input('datenais'),
        'height' =>$request->input('height'),
        'bust' =>$request->input('bust') ,
        'waist' =>$request->input('waist') ,
        'niveau_etude' =>$request->input('niveau'),
        'region_origine' =>$request->input('ro') ,
        'regionconcours' => $request->input('rc'),
        'hips'=> $request->input('hips'), 
        'shoes'=> $request->input('shoes'), 
        'eyes'=> $request->input('eyes'),
        'web_id' =>$request->input('nom') ,
        'annee' =>$parametre->annee,
        'shortdesc' => substr($request->input('description') ,0,50),
        'longdesc' =>$request->input('description') , 
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
         while (file_exists(public_path().'/images/2020/candidates/'.$id.$chemin));
         
               //  $img = Image::make($first->path());

       // $img->resize(400,600, function ($constraint) {

           // $constraint->aspectRatio();

       // })->save(public_path().'/images/2020/candidates/'.$id.$chemin);
       
       $first->move(public_path().'/images/2020/candidates/',$id.$chemin);

          //  $first->move(public_path().'/images/2020/candidates/',$id.$chemin); 

            DB::table('pictures-path')->insertGetId(
    ['chemin' => '/images/2020/candidates/'.$id.$chemin,
     'id_candidate' => $id , 
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
          while (file_exists(public_path().'/images/2020/candidates/'.$id.$chemin));
            //  $img = Image::make($pic->path());
              
              

      //  $img->resize(400,600, function ($constraint) {

         //   $constraint->aspectRatio();

      //  })->save(public_path().'/images/2020/candidates/'.$id.$chemin);
        
       $pic->move(public_path().'/images/2020/candidates/',$id.$chemin);
              

                          DB::table('pictures-path')->insertGetId(
                         ['chemin' =>'/images/2020/candidates/'.$id.$chemin,
                         'id_candidate' => $id , 
                          'type' => 'full'
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
                'age' =>$request->input('age'),
                'numero_candidate' =>$request->input('numcompet'),
                'height' =>$request->input('height') ,
                
                'niveau_etude' =>$request->input('niveau'),
                'region_origine' =>$request->input('ro') ,
                'regionconcours' => $request->input('rc'),
               
                'web_id'=> $request->input('web_id'),
                'annee' =>$parametre->annee,
                'shortdesc' => substr($request->input('description') ,0,50),
                'longdesc' =>$request->input('description') , 
                'finaliste' =>$finaliste, 
                'facebook_link' =>$request->input('fb') , 
                'instagram_link' =>$request->input('in') ,
                'twitter_link' =>$request->input('tw'),
                'video_link' =>$request->input('vi'),
                'updated_at'=> $mytime
                // Ajouter la date du système pour le updated-at 

                ]);
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
         while (file_exists(public_path().'/images/2020/candidates/'.$id.$chemin));
         
               //  $img = Image::make($first->path());

       // $img->resize(400,600, function ($constraint) {

           // $constraint->aspectRatio();

       // })->save(public_path().'/images/2020/candidates/'.$id.$chemin);
       
       $first->move(public_path().'/images/2020/candidates/',$id.$chemin);

          //  $first->move(public_path().'/images/2020/candidates/',$id.$chemin); 

            DB::table('pictures-path')
            ->where([['id_candidate', $id],['type','44']])
            ->update(
    ['chemin' => '/images/2020/candidates/'.$id.$chemin
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
          while (file_exists(public_path().'/images/2020/candidates/'.$id.$chemin));
            //  $img = Image::make($pic->path());
              
              

      //  $img->resize(400,600, function ($constraint) {

         //   $constraint->aspectRatio();

      //  })->save(public_path().'/images/2020/candidates/'.$id.$chemin);
        
       $pic->move(public_path().'/images/2020/candidates/',$id.$chemin);
              

                          DB::table('pictures-path')
                          ->where([['id_candidate', $id],['type','full']])
                          ->update(
                         ['chemin' =>'/images/2020/candidates/'.$id.$chemin,
                         
    ]

);
                          }
              
            }
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
        
        $deleted = DB::table('candidates')->where('id',$id)->delete();
        
       return redirect()->back()->with('success', 'candidate supprime');
        
        
    }
}
