<?php

namespace App\Http\Controllers;

use App\Models\Evenements;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EvenementController extends Controller
{
    /* public function __construct()
    {
        $this->middleware('auth');
    } */

    // Liste des événements
    public function listeEvenements()
    {
        if (Auth::user()->role === 'admin') {
        // Admin voit tous les articles
        $evenements = Evenements::with('user') // sans 's'
            ->orderBy('created_at', 'desc')
            ->get()
            ->groupBy('id_cat'); // ou 'category' si tu as un accessor
    } else {
        // Editeur voit seulement ses articles
        $evenements = Evenements::with('user')
            ->where('id_user', Auth::id()) // id_user = bonne colonne
            ->orderBy('created_at', 'desc')
            ->get()
            ->groupBy('id_cat'); // idem
    }

    return view('evenements.liste', compact('evenements'));
    }


    public function index()
    {
        /* $this->authorize('viewAny', Evenement::class); */
        $evenements = Evenements::with('user')->latest()->paginate(10);
        return view('evenement', compact('evenements'));
    }

    public function create()
    {
       /*  $this->authorize('create', Evenement::class); */
        return view('evenements.create');
    }

    public function store(Request $request)
    {
        /* $this->authorize('create', Evenement::class);
 */
        $validated = $request->validate([
            'date' => 'required|date',
            'heure' => 'required',
            'theme' => 'required|string|max:255',
            'lieux' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time().'_'.$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('evenements', $imageName);
            $validated['image'] = $imageName;
        }

        $validated['id_user'] = Auth::id();
        Evenements::create($validated);

        return redirect()->route('evenements.liste')->with('success', 'Événement créé avec succès.');
    }

    public function edit(Evenements $evenement)
    {
        /* $this->authorize('update', $evenement); */
        return view('evenements.edit', compact('evenement'));
    }

    public function update(Request $request, Evenements $evenement)
    {
        /* $this->authorize('update', $evenement); */

        $validated = $request->validate([
            'date' => 'required|date',
            'heure' => 'required',
            'theme' => 'required|string|max:255',
            'lieux' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
        ]);

       if ($request->hasFile('image')) {
            $imageName = time().'_'.$request->file('image')->getClientOriginalName();
            $request->file('image')->storePubliclyAs('evenement', $imageName);
            $validated['image'] = $imageName;
        }
        

        $evenement->update($validated);

        return redirect()->route('evenements.liste')->with('success', 'Événement mis à jour.');
    }

    public function destroy(Evenements $evenement)
    {
        /* $this->authorize('delete', $evenement); */
        $evenement->delete();
        return redirect()->route('evenements.liste')->with('success', 'Événement supprimé.');
    }

     // Afficher un article
    public function show(Evenements $evenement)
    {
        /* $this->authorize('view', $evenement); */
        return view('evenements.show', compact('evenement'));
    }
}
