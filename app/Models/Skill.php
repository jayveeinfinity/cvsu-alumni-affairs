<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Skill extends Model
{
    use HasFactory;

    protected $table = 'skills';

    protected $fillable = ['user_profile_id', 'label'];

    public function userProfile()
    {
        return $this->belongsTo(UserProfile::class);
    }

    public static function isLimit($id) {
        return self::where('user_profile_id', $id)->count() === 10;
    }
}
