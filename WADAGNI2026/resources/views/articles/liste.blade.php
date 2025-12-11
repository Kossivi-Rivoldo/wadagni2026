<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des articles</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
/* ------- GENERAL ------- */
body { 
    background-color: #f2f5fa; 
    font-family: "Inter", sans-serif;
    margin: 0;
    padding: 0;
}

/* ------- SIDEBAR RETRACTABLE ------- */
.sidebar {
    background-color: #0d47a1;
    color: white;
    width: 75px;
    transition: width 0.3s ease;
    overflow: hidden;
    position: fixed;
    top: 0;
    bottom: 0;
    padding-top: 20px;
    z-index: 1000;
}

.sidebar:hover {
    width: 240px;
}

.sidebar a {
    color: white;
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px 18px;
    text-decoration: none;
    white-space: nowrap;
    font-size: 15px;
    transition: background 0.2s ease, padding-left 0.3s ease;
}

.sidebar a:hover {
    background-color: #094080;
    padding-left: 25px;
}

/* Texte visible seulement quand la sidebar est ouverte */
.menu-text {
    opacity: 0;
    transition: opacity 0.25s ease;
}

.sidebar:hover .menu-text {
    opacity: 1;
}

/* ------- MAIN CONTENT SHIFT ------- */
.main-content {
    margin-left: 90px; /* espace quand sidebar réduite */
    transition: margin-left 0.3s ease;
    padding: 25px;
}

.sidebar:hover ~ .main-content {
    margin-left: 260px; /* espace quand sidebar dépliée */
}

/* ------- CARDS ------- */
.card {
    border-radius: 15px;
    border: none;
}

.card-body {
    padding: 20px;
}

        </style>
</head>
<body>

<div class="sidebar">
    
    <a href="{{ route('dashboard') }}">
        <i class="bi bi-speedometer2"></i>
        <span class="menu-text">Dashboard</span>
    </a>

    @if(auth()->user()->role === 'admin')
        <a href="{{ route('users.index') }}">
            <i class="bi bi-people"></i>
            <span class="menu-text">Gestion des éditeurs</span>
        </a>

        <a href="{{ route('benevoles.liste') }}">
            <i class="bi bi-person-badge"></i>
            <span class="menu-text">Liste des bénévoles</span>
        </a>

        <a href="{{ route('dons.liste') }}">
            <i class="bi bi-cash-stack"></i>
            <span class="menu-text">Liste des dons</span>
        </a>
    @endif

    <a href="{{ route('articles.liste') }}">
        <i class="bi bi-journal-text"></i>
        <span class="menu-text">Articles</span>
    </a>

    <a href="{{ route('evenements.liste') }}">
        <i class="bi bi-calendar-event"></i>
        <span class="menu-text">Événements</span>
    </a>

    <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn w-100 d-flex align-items-center gap-2 text-white" style="background: none; border: none; padding: 12px 15px; text-align: left;">
                    <i class="bi bi-box-arrow-right"></i>
                    <span class="menu-text">Se déconnecter</span>
                </button>
            </form>
</div>

<!-- MAIN CONTENT -->
<div class="main-content">

    <h1 class="mb-4">Liste des Articles</h1>

    @foreach($articles as $category => $articlesByCategory)
        <h3 class="mt-4 text-primary">{{ $category }}</h3>

        <div class="row">
            @foreach($articlesByCategory as $article)
                <div class="col-md-4 mb-3">
                    <div class="card shadow-sm p-2">
                        <div class="card-body">
                            <h5>{{ $article->title }}</h5>

                            <p>{{ Str::limit($article->content, 100) }}</p>

                            <p class="text-muted">
                                Publié par : {{ $article->user->nom }}<br>
                                Le : {{ $article->created_at->format('d/m/Y') }}
                            </p>

                            <a href="{{ route('articles.show', $article->id_art) }}" class="btn btn-sm btn-primary">Voir</a>

                            @if(Auth::user()->role === 'admin' || Auth::id() === $article->user_id)
                                <a href="{{ route('articles.edit', $article->id_art) }}" class="btn btn-sm btn-warning">Modifier</a>

                                <form action="{{ route('articles.destroy', $article->id_art) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Supprimer cet article ?')">
                                        Supprimer
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    @endforeach
</div>

</body>
</html>
