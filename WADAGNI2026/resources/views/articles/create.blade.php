<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un article</title>

    <!-- Bootstrap + Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
/* ------- GENERAL ------- */
body { 
    background-color: #f2f5fa; 
    font-family: "Inter", sans-serif;
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
    gap: 14px;
    padding: 12px 18px;
    text-decoration: none;
    white-space: nowrap;
    font-size: 15px;
    transition: background 0.2s, padding-left 0.3s;
}

.sidebar a:hover {
    background-color: #094080;
    padding-left: 25px;
}

.sidebar a i {
    font-size: 20px;
    min-width: 24px;
    text-align: center;
}

/* Texte caché en mode rétracté */
.menu-text {
    opacity: 0;
    transition: opacity 0.3s ease;
}

.sidebar:hover .menu-text {
    opacity: 1;
}

/* ------- MAIN CONTENT SHIFT ------- */
.main-content {
    margin-left: 95px;
    transition: margin-left 0.3s ease;
}

.sidebar:hover ~ .main-content {
    margin-left: 255px;
}

/* ------- CARDS ------- */
.card {
    border-radius: 15px;
    border: none;
    overflow: hidden;
}

.card-header {
    background: #0d47a1;
    color: white;
    font-weight: 600;
}

    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        
        <!-- Sidebar -->
        <div class="col-md-2 sidebar">

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

        <!-- Main content -->
        <div class="col-md-10 p-4 main-content">
            <h3>Créer un nouvel article</h3>

            <!-- SECTION 1 : Catégorie -->
            <div class="card shadow-sm mb-4">
                <div class="card-header">Créer une catégorie d'article</div>
                <div class="card-body">
                    <form action="{{ route('categories.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nom_cat" class="form-label">Nom de la catégorie</label>
                            <input type="text" class="form-control" id="nom_cat" name="nom_cat" required>
                        </div>
                        <input type="hidden" name="id_user" value="{{ auth()->user()->id }}">
                        <button type="submit" class="btn btn-primary">Créer la catégorie</button>
                    </form>
                </div>
            </div>

            <!-- SECTION 2 : Article -->
            <div class="card shadow-sm">
                <div class="card-header">Formulaire de création d'article</div>
                <div class="card-body">
                    <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="id_cat" class="form-label">Catégorie</label>
                            <select class="form-select" id="id_cat" name="id_cat" required>
                                <option value="">Sélectionner une catégorie</option>
                                @foreach($categories as $categorie)
                                    <option value="{{ $categorie->id_cat }}">{{ $categorie->nom_cat }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="titre_art" class="form-label">Titre</label>
                            <input type="text" class="form-control" id="titre_art" name="titre_art" required>
                        </div>

                        <div class="mb-3">
                            <label for="extr_art" class="form-label">Extrait</label>
                            <textarea class="form-control" id="extr_art" name="extr_art" rows="2" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="contenu" class="form-label">Contenu</label>
                            <textarea class="form-control" id="contenu" name="contenu" rows="5" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>

                        <div class="mb-3">
                            <label for="video" class="form-label">Vidéo</label>
                            <input type="file" class="form-control" id="video" name="video">
                        </div>

                        <input type="hidden" name="id_user" value="{{ auth()->user()->id }}">

                        <button type="submit" class="btn btn-primary">Créer l'article</button>
                    </form>
                </div>
            </div>

        </div>

    </div>
</div>

<!-- Script Sidebar -->
<script>
const sidebar = document.querySelector('.sidebar');
const mainContent = document.querySelector('.main-content');

sidebar.addEventListener('mouseenter', () => {
    mainContent.style.marginLeft = "255px";
});

sidebar.addEventListener('mouseleave', () => {
    mainContent.style.marginLeft = "95px";
});
</script>

</body>
</html>
