<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Industry extends Model
{
    use HasFactory;

    protected $table = 'industries';

    protected $fillable = ['label', 'slug'];

    protected static function boot() {
        parent::boot();
    
        static::creating(function ($industry) {
            $industry->slug = Str::slug($industry->label);
        });
    
        static::updating(function ($industry) {
            $industry->slug = Str::slug($industry->label);
        });
    }
}
