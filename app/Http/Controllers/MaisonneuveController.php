<?php

namespace App\Http\Controllers;

use App\Models\Maisonneuve;
use App\Models\Ville;
use Illuminate\Http\Request;

class MaisonneuveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Maisonneuve::all(); // Équivalent de SELECT * FROM maisonneuve
        $villes = Ville::all(); // Équivalent de SELECT * FROM villes
        return view('maisonneuve.index', ['posts' => $posts, 'villes' => $villes]); // On spécifie le dossier.fichier
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $villes = Ville::all(); // Équivalent de SELECT * FROM villes
        return view('maisonneuve.create', ['villes' => $villes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newEtudiant = Maisonneuve::create([
            'nom' => $request->nom,
            'adresse' => $request->adresse,
            'phone' => $request->phone,
            'ddn' => $request->ddn,
            'email' => $request->email,
            'ville_id' => $request->ville_id
        ]);

        // return $newEtudiant;
        return redirect(route('maisonneuve.show', $newEtudiant->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Maisonneuve  $maisonneuve
     * @return \Illuminate\Http\Response
     */
    public function show(Maisonneuve $etudiant)
    {
        $imgCount = $etudiant->id;
        $ville = Ville::find($etudiant->ville_id);
        // $etudiant = SELECT * FROM blog_posts WHERE id = $blogPost
        return view('maisonneuve.show', ['etudiant' => $etudiant, 'ville' => $ville, 'imgCount' => $imgCount]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Maisonneuve  $maisonneuve
     * @return \Illuminate\Http\Response
     */
    public function edit(Maisonneuve $etudiant)
    {
        $villes = Ville::all(); // Équivalent de SELECT * FROM villes
        return view('maisonneuve.edit', ['etudiant' => $etudiant, 'villes' => $villes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Maisonneuve  $maisonneuve
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Maisonneuve $etudiant)
    {
        $etudiant->update([
            'nom' => $request->nom,
            'adresse' => $request->adresse,
            'email' => $request->email,
            'phone' => $request->phone,
            'ddn' => $request->ddn,
            'ville_id' => $request->ville_id
        ]);

        return redirect(route('maisonneuve.show', $etudiant->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Maisonneuve  $maisonneuve
     * @return \Illuminate\Http\Response
     */
    public function destroy(Maisonneuve $etudiant)
    {
        $etudiant->delete();

        return redirect(route('maisonneuve'));
    }
}