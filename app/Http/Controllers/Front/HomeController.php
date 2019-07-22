<?php

namespace App\Http\Controllers\Front;

use App\ {
    Http\Controllers\Controller,
    Http\Requests\SearchRequest,
    Repositories\PostRepository,
    Models\Vote,
    Models\Candidate
};
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * The PostRepository instance.
     *
     * @var \App\Repositories\PostRepository
     */
    protected $postRepository;

    /**
     * The pagination number.
     *
     * @var int
     */
    protected $nbrPages;

    /**
     * Create a new PostController instance.
     *
     * @param  \App\Repositories\PostRepository $postRepository
     * @return void
    */
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
        $this->nbrPages = config('app.nbrPages.front.posts');
    }

    /**
     * Display a listing of the posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       //dd($request->ip());

      $statut='null';
      $parametre=\DB::table('parametre')->where('is_active',1)->first();

      $candidates= Candidate::where('candidates.annee',$parametre->annee)
               ->LeftJoin('vote', 'candidates.id', '=', 'vote.id_candidate')
               ->select('candidates.*',\DB::raw('COUNT(vote.nbre_vote) as nbvote'))
               ->groupBy('candidates.id')
               ->orderby('nbvote','desc')
               ->get();


      if(Auth::check()){
      $statut=Vote::where('id_user',Auth::user()->id)
                  ->whereDate('date', '=', Carbon::today()->toDateString())
                  ->first();
          if(empty($statut)){
            $statut=Vote::whereDate('date', '=', Carbon::today()->toDateString())
                        ->where('ip',$request->ip())
                        ->first();
          }
        }


        return view('front.index', compact('candidates','parametre','statut'));
    }

    public function votefree(Request $request,$id){

      if(Auth::check()){
       $parametre=\DB::table('parametre')->where('isactive',1)->first();

        $vote=new vote();
        $vote->id_user=Auth::user()->id;
        $vote->id_candidate=$id;
        $vote->date=Carbon::now();
        $vote->nbre_vote=1;
        $vote->type='gratuit';
        $vote->montant=0;
        $vote->ip=$request->ip();
        $vote->annee=$parametre->annee;
        $vote->save();

        return redirect('/')->with('successfree', 'Votre vote a été enregistré, continuez de voter en utilisant nos offres payantes.');

      }
      return redirect('/');

    }


    public function profile(Request $request,$id){
      $statut='null';
      $parametre=\DB::table('parametre')->where('isactive',1)->first();

      $candidate= Candidate::where('web_id',$id)
               ->where('candidates.annee',$parametre->annee)
               ->Join('vote', 'candidates.id', '=', 'vote.id_candidate')
               ->select('candidates.*',\DB::raw('COUNT(vote.nbre_vote) as nbvote'))
               ->groupBy('candidates.id')
               ->orderby('nbvote','desc')
               ->first();


      if(Auth::check()){
      $statut=Vote::where('id_user',Auth::user()->id)
                  ->whereDate('date', '=', Carbon::today()->toDateString())
                  ->first();
          if(empty($statut)){
            $statut=Vote::whereDate('date', '=', Carbon::today()->toDateString())
                        ->where('ip',$request->ip())
                        ->first();
          }
    }

      return view('front.profile', compact('candidate','parametre','statut'));
}

}
