<?php
namespace App\Http\Composers;
use App\Models\Lyrics;
use App\Models\Category;
class SidebarComposer
{
    public function compose($view)
    {
        $view->with('lyrics', Lyrics::bestLyrics());
        $view->with('categories', Category::getCategoriesTree());
    }
}

?>
