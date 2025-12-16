<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dons;
use GuzzleHttp\Client;

class DonController extends Controller
{
    public function create()
    {
        return view('don');
    }

   public function store(Request $request)
{
    if($request->type_don === 'espece') {
        // Vérifier que la transaction existe
        if(!$request->transaction_id) {
            return back()->with('error', 'Transaction introuvable. Paiement non validé.');
        }

        // Ici tu peux appeler l’API FedaPay pour vérifier le paiement si tu veux
    }

    // Stockage en base
    Dons::create([
        'nom_donateur' => $request->nom_donateur,
        'type_don' => $request->type_don,
        'montant' => $request->montant,
        'moyen_paiement' => $request->moyen_paiement,
        'date' => $request->date,
        'transaction_id' => $request->transaction_id,
        'quantite' => $request->quantite,
        'description' => $request->description,
    ]);

    return back()->with('success', 'Don enregistré avec succès !');
}


    // Liste des dons
    public function liste()
    {
        $dons = Dons::orderBy('date', 'desc')->paginate(10);
        return view('don.liste', compact('dons'));
    }
}
