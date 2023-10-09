<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/identification.css', 'resources/js/app.js'])
    <title>Identification</title>
</head>

<body>
    <div class="column">
        <img src="{{ asset('image/logo.png') }}" alt="logo">
        <div id="container" class="column">
            <h1>Connexion</h1>
            <form method="POST">
                <div class="column">
                    <input type="mail" placeholder="Mail" required>
                    <input type="password" placeholder="Mot de passe" required>
                    <input type="submit">
                </div>
            </form>
        </div>
    </div>
</body>

</html>