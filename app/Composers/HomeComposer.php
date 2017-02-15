<?php
namespace App\Composers;
use App\Models\News;
class HomeComposer
{
    public function compose($view)
    {
        $view->with('news' => News::getNews(6));
    }
}

?>
