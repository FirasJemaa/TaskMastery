<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link href="{{ asset('css/accueil.css') }}" rel="stylesheet">-->
    @vite(['resources/css/accueil.css', 'resources/js/app.js'])
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
                    <a class="soulignage" href="#presentation-container" aria-current="page">Présentation</a>
                    <a class="soulignage" href="#presentation-container">Fonctionnement</a>
                    <!--<a class="soulignage" href="#presentation-container">Objectif</a>-->
                    <a class="soulignage" href="#avantage">Avantage</a>
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
        <a id="Btn-begin" href="{{ route('login') }}">Commencer 🚀</a>
    </header>

    <section id="presentation-container" class="container-fluid column">
        <div class=""><!--penser a mettre une class-->
            <div class="row">
                <h2 id="text1" class="soulignage">Le projet consiste à ?</h2>
                <h2 id="text2" class="soulignage">Correspond a qui ?</h2>
            </div>
            <p id="para1">Le projet consiste en un gestionnaire de tâches convivial qui permet aux utilisateurs de créer, suivre et gérer des tâches individuellement ou en équipe. Cette solution simplifie la planification du travail quotidien et améliore la productivité.</p>
            <p id="para2">Les professionnels, les étudiants, les équipes de travail, et toute personne cherchant à mieux organiser ses tâches.</p>
        </div>
        <div id="fonctionnement" class="container row">
            <div class="column">
                <div class="box play">
                    <p>Create a project, and insert different tasks for your project.</p>
                </div>
                <div class="box">
                    <p>Add someone in the project for work with you</p>
                </div>
                <div class="box">
                    <p>Edit and share with your friends</p>
                </div>
            </div>

            <img src="{{ asset('image/macbook.png') }}" alt="EcranPortable">

        </div>
    </section>
    <section id="avantage" class="container column">
        <div class="row">
            <p>Travailler en <strong>équipe !</strong><br>Cela vous permettre de partager les tâches</p>
            <img src="{{ asset('image/avantage1.svg') }}" alt="équipe">
        </div>
        <div class="row">
            <img src="{{ asset('image/avantage2.svg') }}" alt="communication">
            <p>Pouvoir <strong>communiquer !</strong><br>Ca vous donnera la possibilité de vous coordonnés</p>
        </div>
        <div class="row">
            <p><strong>Réussir ensemble !</strong><br>Franchissez tous les étapes en équipe</p>
            <img src="{{ asset('image/avantage3.svg') }}" alt="ensemble">
        </div>
    </section>

    <script src="{{ asset('js/accueil.js') }}"></script>
</body>

</html>