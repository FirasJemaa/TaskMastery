<x-app-layout>
    <h1>Tableau de bord</h1>
</x-app-layout>
<div class="panel">
    <aside>
        @include('dashboard.aside')
    </aside>
    <section>
        @include('dashboard.section')
    </section>
</div>

<!-- Modal -->
<div class="modal fade" id="projetModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0)" id="projetForm" name="projetForm" class="form-horizontal" method="POST" enctype="multipart/form-data">
                    <input class="Id-Projet" type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="designation" class="col-sm-2 control-label">Designation</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="designation" name="designation" placeholder="Entrer la designation" value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="description" name="description" placeholder="Entrer la description" value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="col-sm-offset-2 col-sm-10 mt-3">
                        <button type="submit" class="btn btn-warning" id="btn-save" value="create">Enregistrer
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Fin Modal -->

<!-- Modal Suppression du projet -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-titles fs-5" id="exampleModalLabel">Suppression d'un projet</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Êtes-vous sûr de vouloir supprimer ce projet ? Toutes les tâches associées seront supprimées.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non</button>
        <button id="btn-delete" type="button" class="btn btn-warning">Oui</button>
      </div>
    </div>
  </div>
</div>