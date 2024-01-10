@php
$statuts = \App\Models\Statut::all()->sortBy("id");
@endphp


<div id="titreTache">
    <h2>Liste taches</h2>
    <a title="Ajouter une tâche au projet actif" id="creerTache" href="{{ route('newTache', [0]) }}"> 
        <i class="fa-solid fa-circle-plus"></i>
    </a>
</div>
<section class="statuts">
    @foreach ($statuts as $statut)
    <div class="statut" name="{{ $statut->id }}" value="{{$statut->designation}}">
        <h3>{{$statut->designation}}</h3>
        <div class="list">
            
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