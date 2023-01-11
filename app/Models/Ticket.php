<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{

    protected $fillable = [
        'job','no', 'brand', 'country', 'title', 'category_name', 'priority', 'summary', 'objective', 'reference', 'otherinfo', 'comments'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
  
    public function status()
    {
        return $this->hasMany(Status::class);
    }

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id');
    }
}
