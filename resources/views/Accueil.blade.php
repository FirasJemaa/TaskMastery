<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link href="{{ asset('css/accueil.css') }}" rel="stylesheet">-->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Task Mastery</title>
</head>

<body>
    <header>
        <nav>
            <a href="#" class="nav-icon " aria-label="homepage" aria-current="page">
                <img src="{{ asset('image/logo.png') }}" alt="logo">
            </a>

            <div class="main-navlinks">
                <button type="button" class="hamburger" aria-label="Toggle Navigation" aria-expanded="false">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <div class="navlinks-container">
                    <a class="soulignage" href="#" aria-current="page">Présentation</a>
                    <a class="soulignage" href="#">Fonctionnement</a>
                    <a class="soulignage" href="#">Objectif</a>
                    <a class="soulignage" href="#">Avantage</a>
                </div>
            </div>
        </nav>
        <div class="container" id="presentation-header">
            <div id="presentation">
                <h1>Bienvenue !😉</h1>
                <p>Tu veux gérer ton projet avec les meilleurs outils et travailler dans les meilleurs conditions ?</p>
            </div>
            <img id="SVG" src="image/presentation.svg" alt="Presentation">
        </div>
        <a id="Btn-begin" href="#">Commencer 🚀</a>
    </header>

    <section id="presentation-container" class="container-fluid">
        <div class="row">
            <h2 id="text1" class="soulignage">Le projet consiste à ?</h2>
            <h2 id="text2" class="soulignage">Correspond a qui ?</h2>
        </div>
        <p id="para1">Le projet consiste en un gestionnaire de tâches convivial qui permet aux utilisateurs de créer, suivre et gérer des tâches individuellement ou en équipe. Cette solution simplifie la planification du travail quotidien et améliore la productivité.</p>
        <p id="para2">Les professionnels, les étudiants, les équipes de travail, et toute personne cherchant à mieux organiser ses tâches.</p>

    </section>
    <script src="{{ asset('js/accueil.js') }}"></script>
</body>

</html>