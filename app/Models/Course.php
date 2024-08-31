<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
       

    public function interestLevel()
    {
        return $this->belongsTo(InterestLevel::class, 'interest_level_id');
    }
}
