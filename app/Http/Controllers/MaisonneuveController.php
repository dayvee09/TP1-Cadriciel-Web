<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Maisonneuve;
use App\Models\Ville;
use App\Models\User;
use Illuminate\Http\Request;
use Hash;

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

        $request->validate([
            'nom' => 'required|min:1:max:30',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:10',
            'adresse' => 'required|min:2|max:60',
            'phone' => 'required|numeric|digits:10',
            'ddn' => 'required|before:today',
        ]);

        $newUser = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        $newEtudiant = Maisonneuve::create([
            'nom' => $request->nom,
            'adresse' => $request->adresse,
            'phone' => $request->phone,
            'ddn' => $request->ddn,
            'ville_id' => $request->ville_id,
            'users_id' => $newUser->id
        ]);

        // return $newEtudiant;
        return redirect(route('maisonneuve.show', $newEtudiant->id))->withErrors('Credential does not match');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Maisonneuve  $maisonneuve
     * @return \Illuminate\Http\Response
     */
    public function show(Maisonneuve $etudiant)
    {
        $email = new Maisonneuve;
        $email = $email->selectEmail($etudiant->id);
        $imgCount = $etudiant->id;
        $ville = Ville::find($etudiant->ville_id);
        // $etudiant = SELECT * FROM blog_posts WHERE id = $blogPost
        return view('maisonneuve.show', ['etudiant' => $etudiant, 'ville' => $ville, 'imgCount' => $imgCount, 'email' => $email]);
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

        $request->validate([
            'adresse' => 'required|min:2|max:60',
            'phone' => 'required|numeric|digits:10',
            'ddn' => 'required|before:today',
        ]);

        $etudiant->update([
            'nom' => $request->nom,
            'adresse' => $request->adresse,
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
