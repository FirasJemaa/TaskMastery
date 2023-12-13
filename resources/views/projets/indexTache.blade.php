@php
$statuts = \App\Models\Statut::all()->sortBy("id");
@endphp


<section class="statuts">
    @foreach ($statuts as $statut)
    <div class="statut" id="{{ $statut->id }}" value="{{$statut->designation}}">
        <h3>{{$statut->designation}}</h3>
        @php
        $taches = \App\Models\Tache::all()->where('id_statut', $statut->id)->sortBy("id");
        @endphp
        @foreach ($taches as $tache)
        <div class="taches">
            <h4>{{$tache->designation}}</h4>
            <p>Étiquette : {{$tache->id_etiquette}}</p>
        </div>
        @endforeach
    </div>
    @endforeach
</section>