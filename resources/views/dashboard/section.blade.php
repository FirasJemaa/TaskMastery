@php
$statuts = \App\Models\Statut::all()->sortBy("id");
@endphp

<!-- Désignation et description du projet -->

<div id="titreTache">
    <h2>Liste taches</h2>
</div>
<a title="Ajouter une tâche au projet actif" href="{{ route('newTache', [0]) }}">
    <i class="fa-solid fa-circle-plus"></i>
</a>
<section class="statuts">
    @foreach ($statuts as $statut)
    <div class="statut" name="{{ $statut->id }}" value="{{$statut->designation}}">
        <h3>{{$statut->designation}}</h3>
        <div class="list">
            @foreach ($taches as $item)
            @if ($item->id_statut == $statut->id)
                <div class="taches" draggable="true">
                    <div>
                        <h4>{{ $item->titre }}</h4>
                        <input class="check" type="checkbox"  name="{{ $item->id }}">
                    </div>
                    <p><span>Étiquette :</span> {{ $item->D_Etiquette }}</p>
                    <a title="consulter la tâche" href="{{ route('showTache', [$item->id]) }}">consulter</a>
                </div>
            @endif
            @endforeach
        </div>

    </div>
    @endforeach
</section>
<div id="BtnPuce">
    <fieldset>
        <input class="radio" type="radio" name="ChoixStatut" value="1">
        <input class="radio" type="radio" name="ChoixStatut" value="2">
        <input class="radio" type="radio" name="ChoixStatut" value="3">
        <fieldset>
</div>