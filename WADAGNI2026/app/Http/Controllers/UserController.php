<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Articles;
use App\Models\Evenements;
use App\Models\Benevoles;
use App\Models\Dons;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
   /*  public function __construct()
    {
        $this->middleware('auth');
    } */

    // Dashboard unique pour admin et éditeur
    public function dashboard()
    {
        if (auth()->user()->role === 'admin') {
            // Données admin
            $articles = Articles::count();
            $evenements = Evenements::count();
            $benevoles = Benevoles::count();
            $dons = Dons::count();
            $editeurs = User::where('role', 'editeur')->get();

            return view('dashboard', compact('articles', 'evenements', 'benevoles', 'dons', 'editeurs'));
        } else {
            // Données éditeur
            $articles = Articles::where('user_id', auth()->id())->count();
            $evenements = Evenements::where('user_id', auth()->id())->count();

            return view('dashboard', compact('articles', 'evenements'));
        }
    }

    // Liste des éditeurs (admin uniquement)
    public function index()
    {
        /* $this->authorize('viewAny', User::class); */
        $users = User::where('role', 'editeur')->latest()->paginate(10);
        return view('users.index', compact('users'));
    }

    // Formulaire de création éditeur (admin uniquement)
    public function create()
    {
       /*  $this->authorize('create', User::class); */
        return view('users.create');
    }

    // Stockage d'un nouvel éditeur et envoi email
    public function store(Request $request)
    {
        /* $this->authorize('create', User::class); */

        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'fonction' => 'nullable|string|max:255',
        ]);

        // Génération d'un mot de passe aléatoire
        $password = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 8);

        $user = User::create([
            'nom' => $validated['nom'],
            'email' => $validated['email'],
            'fonction' => $validated['fonction'] ?? null,
            'role' => 'editeur',
            'password' => Hash::make($password),
        ]);

        Mail::raw(
            "Bonjour {$user->nom},\n\nVoici vos identifiants :\nEmail : {$user->email}\nMot de passe : {$password}",
            function ($message) use ($user) {
                $message->to($user->email)
                        ->subject('Vos identifiants pour le système')
                        ->from(config('mail.from.address'), config('mail.from.name'));
    });

        return redirect()->route('users.index')->with('success', 'Éditeur créé et email envoyé.');
    }
}
