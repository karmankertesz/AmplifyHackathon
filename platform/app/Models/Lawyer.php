<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lawyer extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function matters()
    {
        return $this->hasMany(Matter::class);
    }
}
