<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des utilisateurs</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        /* ------- GENERAL ------- */
        body { 
            background-color: #f8f9fa; 
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

        .menu-text {  
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .sidebar:hover .menu-text {
            opacity: 1;
        }

        /* ------- MAIN CONTENT ------- */
        .main-content {
            margin-left: 90px;
            transition: margin-left 0.3s ease;
            padding: 20px;
        }

        /* Table style */
        .table thead {
            background-color: #0d47a1;
            color: white;
        }

        .btn-crud {
            background-color: #0d47a1;
            color: white;
        }

        .btn-crud:hover {
            background-color: #094080;
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

        <!-- MAIN CONTENT -->
        <div class="col-md-10 main-content">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2>Liste des utilisateurs</h2>
                <a href="{{ route('users.create') }}" class="btn btn-success">Créer un utilisateur</a>
            </div>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Rôle</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->nom }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
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
</body>
</html>
