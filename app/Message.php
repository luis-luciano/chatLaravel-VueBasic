<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'body',
    ];

    protected $appends = ['isSelfMessage'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getIsSelfMessageAttribute()
    {
        return $this->user_id == auth()->user()->id;
    }
}
