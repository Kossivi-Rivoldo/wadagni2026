<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dons;

class DonController extends Controller
{
    // Afficher le formulaire
    public function create()
    {
        return view('don');
    }

    // Enregistrer le don
    public function store(Request $request)
    {
        $request->validate([
            'nom_donateur' => 'required|string|max:255',
            'type_don' => 'required|in:espece,nature',
            'montant' => 'required_if:type_don,espece|nullable|numeric|min:0',
            'quantite' => 'required_if:type_don,nature|nullable|integer|min:1',
            'description' => 'nullable|string',
            'date' => 'required|date',
        ]);

        Dons::create($request->all());

        return redirect()->back()->with('success', 'Don enregistré avec succès !');
    }

    public function liste()
    {
        // Pagination, 10 dons par page
        $dons = Dons::orderBy('date', 'desc')->paginate(10);

        return view('don.liste', compact('dons'));
}

}
