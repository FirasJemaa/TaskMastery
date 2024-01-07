<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/accueil.css', 'resources/js/app.js'])
    <title>Task Mastery</title>
    <link rel="icon" href="{{ asset('image/logo_onglet.png') }}" type="image/x-icon">
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
        <a class="Btn" href="{{ route('login') }}">Commencer 🚀</a>
    </header>

    <section id="presentation-container" class="container-fluid column">
        <div class="Explication">
            <div class="row">
                <h2 id="text1" class="soulignage">Le projet consiste à ?</h2>
                <h2 id="text2" class="soulignage">Correspond a qui ?</h2>
            </div>
            <p id="para">Le projet consiste en un gestionnaire de tâches convivial qui permet aux utilisateurs de créer, suivre et gérer des tâches individuellement ou en équipe. Cette solution simplifie la planification du travail quotidien et améliore la productivité.</p>
        </div>
        <div id="fonctionnement" class="container row">
            <div class="column">
                <div class="box play">
                    <p>Créer un projet, et insérer différente tâches</p>
                </div>
                <div class="box">
                    <p>Ajouter quelqu'un au projet</p>
                </div>
                <div class="box">
                    <p>Modifier et communiqué avec vos amis</p>
                </div>
            </div>

            <img src="{{ asset('image/macbook.png') }}" alt="EcranPortable">

        </div>
    </section>
    <main id="avantage" class="container column">
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
    </main>
    <footer class="clearfix">
        <p>© 2024 <a href="https://www.linkedin.com/in/firas-jemaa-963336151/">Firase JEMAA</a>. Tous droits réservés. Tous droits réservés sur le contenu de ce site Web.</p>
    </footer>

    <script src="{{ asset('js/accueil.js') }}"></script>
</body>

</html>