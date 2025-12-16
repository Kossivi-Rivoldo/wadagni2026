<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Détail Article – Romuald WADAGNI</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body { background:#fff; }

        .hero {
            background: linear-gradient(to bottom, rgba(0,62,150,0.7), rgba(0,62,150,0.7));
            height: 300px;
            display:flex;
            align-items:center;
            justify-content:center;
            color:white;
            text-align:center;
        }

        .hero h1 { font-size:2.5rem; }

        /* Images */
        .article-content img {
            width:100%;
            border-radius:12px;
            transition:0.5s;
        }
        .article-content img:hover {
            transform:scale(1.03);
            box-shadow:0 8px 20px rgba(0,0,0,0.25);
        }

        /* Logo Footer */
        .logo-footer {
            width:60px; height:60px;
            border-radius:50%;
            object-fit:cover;
        }

        /* Fade Animation */
        .fade {
            opacity:0;
            transform:translateY(20px);
            transition:0.8s;
        }
        .fade.visible {
            opacity:1;
            transform:translateY(0);
        }
    </style>
</head>

<body>

<!-- TOP BAR -->
<div class="bg-primary text-white text-center fw-bold py-2">
    <marquee>
        <h2>REJOIGNEZ LE MOUVEMENT JEUNESSE WADAGNI NATIONNALE  +229 97 00 00 00</h2>
    </marquee>
</div>

<!-- HEADER -->
<header class="bg-white py-3 shadow-sm">
    <div class="container d-flex align-items-center justify-content-between">

        <div class="d-flex align-items-center">
            <   <img src="image/logo.png" alt="logo
                 style="width:70px; height:70px; border-radius:50%; object-fit:cover;"
                 class="me-2">

            <div class="text-primary fw-bold text-center" style="line-height:0.9;">
                JEUNESSE<br>WADAGNI<br>NATIONNALE
            </div>
        </div>

        <nav class="d-none d-md-flex gap-4">
            <a href="home" class="text-primary fw-semibold text-decoration-none">Accueil</a>
            <a href="programme" class="text-primary fw-semibold text-decoration-none">Programme</a>
            <a href="evenement" class="text-primary fw-semibold text-decoration-none">Evénement</a>
            <a href="actualite" class="text-primary fw-semibold text-decoration-none">Actualité</a>
        </nav>

        <a href="don" class="btn btn-primary px-4">Faire un don</a>
        

    </div>
</header>

<!-- HERO -->
<section class="hero fade">
    <h1>Cérémonie de la Campagne 2026 de Romuald WADAGNI</h1>
</section>

<!-- ARTICLE -->
<section class="py-5 article-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <img src="images/wa8.jpg" class="mb-4 fade">

                <p class="fs-5 fade">
                    Romuald WADAGNI, économiste et homme politique béninois...
                </p>

                <h3 class="text-primary fw-bold mt-5 fade">Parcours et Leadership</h3>
                <p class="fs-5 mt-3 fade">
                    Romuald WADAGNI est connu pour son rôle...
                </p>

                <h3 class="text-primary fw-bold mt-5 fade">Priorités de la campagne</h3>
                <ul class="fs-5 mt-3 fade">
                    <li>Renforcement de l’économie nationale</li>
                    <li>Programmes de formation</li>
                    <li>Justice sociale</li>
                    <li>Transparence</li>
                </ul>

                <h3 class="text-primary fw-bold mt-5 fade">Mobilisation citoyenne</h3>
                <p class="fs-5 mt-3 fade">
                    Le mouvement invite les citoyens à participer...
                </p>

                <div class="bg-primary text-white p-4 rounded-3 mt-5 fade">
                    <h4 class="fw-bold">
                        « Notre objectif est de bâtir un Bénin prospère… »
                    </h4>
                </div>

                <div class="text-center mt-5 fade">
                    <a href="#" class="btn btn-primary btn-lg px-4">Rejoindre la campagne</a>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- FOOTER -->
<footer class="bg-primary text-white py-5">
    <div class="container">

        <div class="row d-flex">

            <div class="col-md-4 mb-4 text-center text-md-start fade">
                <div class="d-flex align-items-center gap-3 justify-content-center justify-content-md-start">
                    <   <img src="image/logo.png" alt="logo" class="logo-footer">
                    <h5 class="fw-bold m-0">
                        JEUNESSE<br>WADAGNI<br>NATIONNALE
                    </h5>
                </div>

                <p class="mt-3">
                    Ensemble, construisons un Bénin fort et prospère.
                </p>
            </div>

            <div class="col-md-4 mb-4 fade">
                <h5 class="fw-bold">Liens Rapides</h5>
                <ul class="list-unstyled mt-3">
                    <li><a class="text-white text-decoration-none" href="#">Accueil</a></li>
                    <li><a class="text-white text-decoration-none" href="#">Programme</a></li>
                    <li><a class="text-white text-decoration-none" href="#">Evénements</a></li>
                    <li><a class="text-white text-decoration-none" href="#">Actualités</a></li>
                </ul>
            </div>

            <div class="col-md-4 fade">
                <h5 class="fw-bold">Contacts</h5>
                <p class="mt-3">+229 97 00 00 00</p>
                <p>Lun - Sam: 8h - 18h</p>
                <a class="text-white text-decoration-none" href="#">Mentions Légales</a><br>
                <a class="text-white text-decoration-none" href="#">Politique de confidentialité</a>
            </div>

        </div>
        <!-- Developed with ❤️ by R I V O L D O -->


        <hr class="border-light mt-4 fade">
        <p class="text-center mt-3 fade">© 2024 JEUNESSE WADAGNI NATIONNALE – Tous droits réservés</p>

    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- ANIMATIONS -->
<script>
/* Fade animation on scroll */
const fades = document.querySelectorAll('.fade');
function showOnScroll() {
    fades.forEach(el => {
        const rect = el.getBoundingClientRect();
        if (rect.top < window.innerHeight - 80) {
            el.classList.add('visible');
        }
    });
}
window.addEventListener('scroll', showOnScroll);
window.addEventListener('load', showOnScroll);

/* Hover animation on links */
document.querySelectorAll("a").forEach(a => {
    a.style.transition="0.3s";
    a.onmouseenter = () => a.style.opacity="0.7";
    a.onmouseleave = () => a.style.opacity="1";
});

// Developed with ❤️ by R I V O L D O

</script>

</body>
</html>
