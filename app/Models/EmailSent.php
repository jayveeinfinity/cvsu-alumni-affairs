<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EmailSent extends Model
{
    use HasFactory;
    
    protected $table = 'email_sent';

    protected $fillable = ['user_id'];
}
