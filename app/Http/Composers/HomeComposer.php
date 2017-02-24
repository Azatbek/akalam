<?php
namespace App\Http\Composers;
use App\Models\News;
use App\Models\Partner;
use App\Models\Category;
class HomeComposer
{
    public function compose($view)
    {
        $view->with('news', News::getNews(3));
    }
    public function categoriesCompose($view)
    {
      $view->with('press', News::getPressNews(3));
      $view->with('categories', Category::getHomeSelectedCategories([13,14,15,16,17,18,19]));
    }
    public function popularNews($view)
    {
      $view->with('news', News::getPopularNews(3));
      $view->with('partners', Partner::getPartners());

    }
}

?>
