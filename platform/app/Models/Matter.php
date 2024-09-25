<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Matter extends Model
{
    use HasFactory;



    public function getContextAttributes()
    {
        $attributes = $this->getAttributes();
        return Arr::only($attributes,[
            'title',
            'service',
            'description',
            'industry',
            'budget'
        ]);
    }

    public function lawyer()
    {
        return $this->belongsTo(Lawyer::class);
    }
}
