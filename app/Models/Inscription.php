<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    use HasFactory;

    protected $fillable = ['formation_id', 'nom', 'email', 'profile_id'];

    public function formation()
    {
        return $this->belongsTo(Formation::class);
    }

    public function profile()
{
    return $this->belongsTo(Profile::class);
}

}
