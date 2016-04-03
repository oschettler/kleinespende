<?php

namespace Kleinespende\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Contracts\Auth\Authenticatable;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $user;

    public function __construct(Authenticatable $user)
    {
        $this->user = $user;
    }
    
    protected function checkAuth($obj)
    {
        if ($obj->user_id != $this->user->id) {
            return new AccessDeniedHttpException('Du darfst dieses Objekt nicht bearbeiten');
        }
    }
}
