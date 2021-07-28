<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Ticket extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'user_id', 'category_id', 'ticket_id', 'assigned_to','title', 'priority', 'message', 'status'
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category','category_id','id' );
    }
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id','id');
    }
    public function assigned_to()
    {
        return $this->belongsTo('App\Models\User','assigned_to','id');
    }
}