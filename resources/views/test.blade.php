<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test</title>
</head>
<body>
    @php
    $taches = \App\Models\Tache::all()->sortBy("id");
    @endphp

    @foreach ($taches as $tache)
    <div class="taches">
        <h4>{{$tache->designation}}</h4>
        <!-- <p>Étiquette : {{$tache->id_etiquette}}</p> -->
    </div>
    @endforeach

</body>
</html>