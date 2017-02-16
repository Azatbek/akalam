<?php
namespace App\Http\Composers;
use App\Models\News;
use App\Models\Category;
class HomeComposer
{
    public function compose($view)
    {
        $view->with('news', News::getNews(6));
        $view->with('categories', Category::getHomeCategories());
    }
}

?>
