@php
$statuts = \App\Models\Statut::all()->sortBy("id");
@endphp


<section class="statuts">
    <div>
        <h2>Liste taches</h2>
        <a id="creerTache" onclick="">
            <i class="fa-solid fa-circle-plus"></i>
        </a>
    </div>
    @foreach ($statuts as $statut)
    <div class="statut" name="{{ $statut->id }}" value="{{$statut->designation}}">
        <h3>{{$statut->designation}}</h3>
    </div>
    @endforeach
</section>