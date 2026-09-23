<?php

namespace App\Http\Controllers\Front;

use App\ {
    Http\Controllers\Controller,
    Http\Requests\SearchRequest,
    Http\Requests\InscriptionsRequest,
    Models\Vote,
    Models\PicturePost,
    Models\Publication
};
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use Mail;
use Response;
use Cookie;
use Illuminate\Support\Facades\DB;

class PublicationController extends Controller
{
   

    /**
     * Create a new PostController instance.
     *
     * @param  \App\Repositories\PostRepository $postRepository
     * @return void
    */
    public function __construct()
    {
        

    }

  

    public function savepublication(Request $request)
    {
       $data=json_decode($request->getContent());
 
       $post=new Publication();
       $post->title=$data->title;
       $post->body=$data->body;
       if(isset($data->userid))
       $post->user_id=$data->userid;
       if(isset($data->video))
       $post->video=$data->video;
       $post->save();
       
       
            $images=$data->images;
       for($i=0;$i<sizeof($images);$i++){
           
           $file = base64_decode($images[$i]);
            $folderName = '/images/publications/';
            $safeName = str_random(10).'.'.'png';
            $destinationPath = public_path() . $folderName;
            file_put_contents(public_path().'/images/publications/'.$safeName, $file);

           $img=new PicturePost();
           $img->pub_id=$post->id;
           $img->chemin='/images/publications/'.$safeName;
           $img->save();
           
           
       }
       
       return Response::json(['status'=>'success']);
       
       
        
       
        
    }
    
      public function getposts(Request $request){
        
    $data=json_decode($request->getContent());
    //dd($data);

      $posts= Publication::orderby('created_at','desc')
               ->skip($data->skip)->take($data->take)->get();
             
             foreach($posts as $post){
                 
                 $post->images=PicturePost::where('pub_id',$post->id)->get();
             }
                   
               
               /*foreach($candidates as $candidate){
                   $candidate->pictures=$candidate->pictures()->get();
               }*/

     //dd($candidates);
     return Response::json($posts);

    }







}
