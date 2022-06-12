<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sugestion extends Model
{
    use HasFactory;

    protected $table = 'sugestions';

    protected $fillable = ['name', 'alpha_two_code', 'domains', 'country', 'web_pages'];
}
