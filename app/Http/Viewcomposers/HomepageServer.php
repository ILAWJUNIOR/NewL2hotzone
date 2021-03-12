<?php

namespace App\Http\Viewcomposers;

use Illuminate\View\View;

class HomepageServer
{
    public function compose(View $view)
    {
        $view->with('count', 25);
    
    }
}
