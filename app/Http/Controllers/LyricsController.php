<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LyricsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $lyrics = Lyrics::getLyrics(0);
      return view('pages.lyrics_list', ['lyrics'=>$lyrics]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
      if(app()->getLocale()=='ru') $news = Lyrics::find($id)->with('category')->first();
      else $lyrics = Lyrics::find($id)->with('category')->select('title', 'content', 'created_at', 'hits')->first();
      /* counter */
      $lyrics = Lyrics::find($id);
      $lyrics->hits = $lyrics->hits+1;
      $lyrics->save();
      return view('pages.lyrics', ['lyrics'=>$lyrics]);
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
