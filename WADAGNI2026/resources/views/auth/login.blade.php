{{-- <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
        }
        .login-container {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .login-card {
            background-color: #fff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px;
        }
        .btn-login {
            background-color: #0d47a1;
            color: #fff;
        }
        .btn-login:hover {
            background-color: #08306b;
            color: #fff;
        }
        .form-control:focus {
            border-color: #0d47a1;
            box-shadow: 0 0 0 0.2rem rgba(13,71,161,.25);
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <h3 class="text-center mb-4">Connexion</h3>
            
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required autofocus>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-login w-100">Se connecter</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> --}}
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion | Candidature</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            background: linear-gradient(135deg, #0d47a1, #1976d2);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-card {
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 25px 60px rgba(0,0,0,0.25);
            overflow: hidden;
            animation: fadeInUp 1.2s;
        }

        .login-left {
            background: linear-gradient(160deg, #0d47a1, #42a5f5);
            color: #fff;
            padding: 40px;
        }

        .login-left h1 {
            font-weight: 700;
        }

        .login-right {
            padding: 40px;
        }

        .form-control {
            border-radius: 12px;
            padding-left: 45px;
        }

        .input-icon {
            position: absolute;
            top: 50%;
            left: 15px;
            transform: translateY(-50%);
            color: #0d47a1;
        }

        .btn-login {
            border-radius: 12px;
            padding: 12px;
            font-weight: 600;
            background: linear-gradient(135deg, #0d47a1, #1976d2);
            border: none;
            transition: all 0.4s ease;
        }

        .btn-login:hover {
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 15px 35px rgba(13,71,161,0.4);
        }

        .floating {
            animation: floating 3s ease-in-out infinite;
        }

        @keyframes floating {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }

        @media (max-width: 768px) {
            .login-left {
                display: none;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="login-card row">

                <!-- LEFT -->
                <div class="col-md-6 login-left d-flex flex-column justify-content-center">
                    <h1 class="mb-3 animate__animated animate__fadeInLeft">Bienvenue</h1>
                    <p class="opacity-75 animate__animated animate__fadeInLeft animate__delay-1s">
                        Accédez à votre espace professionnel sécurisé.
                    </p>
                    <div class="mt-4 floating">
                        <i class="bi bi-shield-lock-fill" style="font-size: 90px;"></i>
                    </div>
                </div>

                <!-- RIGHT -->
                <div class="col-md-6 login-right">
                    <h3 class="fw-bold mb-4 text-center animate__animated animate__fadeInDown">Connexion</h3>

                    @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <!-- Email -->
                        <div class="mb-3 position-relative animate__animated animate__fadeInUp">
                            <i class="bi bi-envelope-fill input-icon"></i>
                            <input type="email" class="form-control" placeholder="Adresse email" required name="email">
                        </div>

                        <!-- Password -->
                        <div class="mb-3 position-relative animate__animated animate__fadeInUp animate__delay-1s">
                            <i class="bi bi-lock-fill input-icon"></i>
                            <input type="password" class="form-control" placeholder="Mot de passe" required name="password">
                        </div>

                        <!-- Options -->
                        <div class="d-flex justify-content-between mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="remember">
                                <label class="form-check-label" for="remember">Se souvenir de moi</label>
                            </div>
                            <a href="#" class="text-primary text-decoration-none">Mot de passe oublié ?</a>
                        </div>

                        <!-- Button -->
                        <button type="submit" class="btn btn-login text-white w-100 animate__animated animate__fadeInUp animate__delay-2s">
                            <i class="bi bi-box-arrow-in-right me-2"></i> Se connecter
                        </button>
                    </form>

                    <p class="text-center mt-4 text-muted">© 2025 · Interface professionnelle</p>
                </div>

            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
