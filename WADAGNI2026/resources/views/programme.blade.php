<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jeunesse WADAGNI Nationale</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        body {
            font-family: "Segoe UI", sans-serif;
            overflow-x: hidden;
        }

        .hero-title {
            font-size: 42px;
            font-weight: 700;
            line-height: 1.2;
        }

        .vision-box, .piliers-card {
            background: #EFEFEF;
            padding: 25px;
            border-radius: 12px;
        }

        .vision-box {
            background: #E4F4EE;
        }

        /* Effets */
        a, button {
            transition: 0.3s;
        }

        img.movable {
            transition: transform 0.2s ease-out;
        }

        /* Animation scroll */
        .scroll-anim {
            opacity: 0;
            transform: translateY(35px);
            transition: all 0.9s ease-out;
        }

        .scroll-visible {
            opacity: 1 !important;
            transform: translateY(0) !important;
        }

        /* Logo */
        .logo-header, .logo-footer {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
        }

        nav.navbar {
            background-color: #0d6efd !important;
        }

        nav .navbar-brand, nav .nav-link, nav .btn {
            color: white !important;
        }
    </style>
</head>

<body>

<div class="bg-primary text-white text-center fw-bold py-2">
    <marquee>
        <h5>REJOIGNEZ LE MOUVEMENT JEUNESSE WADAGNI NATIONNALE  +229 97 00 00 00</h5>
    </marquee>
</div>

<!-- HEADER -->
<header class="bg-white py-3 shadow-xl">
    <div class="container d-flex align-items-center justify-content-between">

        <!-- AJOUT DU LOGO + TEXTE EN FLEX -->
        <div class="d-flex align-items-center">
               <img src="image/dagni.jpg" alt="logo" class="logo-footer">

            <div class="text-primary fw-bold me-2 text-center" style="line-height: 0.9;">
                JEUNESSE<br>WADAGNI<br>NATIONNALE
            </div>
        </div>

        <nav class="d-none d-md-flex gap-4">
            <a href="home" class="text-primary fw-semibold text-decoration-none">Accueil</a>
            <a href="programme" class="text-primary fw-semibold text-decoration-none">Programme</a>
            <a href="evenement" class="text-primary fw-semibold text-decoration-none">Evénement</a>
            <a href="actualite" class="text-primary fw-semibold text-decoration-none">Actualité</a>
            <a href="benevolat" class="text-primary fw-semibold text-decoration-none">Bénévolat</a>
        </nav>

        <a href="don" class="btn btn-primary px-4">Faire un don</a>
        

    </div>
</header>

    <!-- HERO -->
    <div class="container py-5">
        <div class="row align-items-center">

            <div class="col-lg-6">
                <h1 class="hero-title text-primary scroll-anim">Pour un Bénin<br>Prospère.</h1>
                <h1 class="hero-title scroll-anim">Pour un Avenir<br>Responsable.</h1>
                 <!-- Developed with ❤️ by R I V O L D O -->
                <p class="mt-3 scroll-anim">
                    Une vision nouvelle pour le développement du Bénin, portée par une jeunesse déterminée
                    et engagée pour l’avenir de notre nation.
                </p>

                <div class="d-flex gap-3 mt-3 flex-wrap scroll-anim">
                    <a href="#" class="btn btn-primary rounded-3 px-4 py-2">Découvrir la plateforme</a>
                    <a href="#" class="btn btn-outline-primary rounded-3 px-4 py-2">Nous rejoindre</a>
                </div>
            </div>

            <div class="col-lg-6 mt-4 mt-lg-0">
                <img src="image/wa1.jpg" class="img-fluid rounded shadow movable scroll-anim" alt="Image Politique">
            </div>

        </div>
    </div>

    <!-- NOTRE VISION -->
    <div class="container py-4">
        <h3 class="text-center fw-bold mb-4 scroll-anim">Notre vision</h3>
        <p class="text-center mb-4 scroll-anim">L’orientation de Jeunesse WADAGNI Nationale</p>

        <div class="row g-4">

            <div class="col-md-4 scroll-anim">
                <div class="vision-box text-center">
                    <i class="bi bi-graph-up-arrow fs-1 text-primary mb-3"></i>
                    <h5 class="fw-bold">Transformation économique</h5>
                    <p>Bâtir une économie moderne, inclusive et diversifiée qui crée des opportunités pour tous les Béninois.</p>
                </div>
            </div>

            <div class="col-md-4 scroll-anim">
                <div class="vision-box text-center">
                    <i class="bi bi-people-fill fs-1 text-primary mb-3"></i>
                    <h5 class="fw-bold">Autonomisation de la jeunesse</h5>
                    <p>Placer la jeunesse au cœur du développement national avec des politiques adaptées et des ressources dédiées.</p>
                </div>
            </div>

            <div class="col-md-4 scroll-anim">
                <div class="vision-box text-center">
                    <i class="fa-solid fa-scale-balanced fs-1 text-primary mb-3"></i>
                    <h5 class="fw-bold">Justice sociale</h5>
                    <p>Garantir l'équité, la dignité et l'accès aux services essentiels pour chaque citoyen béninois.</p>
                </div>
            </div>

        </div>
    </div>

    <!-- BLOC BLEU -->
    <div class="container py-5">
        <div class="bg-primary text-white rounded-3 p-5 text-center">
            <h3 class="fw-bold scroll-anim">Une Vision pour le Bénin de Demain</h3>
            <p class="mt-3 scroll-anim">
                Jeunesse WADAGNI National porte une vision ambitieuse et réaliste pour le Bénin...
            </p>
            <p class="mb-0 scroll-anim">
                Notre engagement est de transformer cette vision en réalité concrète...
            </p>
        </div>
    </div>

    <!-- SECTION JEUNESSE -->
    <div class="container text-center py-5">
        <h2 class="fw-bold scroll-anim">La Jeunesse au Cœur du Changement</h2>
        <p class="mt-3 scroll-anim">
            Ensemble, construisons le Bénin de demain...
        </p>

        <a href="#" class="btn btn-primary rounded-3 px-4 py-2 mt-3 scroll-anim">REJOIGNEZ LE MOUVEMENT</a>
    </div>

    <!-- FOOTER  -->
    <footer class="bg-primary text-white py-5 ">
        <div class="container">

            <div class="row d-flex">

                <div class="col-md-4 mb-4 mb-md-0 text-center text-md-start">
                    <div class="d-flex align-items-center gap-3">
                          <img src="image/dagni.jpg" alt="logo" class="logo-footer">
                        <h5 class="fw-bold m-0">
                            JEUNESSE<br>WADAGNI<br>NATIONNALE
                        </h5>
                    </div>

                    <p class="mt-3">
                        Ensemble, construisons un Bénin fort et prospère. <br>
                        Un leadership moderne pour un avenir meilleur.
                    </p>
                </div>

                <div class="col-md-4 mb-4 mb-md-0">
                    <h5 class="fw-bold">Liens Rapides</h5>
                    <ul class="list-unstyled mt-3">
                        <li><a class="text-white text-decoration-none" href="#">Accueil</a></li>
                        <li><a class="text-white text-decoration-none" href="#">Programme</a></li>
                        <li><a class="text-white text-decoration-none" href="#">Evénements</a></li>
                        <li><a class="text-white text-decoration-none" href="#">Actualités</a></li>
                    </ul>
                </div>

                <div class="col-md-4">
                    <h5 class="fw-bold">Contacts</h5>
                    <p class="mt-3">+229 97 00 00 00</p>
                    <p>Lun - Sam: 8h - 18h</p>
                    <a class="text-white text-decoration-none" href="#">Mentions Légales</a><br>
                    <a class="text-white text-decoration-none" href="#">Politique de confidentialité</a>
                </div>

            </div>

            <hr class="border-light mt-4">
            <p class="text-center mt-3">
                © 2024 JEUNESSE WADAGNI NATIONNALE – Tous droits réservés
            </p>

        </div>
    </footer>

    <!-- SCRIPTS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Hover
        document.querySelectorAll("a, .btn").forEach(el => {
            el.addEventListener("mouseenter", () => el.style.transform = "translateY(-3px)");
            el.addEventListener("mouseleave", () => el.style.transform = "translateY(0)");
        });

        // Animation entrée progressive au scroll
        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting)
                    entry.target.classList.add("scroll-visible");
            });
        }, { threshold: 0.2 });

        document.querySelectorAll(".scroll-anim").forEach(el => observer.observe(el));

        // Effet image
        const img = document.querySelector(".movable");
        document.addEventListener("mousemove", (e) => {
            const x = (window.innerWidth / 2 - e.clientX) / 30;
            const y = (window.innerHeight / 2 - e.clientY) / 30;
            img.style.transform = `translate(${x}px, ${y}px) scale(1.03)`;
        });
        // Developed with ❤️ by R I V O L D O

    </script>

</body>
</html>
