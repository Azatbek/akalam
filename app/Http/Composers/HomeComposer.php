<?php
namespace App\Http\Composers;
use App\Models\News;
use App\Models\Partner;
use App\Models\Category;
use App\Models\Advertisement;
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
      $view->with('partners', Partner::getPartners());
    }
    public function footerAdv($view)
    {
      $view->with('advertisement', Advertisement::getAdv(3));
    }
}

?>
