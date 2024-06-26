<x-app-layout>
        <h1>Tâche</h1>
 </x-app-layout>
<body>    
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
                    <label for="date_creation">Date de début et de fin : </label>
                    <input type="date" name="date_creation" id="date_creation" value="{{$tache->date_creation}}">
                    <input type="date" name="date_cloture" id="date_cloture" value="{{$tache->date_cloture}}">
                    <!-- un champ de saisie d'une couleur -->
                    <div id="choixCouleur">
                        <label for="couleur">Couleur de répère : </label>
                        <input type="color" name="couleur" id="couleur" value="{{sprintf('#%s', str_pad(dechex($couleur->code_couleur), 6, '0', STR_PAD_LEFT))}}">
                    </div>
                    <!-- une liste déroulante etiquette et statut -->
                    <label for="etiquette">Étiquette : </label>
                    <select id="etiquette" name="etiquette">
                        @foreach($etiquettes as $etiquette)
                        <option value="{{$etiquette->id}}" @if($etiquette->id == $tache->id_etiquette) selected @endif>{{$etiquette->designation}}</option>
                        @endforeach
                    </select>
                    <label for="statut">Statut : </label>
                    <select id="statut" name="statut">
                        @foreach($statuts as $statut)
                        <option value="{{$statut->id}}" @if($statut->id == $tache->id_statut) selected @endif>{{$statut->designation}}</option>
                        @endforeach
                    </select>
                    <label for="dependances">Sélectionnez vos dépendances :</label>
                    <select id="dependances" name="dependances[]" multiple="multiple">
                        @foreach($taches as $tacheDependance)
                        <option value="{{ $tacheDependance->id }}" @if(in_array($tacheDependance->id, $selectedDependances)) selected @endif>
                            {{ $tacheDependance->titre }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="three item">
                    <div id="PourcentageCheckList">
                        <h4>Checklist : <span>50</span>%</h4>
                        <div id="pourcent">
                            <!-- ligne -->
                            <hr>
                            <hr id="modifiable">
                        </div>
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
                    <!-- un bouton pour valider -->
                    <button name="btn" type="submit" value="enregistrer">Sauvegarder</button>
                    @if($bProprietaire)
                    <!-- un bouton pour supprimer -->
                    <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Supprimer</button>
                    @endif
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

            </div>
            <!-- un champ ou on écrit le message -->
            <div>
                <input type="text" name="message" id="message" placeholder="Écrire...">
                <a id="envoyerMsg"><i class="fa-solid fa-paper-plane"></i></a>
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
    <!-- importer le script js via npm et blade -->
    <script src="{{ asset('js/tache.js') }}"></script>
</body>

</html>