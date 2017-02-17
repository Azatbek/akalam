<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lyrics;
use Redirect;
use Session;
use Request as Ajax;
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if(Ajax::ajax()) {
        $data = $request->all();
        $lyrics = new Lyrics;
        if($lyrics->fill($data)) {
      		return array('status'=>'success', 'message'=>trans('default.home.success-message'));
        } else {
          return array('status'=>'error', 'message'=>trans('default.home.error-message'));
        }
      } else {
          return abort(404);
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      if(app()->getLocale()=='ru') $news = Lyrics::findOrFail($id)->with('category')->first();
      else $lyrics = Lyrics::findOrFail($id)->with('category')->select('title', 'content', 'created_at', 'hits')->first();
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
