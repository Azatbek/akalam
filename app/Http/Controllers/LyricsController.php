<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lyrics;
use App\Models\Category;
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
            $lyrics->save();
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
      if(app()->getLocale()=='ru') $lyrics = Lyrics::where('id', $id)->where('is_published', 1)->with('category')->where('is_published', 1)->first();
      else $lyrics = Lyrics::where('id', $id)->where('is_published', 1)->with('category')->select('title', 'content', 'created_at', 'hits')->first();
      /* counter */
      if(!empty($lyrics)) {
          $lyric = Lyrics::find($id);
          $lyric->hits = $lyric->hits+1;
          $lyric->save();
      } else abort(404);    
      return view('pages.lyrics', ['lyrics'=>$lyrics]);
    }


    public function showCategory($id) 
    {
        $category = Category::getSelectedCategory($id);
        return view('pages.category', ['category'=>$category]);
    }

    public static function getAllCategories() {
        $categories = Category::buildTree(Category::get()->toArray());
        return view('pages.categories', ['categories'=>$categories]);
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
