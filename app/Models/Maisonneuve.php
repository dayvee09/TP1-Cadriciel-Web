<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use User;

class Maisonneuve extends Model
{
    use HasFactory;
    protected $fillable = ['nom', 'adresse', 'phone', 'email', 'ddn', 'ville_id', 'users_id'];

    public function maisonneuveHasUser()
    {
        return $this->hasOne('App\Models\User', 'id', 'users_id');
    }

    public function selectEmail($id)
    {
        $query = Maisonneuve::Select('users.email')
            ->JOIN('users', 'maisonneuves.users_id', '=', 'users.id')
            ->WHERE("maisonneuves.id", $id)
            ->get();
        return $query;
    }
}
