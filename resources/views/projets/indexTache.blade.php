@php
$statuts = \App\Models\Statut::all()->sortBy("id");
@endphp


@foreach ($statuts as $statut)
<div class="statut" id="{{ $statut->id }}" value="{{$statut->designation}}">
    <h3>{{$statut->designation}}</h3>
</div>
@endforeach