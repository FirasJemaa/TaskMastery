<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="{{ asset('image/logo_onglet.png') }}" type="image/x-icon">
    <title>Tâche</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    @vite(['resources/css/tache.css', 'resources/js/tache.js'])
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>

<body>
    <x-app-layout>
        <h1>Tâche</h1>
    </x-app-layout>
    <main id="tache">
        <section>
            <form action="{{ route('tache.store', $tache->id) }}" method="post" class="wrapper">
                @csrf
                <div class="one item">
                    <input type="text" name="titre" id="titre" placeholder="Titre" value="{{$tache->titre}}">
                    <textarea name="designation" id="designation" cols="30" rows="10" placeholder="Designation">{{$tache->designation}}</textarea>
                </div>
                <!-- balise date de création et date de cloture -->
                <div class="two item">
                    <input type="date" name="date_creation" id="date_creation" value="{{$tache->date_creation}}">
                    <input type="date" name="date_cloture" id="date_cloture" value="{{$tache->date_cloture}}">
                    <!-- un champ de saisie d'une couleur -->
                    <div id="choixCouleur">
                        <label for="couleur">Couleur de répère : </label>
                        <input type="color" name="couleur" id="couleur" value="{{sprintf('#%s', str_pad(dechex($couleur->code_couleur), 6, '0', STR_PAD_LEFT))}}">
                    </div>
                    <!-- une liste déroulante etiquette et statut -->
                    <select id="etiquette" name="etiquette">
                        @foreach($etiquettes as $etiquette)
                        <option value="{{$etiquette->id}}" @if($etiquette->id == $tache->id_etiquette) selected @endif>{{$etiquette->designation}}</option>
                        @endforeach
                    </select>
                    <select id="statut" name="statut">
                        @foreach($statuts as $statut)
                        <option value="{{$statut->id}}" @if($statut->id == $tache->id_statut) selected @endif>{{$statut->designation}}</option>
                        @endforeach
                    </select>
                    <label for="dependances">Sélectionnez vos dépendances :</label>
                    <select id="dependances" name="dependances[]" multiple="multiple">
                        @foreach($taches as $tacheDependance)
                        @if($tacheDependance->id_tache_1 != $tacheDependance->id)
                        <option value="{{ $tacheDependance->id }}" @if(in_array($tacheDependance->id, $selectedDependances)) selected @endif>
                            {{ $tacheDependance->titre }}
                        </option>
                        @endif
                        @endforeach
                    </select>
                </div>

                <div class="three item">
                    <h4>Checklist : <span>50</span>%</h4>
                    <div id="pourcent">
                        <!-- ligne -->
                        <hr>
                        <hr id="modifiable">
                    </div>
                    <div class="scrollable-list">
                        <ul class="checklist" id="checklist-container">
                            <!-- Les cases à cocher existantes générées côté serveur -->
                            @foreach($checklists as $checklist)
                            <li class="listes">
                                <input type="checkbox" name="checkboxes[]" value="{{ $checklist->id }}" id="{{ $checklist->id }}" @if($checklist->checked) checked @endif >
                                <label for="{{ $checklist->id }}" name="labels[]" value="{{ $checklist->id }}">
                                    {{ $checklist->designation }}
                                </label>
                                <input type="hidden" name="labels[{{ $checklist->id }}]" value="{{ $checklist->designation }}">
                            </li>
                            @endforeach
                        </ul>
                        <i class="fa-solid fa-circle-plus AjoutCheckList"></i>
                    </div>
                </div>
                <div class="four item">
                    <!-- un bouton pour supprimer -->
                    <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Supprimer</button>
                    <!-- un bouton pour valider -->
                    <button name="btn" type="submit" value="enregistrer">Sauvegarder</button>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Supprimer</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Êtes vous sûr de vouloir supprimer cette tâche ?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>
        <aside id="contact">
            <button data-bs-toggle="modal" data-bs-target="#ajoutParticipant" id="{{$tache->id}}">
                Ajouter une personne <i class="fa-solid fa-user-plus"></i>
            </button>
            <!-- bloc div ou on aura le chat avec les messages envoyer et recu qui s'affiche -->
            <div class="message">
                <div class="messages participant">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, nostrum, esse laborum molestiae ullam deserunt voluptatibus sint exercitationem praesentium quis molestias eum sed tenetur quasi ratione sapiente error natus laudantium?</p>
                    <h5>Invitez</h5>
                </div>
                <div class="messages hote">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, nostrum, esse laborum molestiae ullam deserunt voluptatibus</p>
                    <h5>Moi</h5>
                </div>
            </div>
            <!-- un champ ou on écrit le message -->
            <div>
                <input type="text" name="message" id="message" placeholder="Écrire...">
                <a href=""><i class="fa-solid fa-paper-plane"></i></a>
            </div>
        </aside>

        <!-- Modal -->
        <div class="modal fade" id="ajoutParticipant" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ajouter un participant</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Champ de saisie (input) -->
                        <input type="text" class="form-control" id="inputValue" placeholder="Saisissez son pseudo...">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        <button type="button" class="btn btn-warning" data-bs-dismiss="modal" id="AjoutPrn">Ajouter</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>