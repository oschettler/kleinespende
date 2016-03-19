<?php

namespace Kleinespende\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use Kleinespende\Models\Receiver;

class ReceiverComposer
{

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $receivers = Receiver::pluck('name', 'id');
        $view->with('receivers', $receivers);
    }
}
