@php
$statuts = \App\Models\Statut::all()->sortBy("id");
@endphp


<div id="titreTache">
    <h2>Liste taches</h2>
    <a id="creerTache" href=""> 
        <!--  route('tache')  -->
        <i class="fa-solid fa-circle-plus"></i>
    </a>
</div>
<section class="statuts">
    @foreach ($statuts as $statut)
    <div class="statut" name="{{ $statut->id }}" value="{{$statut->designation}}">
        <h3>{{$statut->titre}}</h3>
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