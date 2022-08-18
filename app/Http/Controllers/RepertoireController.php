<?php

namespace App\Http\Controllers;

use App\Models\Repertoire;
use Illuminate\Http\Request;
use Auth;
use DB;
use Illuminate\Support\Facades\Storage;

class RepertoireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Repertoire $id)
    {
        $posts = Repertoire::all();  // SELECT * FROM repertoire_Posts
        $titles = Repertoire::selectTitles();
        return view('repertoire.index', ['posts' => $posts, 'id' => $id->r_m_id, 'titles' => $titles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('repertoire.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'url' => 'required|mimes:pdf,zip,doc',
        ]);

        $input = $request->all();
        if ($request->hasFile('url')) {
            $destination_path = 'storage/fichiers/documents';
            $url = $request->file('url');
            $url_name = $url->hashName();
            $path = $request->file('url')->storeAs($destination_path, $url_name);
            // Storage::disk('local')->put('/fichiers/documents/', $url_name);
            // $path = Storage::disk('public')->put('storage/fichiers/documents', $request->file('url'));
            $input['url'] = $url_name;
        }

        $newRepertoire = Repertoire::create([
            'title' => $input['title'],
            'title_fr' => $input['title_fr'],
            'url' => $input['url'],
            'r_m_id' => Auth::user()->id,
        ]);

        return redirect(route('repertoire.show', $newRepertoire->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Repertoire  $repertoire
     * @return \Illuminate\Http\Response
     */
    public function show(Repertoire $repertoire)
    {
        $title = Repertoire::selectTitle($repertoire->id);

        return view('repertoire.show', ['repertoire' => $repertoire, 'title' => $title]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Repertoire  $repertoire
     * @return \Illuminate\Http\Response
     */
    public function edit(Repertoire $repertoire)
    {
        return view('repertoire.edit', ['repertoire' => $repertoire]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Repertoire  $repertoire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Repertoire $repertoire)
    {

        $repertoire->update([
            'title' => $request->title,
        ]);

        $path = $request->file('url')->store('url');

        return redirect(route('repertoire.show', $repertoire->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Repertoire  $repertoire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Repertoire $repertoire)
    {
        $repertoire->delete();

        return redirect(route('repertoire'));
    }
}
