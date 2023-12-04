/********************************PROJET********************************/
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});

window.ajouterProjet = function () {
    $('#projetModal').modal('show');
}

/*window.supprimerProjet = function (projetId) {
    e.preventDefault();
    //const formData = new FormData(this);
    if (confirm("Êtes-vous sûr de vouloir supprimer ce projet ?")) {
        jQuery.ajax({
            type: 'DELETE',
            url: '/projets/{' + projetId + '}',
            success: function (data) {
                // Mettre à jour l'interface utilisateur ou effectuer d'autres actions nécessaires
                console.log("Projet supprimé avec succès");
            },
            error: function (data) {
                console.log(data);
            }
        });
    }
}*/

$(document).on('click', '.delete-projet', function (e) {
    e.preventDefault();
    const projetId = this.name; // obtenir l'ID du projet à supprimer
    console.log(projetId);
    $.ajax({
        type: 'DELETE',
        url: "/deleteProjet/"+projetId,
        success: function (data) {
            console.log("suppression OK !")
            //$('#listeProjets').remove('<li class="projet" id="' + data.id + '">' + data.designation + '</li>');
        },
        error: function (data) {
            console.log(data);
        }
    });
});

jQuery('#projetForm').submit(function (e) {
    e.preventDefault();
    const formData = new FormData(this);
    jQuery.ajax({
        type: 'POST',
        url: "/storeProjet",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: (data) => {
            // Mettre à jour la liste des projets dans l'interface utilisateur
            $('#listeProjets').append('<li class="projet" id="' + data.id + '">' + data.designation + '</li>');

            // Réinitialiser le formulaire et fermer la fenêtre modale
            $('#projetForm')[0].reset();
            $('#projetModal').modal('hide');

            $('#projetForm')[0].reset();
            $('#projetModal').modal('hide');
            $('#btn-save').html('Enregistrer');
            $('#btn-save').attr("disabled", false);
        },
        error: function (data) {
            console.log(data);
        }
    });
})

//récupérer l'id du projet
let elementsLi = document.querySelectorAll('li');

// Ajouter un gestionnaire d'événements à chaque élément li
elementsLi.forEach(function (li) {
    li.addEventListener('click', function () {
        // Récupérer l'ID de l'élément cliqué
        //supprimerProjet(this.id);
    });
});
