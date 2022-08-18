<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use User;
use DB;

class Repertoire extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'title_fr', 'url', 'r_m_id'];

    public function repertoireHasUser()
    {
        return $this->hasOne('App\Models\Maisonneuve', 'id', 'r_m_id');
    }

    public function selectRepertoire($id)
    {
        $query = Repertoire::Select('title', 'maisonneuves.nom', 'url')
            ->JOIN('maisonneuves', 'repertoires.r_m_id', '=', 'maisonneuves.id')
            ->WHERE("repertoires.id", $id)
            ->get();
        return $query;
    }

    public function selectRepertoires($etudiant)
    {
        $query = Repertoire::Select('title', 'maisonneuves.nom')
            ->JOIN('maisonneuves', 'repertoires.r_m_id', '=', 'maisonneuves.id')
            ->WHERE("maisonneuves.id", $etudiant)
            ->get();
        return $query;
    }

    static public function selectTitles()
    {

        $lg = "";
        if (session()->has('locale') && session()->get('locale') == 'fr') {
            $lg = '_fr';
        }

        $query = Repertoire::Select(
            'id',
            DB::raw('(case when title' . $lg . ' is null then title else title' . $lg . ' end) as title')
        )
            ->get();
        return $query;
    }

    static public function selectTitle($id)
    {

        $lg = "";
        if (session()->has('locale') && session()->get('locale') == 'fr') {
            $lg = '_fr';
        }

        $query = Repertoire::Select(
            'id',
            DB::raw('(case when title' . $lg . ' is null then title else title' . $lg . ' end) as title')
        )
            ->WHERE("repertoires.id", $id)
            ->get();
        return $query;
    }
}
