<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des événements</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        body { 
            background-color: #f2f5fa; 
            font-family: "Inter", sans-serif;
        }

        /* ------- SIDEBAR ------- */
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

        /* Text hidden when sidebar collapsed */
        .menu-text {
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .sidebar:hover .menu-text {
            opacity: 1;
        }

        /* ------- MAIN CONTENT MOVING ------- */
        .main-content {
            margin-left: 90px;
            padding: 25px;
            transition: margin-left 0.3s ease;
        }

        .sidebar:hover ~ .main-content {
            margin-left: 250px;
        }

        /* Cards */
        .card {
            border-radius: 12px;
            border: none;
            overflow: hidden;
        }

        .btn-danger,
        .btn-warning,
        .btn-primary {
            border-radius: 8px;
        }

    </style>
</head>

<body>

<div class="container-fluid">
    <div class="row">

        <!-- SIDEBAR -->
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

            <a href="{{ route('benevoles.index') }}">
                <i class="bi bi-person-badge"></i>
                <span class="menu-text">Liste des bénévoles</span>
            </a>

            <a href="{{ route('dons.index') }}">
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

            <h1 class="mb-4">Liste des Événements</h1>

            @foreach($evenements as $category => $evenementsByCategory)
                <h3 class="mt-4 text-primary">{{ $category }}</h3>

                <div class="row">
                    @foreach($evenementsByCategory as $evenement)
                        <div class="col-md-4 mb-3">
                            <div class="card p-2 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $evenement->title }}</h5>
                                    <p class="card-text">{{ Str::limit($evenement->description, 100) }}</p>
                                    <p class="text-muted">
                                        Publié par: {{ $evenement->user->nom }}<br>
                                        Le: {{ $evenement->created_at->format('d/m/Y') }}
                                    </p>

                                    <a href="{{ route('evenements.show', $evenement->id) }}" class="btn btn-sm btn-primary">Voir</a>

                                    @if(Auth::user()->role === 'admin' || Auth::id() === $evenement->user_id)
                                        <a href="{{ route('evenements.edit', $evenement->id) }}" class="btn btn-sm btn-warning">Modifier</a>

                                        <form action="{{ route('evenements.destroy', $evenement->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" onclick="return confirm('Supprimer cet événement ?')">
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

    </div>
</div>

</body>
</html>
