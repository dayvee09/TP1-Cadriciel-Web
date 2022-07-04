<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maisonneuve extends Model
{
    use HasFactory;
    protected $fillable = ['nom', 'adresse', 'phone', 'email', 'ddn', 'ville_id'];
}
