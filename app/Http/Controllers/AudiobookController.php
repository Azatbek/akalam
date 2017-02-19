<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Audiobook;
use App\Models\AudioCategories;
use Redirect;
use Illuminate\Support\Facades\Input;
use Session;
use Request as Ajax;
class AudiobookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($cat = null)
    {
      if($cat == null) {
            $audios = Audiobook::getAudiobooks(0);
        } else {
            $audios = Audiobook::getAudiobooksByCat(0,$cat);
        }
        
      return view('pages.audiobooks_list', ['audios'=>$audios]);
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
    public function show($cat = null, $id = null)
    {
        if(app()->getLocale()=='ru') {
            $audio = Audiobook::where('id', $id)->where('is_published', 1)->where('category_id',$cat)->with('category')->first();
        }
          else {
            $audio = Audiobook::where('id', $id)->where('is_published', 1)->where('category_id',$cat)->with('category')->first();
        }
      /* counter */
      if(!empty($audio)) {
          $audioB = Audiobook::find($id);
          $audioB->hits = $audioB->hits+1;
          $audioB->save();
      } else abort(404);    
      return view('pages.audiobooks', ['audio'=>$audio]);
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
