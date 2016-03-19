<?php

namespace Kleinespende\Models;

use Illuminate\Database\Eloquent\Model;
use Kleinespende\Models\Receiver;

class Button extends Model
{
    public function receiver()
    {
        return $this->belongsTo(Receiver::class);
    }
}
