<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable=['description'];

    public function votes(){
        return $this ->hasmany(Vote::class);
    }

    public function results(){
        return $this ->hasmany(Result::class);
    }
}
