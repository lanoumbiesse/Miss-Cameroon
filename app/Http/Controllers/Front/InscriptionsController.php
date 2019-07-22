<?php

namespace App\Http\Controllers\Front;

use App\ {
    Http\Controllers\Controller,
    Http\Requests\InscriptionsRequest,
    Repositories\InscriptionsRepository,
    Notifications\Commented,
    Models\Post,
    Models\Comment
};
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
     * Show the form for creating a new contact.
     *
     * @return \Illuminate\Http\Response
     */
    public function store (InscriptionsRequest $request)
    {

    	if ($request->input('choix') == "cameroun"){
    		$pays = "Cameroun";
    	    $region = $request->input('Rc') ;
	    	   }
       else {
    		$pays = $request->input('pays') ;
    		$region = "Null";
            }
           $mytime = Carbon::now();
    	$parametre = DB::table('parametre')->where('is_active', 1)->first();
    	   $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
        $first = $request->file('image');
        $extension = $first->guessExtension();
        $chemin= " ";
        if (!$first->isValid()) {
    throw new \Exception('Error on upload file: '.$first->getErrorMessage());
}
         do {
            $chemin = substr(str_shuffle($permitted_chars), 0, 10);
            $chemin = $chemin.'.'.$extension;

         }
         while (file_exists(public_path().'/images/inscriptions/2019/'.$chemin));

         DB::table('inscriptions')->insert(
    ['nom' => $request->input('nom'), 
    'prenom' => $request->input('prenom'),
    'email' => $request->input('email'),
    'age' => $request->input('age'),
    'niveau' => $request->input('niveau'),
    'profession' => $request->input('profession'),
    'pays' => $pays,
    'ville' => $request->input('ville'),
    'quartier' => $request->input('quartier'),
    'region_origine' => $request->input('Ro'),
    'regionconcours' => $region,
    'facebook_link' => $request->input('facebook'),
    'instagram_link' => $request->input('instagram'),
    'lien_photo' => public_path().'/images/inscriptions/2019/'.$chemin,
    'numtel' => $request->input('numtel'),
    'created_at' => $mytime,
    'updated_at' => $mytime,
    'annee' => $parametre->annee
    ]
);

   $first->move(public_path().'/images/inscriptions/2019/',$chemin); 

        return view ('front.contact');
    }


}
