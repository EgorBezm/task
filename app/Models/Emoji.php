<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emoji extends Model
{
    use HasFactory;

    public function groups()
    {
        return $this->hasMany(Workspace::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

}
