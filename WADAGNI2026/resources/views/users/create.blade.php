<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un éditeur</title>

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
    width: 70px;
    transition: width 0.3s ease;
    overflow: hidden;
    position: fixed;
    top: 0;
    bottom: 0;
    padding-top: 20px;
    z-index: 1000;
}

.sidebar:hover {
    width: 230px;
}

.sidebar a {
    color: white;
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 12px 15px;
    text-decoration: none;
    white-space: nowrap;
    font-size: 15px;
    transition: background 0.2s ease, padding-left 0.3s ease;
}

.sidebar a:hover {
    background-color: #094080;
    padding-left: 22px;
}

.menu-text {  
    opacity: 0;
    transition: opacity 0.3s ease;
}

.sidebar:hover .menu-text {
    opacity: 1;
}

/* ------- MAIN CONTENT SHIFT ------- */
.main-content {
    margin-left: 90px;
    transition: margin-left 0.3s ease;
}

.sidebar:hover ~ .main-content {
    margin-left: 250px;
}
    </style>
</head>

<body>

<div class="container-fluid">
    <div class="row">

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
        <div class="col-md-10 main-content">
            <div class="container mt-5">

                <h3 class="mb-4">Créer un nouvel éditeur</h3>

                <form action="{{ route('users.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom complet</label>
                        <input type="text" class="form-control" id="nom" name="nom" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="mb-3">
                        <label for="fonction" class="form-label">Fonction</label>
                        <input type="text" class="form-control" id="fonction" name="fonction">
                    </div>

                    <button type="submit" class="btn btn-primary">Créer l’éditeur</button>

                </form>

            </div>
        </div>

    </div>
</div>

</body>

<script>
document.querySelector('.sidebar').addEventListener('mouseenter', function () {
    document.querySelector('.main-content').style.marginLeft = "250px";
});

document.querySelector('.sidebar').addEventListener('mouseleave', function () {
    document.querySelector('.main-content').style.marginLeft = "90px";
});
</script>

</html>
