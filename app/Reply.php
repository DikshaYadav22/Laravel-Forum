<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Discussion;
use App\User;

class Reply extends Model
{
    public function user()
    {
      return $this->belongsTo(User::class);  
    }

    public function discussion()
    {
        return $this->belongsTo(Discussion::class);
    }

    protected $guarded = [];
}
