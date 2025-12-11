<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Article_cats;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /* public function __construct()
    {
        $this->middleware('auth');
    }
 */
// Liste des articles
        public function listeArticles()
{
    if (Auth::user()->role === 'admin') {
        // Admin voit tous les articles
        $articles = Articles::with('user') // sans 's'
            ->orderBy('created_at', 'desc')
            ->get()
            ->groupBy('id_cat'); // ou 'category' si tu as un accessor
    } else {
        // Editeur voit seulement ses articles
        $articles = Articles::with('user')
            ->where('id_user', Auth::id()) // id_user = bonne colonne
            ->orderBy('created_at', 'desc')
            ->get()
            ->groupBy('id_cat'); // idem
    }

    return view('articles.liste', compact('articles'));
}

    // Afficher la liste des articles
    public function index()
    {
       // Récupère tous les articles avec leur catégorie et l'auteur
    $articles = Articles::with(['categorie', 'user'])
                ->latest()
                ->paginate(10); // Pagination 10 articles par page

    return view('actualite', compact('articles'));

    return view('actualite',compact('articles'));
    }

    //acualite de la page home 

    public function home()
{
    $articles = Articles::with('user')
        ->orderBy('created_at', 'desc')
        ->take(3)
        ->get();

    return view('home', compact('articles'));
}


    // Afficher le formulaire de création
    public function create()
    {
        //$this->authorize('create', Articles::class);

        $categories = Article_cats::all();
        return view('articles.create', compact('categories'));
    }


     // Enregistrer un nouvel article
    public function store_cat(Request $request)
    {
        //$this->authorize('create', Article::class);

            $validated = $request->validate([
            'nom_cat' => 'required|string|max:255',
        ]);


        


        $validated['id_user'] = Auth::id();

        Article_cats::create($validated);

        return redirect()->route('articles.create')->with('success', 'Article créé avec succès.');
    }

    // Enregistrer un nouvel article
    public function store(Request $request)
    {
        //$this->authorize('create', Article::class);

            $validated = $request->validate([
            'id_cat' => 'required|exists:article_cats,id_cat',
            'titre_art' => 'required|string|max:255',
            'extr_art' => 'nullable|string',
            'contenu' => 'required|string',
            'id_cat' => 'required|exists:article_cats,id_cat',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'video' => 'nullable|file|mimes:mp4,mov,avi,mkv|max:102400', // max 100MB
        ]);


        if ($request->hasFile('image')) {
            $imageName = time().'_'.$request->file('image')->getClientOriginalName();
            $request->file('image')->storePubliclyAs('articles', $imageName);
            $validated['image'] = $imageName;
        }
        if ($request->hasFile('video')) {
            $videoName = time().'_'.$request->file('video')->getClientOriginalName();
            $request->file('video')->storePubliclyAs('videos', $videoName);
            $validated['video'] = $videoName;
        }


        $validated['id_user'] = Auth::id();

        Articles::create($validated);

        return redirect()->route('articles.liste')->with('success', 'Article créé avec succès.');
    }

    // Afficher un article
    public function show(Articles $article)
    {
        /* $this->authorize('view', $article); */
        return view('articles.show', compact('article'));
    }

    // Afficher le formulaire d'édition
    public function edit(Articles $article)
    {
       /*  $this->authorize('update', $article); */

        $categories = Article_cats::all();
        return view('articles.edit', compact('article', 'categories'));
    }

    // Mettre à jour un article
    public function update(Request $request, Articles $article)
    {
        /* $this->authorize('update', $article); */

        $validated = $request->validate([
        'id_cat' => 'required|exists:article_cats,id_cat',
        'titre_art' => 'required|string|max:255',
        'extr_art' => 'nullable|string',
        'contenu' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'video' => 'nullable|file|mimes:mp4,mov,avi,mkv|max:102400', // max 100MB
        
    ]);


        if ($request->hasFile('image')) {
            $imageName = time().'_'.$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/articles', $imageName);
            $validated['image'] = $imageName;
        }
        if ($request->hasFile('video')) {
            $videoName = time().'_'.$request->file('video')->getClientOriginalName();
            $request->file('video')->storeAs('public/videos', $videoName);
            $validated['video'] = $videoName;
        }


        $article->update($validated);

        return redirect()->route('articles.index')->with('success', 'Article mis à jour avec succès.');
    }

    // Supprimer un article
    public function destroy(Articles $article)
    {
        /* $this->authorize('delete', $article); */
        $article->delete();

        return redirect()->route('articles.index')->with('success', 'Article supprimé avec succès.');
    }
}
