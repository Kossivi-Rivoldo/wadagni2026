<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un événement</title>

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

/* Texte visible seulement quand sidebar ouverte */
.menu-text {
    opacity: 0;
    transition: opacity 0.25s ease;
}

.sidebar:hover .menu-text {
    opacity: 1;
}

/* ------- MAIN CONTENT SHIFT ------- */
.main-content {
    margin-left: 90px;
    transition: margin-left 0.3s ease;
    padding: 25px;
}

.sidebar:hover ~ .main-content {
    margin-left: 260px;
}

/* ------- CARDS ------- */
.card {
    border-radius: 15px;
    border: none;
}

.card-header {
    background: #0d47a1;
    color: white;
    font-weight: 600;
    font-size: 16px;
}

.btn-crud {
    background: #0d47a1;
    color: white;
    border-radius: 8px;
    transition: 0.3s;
    margin: 4px;
}

.btn-crud:hover {
    background: #094080;
    transform: translateY(-2px);
}

.sidebar button {
    background: white;
    color: #0d47a1;
    border-radius: 8px;
    font-weight: 600;
    margin-top: 20px;
}

.sidebar button:hover {
    background: #e6e6e6;
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
    <h3 class="mb-4">Créer un événement</h3>

    <div class="card shadow-sm">
        <div class="card-header">Nouvel événement</div>

        <div class="card-body">
            <form action="{{ route('evenements.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Thème</label>
                    <input type="text" name="theme" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Lieu</label>
                    <input type="text" name="lieux" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Heure</label>
                    <input type="time" name="heure" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Date</label>
                    <input type="date" name="date" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Image (optionnel)</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <input type="hidden" name="id_user" value="{{ auth()->user()->id }}">

                <button type="submit" class="btn text-white" style="background-color:#0d47a1;">
                    Enregistrer
                </button>

                <a href="{{ route('evenements.liste') }}" class="btn btn-secondary">Annuler</a>

            </form>
        </div>
    </div>
</div>

</body>
</html>
