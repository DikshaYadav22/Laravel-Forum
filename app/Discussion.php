<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Reply;


class Discussion extends Model
{
    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'slug';
    }


    // http://laravel-forum.org/discussions?channel=diksha
    // check whether it has a query // request()->query('channel')
    //if yes, get the channel row
    // check whether the channel row exist
    // if yes


    public function scopefilterChannel($builder)
    {
        if(request()->query('channel')){
            
            $channel = Channel::where('slug', request()->query('channel'))->first();
            

            if($channel){
                return $builder->where('channel_id', $channel->id);
                
            }
            return $builder;
        }
        return $builder;
    } 

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

   
}
