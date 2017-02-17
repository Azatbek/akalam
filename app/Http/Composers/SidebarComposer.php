<?php
namespace App\Http\Composers;
use App\Models\Lyrics;
class SidebarComposer
{
    public function compose($view)
    {
        $view->with('lyrics', Lyrics::bestLyrics());
    }
}

?>
