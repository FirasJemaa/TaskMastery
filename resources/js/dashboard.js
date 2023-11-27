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
elementsLi.forEach(function(li) {
    li.addEventListener('click', function() {
        // Récupérer l'ID de l'élément cliqué
        var idClique = this.id;
        console.log("L'élément cliqué a l'ID : " + idClique);
    });
});