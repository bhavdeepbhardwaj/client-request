<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    //
    protected $fillable = ['name'];

    // Status.php file

    public function tickets()   
    
    {
        return $this->hasMany(Ticket::class);
    }
}

