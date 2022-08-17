<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use User;
use DB;

class BlogPost extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'title_fr', 'body', 'body_fr', 'maisonneuves_id'];

    public function blogHasUser()
    {
        return $this->hasOne('App\Models\Maisonneuve', 'id', 'maisonneuves_id');
    }

    public function selectBlog($id)
    {
        $query = BlogPost::Select('body', 'maisonneuves.nom')
            ->JOIN('maisonneuves', 'blog_posts.maisonneuves_id', '=', 'maisonneuves.id')
            ->WHERE("blog_posts.id", $id)
            ->get();
        return $query;
    }

    public function selectBlogs($etudiant)
    {
        $query = BlogPost::Select('body', 'maisonneuves.nom')
            ->JOIN('maisonneuves', 'blog_posts.maisonneuves_id', '=', 'maisonneuves.id')
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

        $query = BlogPost::Select(
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

        $query = BlogPost::Select(
            'id',
            DB::raw('(case when title' . $lg . ' is null then title else title' . $lg . ' end) as title')
        )
            ->WHERE("blog_posts.id", $id)
            ->get();
        return $query;
    }

    static public function selectBodies()
    {

        $lg = "";
        if (session()->has('locale') && session()->get('locale') == 'fr') {
            $lg = '_fr';
        }

        $query = BlogPost::Select(
            'id',
            DB::raw('(case when body' . $lg . ' is null then body else body' . $lg . ' end) as body')
        )
            ->get();
        return $query;
    }

    static public function selectBody($id)
    {

        $lg = "";
        if (session()->has('locale') && session()->get('locale') == 'fr') {
            $lg = '_fr';
        }

        $query = BlogPost::Select(
            'id',
            DB::raw('(case when body' . $lg . ' is null then body else body' . $lg . ' end) as body')
        )
            ->WHERE("blog_posts.id", $id)
            ->get();
        return $query;
    }
}
