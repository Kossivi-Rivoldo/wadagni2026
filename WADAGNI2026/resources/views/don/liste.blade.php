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
<div class="main-content" style="margin-left: 70px; transition: margin-left 0.3s ease;">
    <div class="container-fluid mt-4">
        <h2 class="mb-4">Liste des dons</h2>

        <div class="row g-3">
            @forelse($dons as $don)
                <div class="col-md-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $don->nom_donateur }}</h5>
                            <p class="mb-1"><strong>Type de don:</strong> {{ ucfirst($don->type_don) }}</p>

                            @if($don->type_don === 'espece')
                                <p class="mb-1"><strong>Montant:</strong> {{ number_format($don->montant, 0, ',', ' ') }} FCFA</p>
                                <p class="mb-1"><strong>Moyen de paiement:</strong> {{ ucfirst(str_replace('_', ' ', $don->moyen_paiement)) }}</p>
                            @else
                                <p class="mb-1"><strong>Quantité:</strong> {{ $don->quantite }}</p>
                                <p class="mb-1"><strong>Description:</strong> {{ $don->description }}</p>
                            @endif

                            <p class="text-muted"><small>Date: {{ \Carbon\Carbon::parse($don->date)->format('d/m/Y') }}</small></p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info text-center">Aucun don enregistré pour le moment.</div>
                </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        <div class="d-flex justify-content-center mt-4">
            {{ $dons->links() }}
        </div>
    </div>
</div>

<script>
document.querySelector('.sidebar').addEventListener('mouseenter', function () {
    document.querySelector('.main-content').style.marginLeft = "230px";
});
document.querySelector('.sidebar').addEventListener('mouseleave', function () {
    document.querySelector('.main-content').style.marginLeft = "70px";
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>