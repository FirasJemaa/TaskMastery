<x-app-layout>
    <h1>Tableau de bord</h1>
</x-app-layout>
<div class="panel">
    <aside>
        @include('projets.index')
    </aside>
    <section>blabla</section>
</div>


    <!-- Modal -->
    <div class="modal fade" id="employeModal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title">Ajouter un employé</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                </div>
                <div class="modal-body">
                    <form action="javascript:void(0)" id="employeForm" name="employeForm" class="form-horizontal" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label for="nom" class="col-sm-2 control-label">Nom</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="nom" name="nom" placeholder="Entrer le nom" value="" maxlength="50" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-12">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Entrer l'email" value="" maxlength="50" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="adresse" class="col-sm-2 control-label">Adresse</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="adresse" name="adresse" placeholder="Entrer l'adresse" value="" maxlength="50" required="">
                            </div>
                        </div>
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary" id="btn-save" value="create">Enregistrer
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin Modal -->