<?php

namespace App\Http\Controllers\Back;
use App\ {
    Http\Controllers\Controller,
    Services\PannelAdmin
};
use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PhotoController extends Controller
{
    //

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
         $paths = DB::table('pictures-path')->where('id_candidate',$id)->get();
         return view('back.photos.index', ['paths' => $paths]);
    }

    public function edit($id)
    {
        //
         $paths = DB::table('pictures-path')->where('id_candidate',$id)->first();
         return view('back.photos.index', compact('paths'));
    }
}
