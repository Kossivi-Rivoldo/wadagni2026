<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        body { 
            background-color: #f2f5fa; 
            font-family: "Inter", sans-serif;
        }

        /* SIDEBAR */
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

        /* MAIN CONTENT */
        .main-content {
            margin-left: 90px;
            transition: margin-left 0.3s ease;
            padding: 20px;
        }

        /* CARDS */
        .card {
            border-radius: 15px;
            border: none;
            overflow: hidden;
        }

        .card-header {
            background-color: #0d47a1;
            color: white;
            font-weight: 600;
            font-size: 16px;
        }

        .card-body h5 {
            font-size: 26px;
            font-weight: 700;
            margin-bottom: 15px;
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

        /* TABLE STYLE */
        .table thead {
            background: #0d47a1;
            color: white;
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
            <h3>Bienvenue, {{ auth()->user()->nom }} !</h3>

            <div class="row mt-4">
                <!-- ARTICLES CARD -->
                <div class="col-md-3 mb-3">
                    <div class="card text-center shadow-sm">
                        <div class="card-header">Articles</div>
                        <div class="card-body">
                            <h5>{{ $articles ?? 0 }}</h5>
                            <a href="{{ route('articles.create') }}" class="btn btn-light btn-crud">Créer</a>
                            <a href="{{ route('articles.liste') }}" class="btn btn-light btn-crud">Gérer</a>
                        </div>
                    </div>
                </div>

                <!-- ÉVÉNEMENTS CARD -->
                <div class="col-md-3 mb-3">
                    <div class="card text-center shadow-sm">
                        <div class="card-header">Événements</div>
                        <div class="card-body">
                            <h5>{{ $evenements ?? 0 }}</h5>
                            <a href="{{ route('evenements.create') }}" class="btn btn-light btn-crud">Créer</a>
                            <a href="{{ route('evenements.liste') }}" class="btn btn-light btn-crud">Gérer</a>
                        </div>
                    </div>
                </div>

                @if(auth()->user()->role === 'admin')
                    <!-- BÉNÉVOLES CARD -->
                    <div class="col-md-3 mb-3">
                        <div class="card text-center shadow-sm">
                            <div class="card-header">Bénévoles</div>
                            <div class="card-body">
                                <h5>{{ $benevoles ?? 0 }}</h5>
                                <a href="{{ route('benevoles.liste') }}" class="btn btn-light btn-crud">Voir</a>
                            </div>
                        </div>
                    </div>

                    <!-- DONS CARD -->
                    <div class="col-md-3 mb-3">
                        <div class="card text-center shadow-sm">
                            <div class="card-header">Dons</div>
                            <div class="card-body">
                                <h5>{{ $dons ?? 0 }}</h5>
                                <a href="{{ route('dons.liste') }}" class="btn btn-light btn-crud">Voir</a>
                            </div>
                        </div>
                    </div>

                    <!-- ÉDITEURS TABLE -->
                    <div class="col-12 mt-4">
                        <h5>Liste des éditeurs</h5>
                        <table class="table table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>Nom</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($editeurs as $editeur)
                                    <tr>
                                        <td>{{ $editeur->nom }}</td>
                                        <td>{{ $editeur->email }}</td>
                                        <td>—</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<script>
document.querySelector('.sidebar').addEventListener('mouseenter', function () {
    document.querySelector('.main-content').style.marginLeft = "250px";
});
document.querySelector('.sidebar').addEventListener('mouseleave', function () {
    document.querySelector('.main-content').style.marginLeft = "90px";
});
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>