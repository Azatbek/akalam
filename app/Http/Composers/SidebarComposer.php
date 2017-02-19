<?php
namespace App\Http\Composers;
use Route;
use App\Models\Lyrics;
use App\Models\Category;
use App\Models\AudioCategories;
class SidebarComposer
{
    public function compose($view)
    {
        $view->with('lyrics', Lyrics::bestLyrics());
        $view->with('last_lyrics', Lyrics::lastLyrics());
        if(Route::currentRouteName() == 'AudioRoute') $view->with('categories', AudioCategories::getCategoriesTree());
        else $view->with('categories', Category::getCategoriesTree());
    }
}

?>
