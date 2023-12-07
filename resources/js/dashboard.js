/********************************PROJET********************************/
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});

window.showProjet = function (projetId) {
    //e.preventDefault();
    let projetData;
    $.ajax({
        type: 'GET',
        url: "/showProjet/" + projetId,
        async: false,
        data: { projetId: projetId },
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            projetData = (data);
        },
        error: function (data) {
            projetData = (null);
        }
    });
    return projetData;
}

window.modifierProjet = function (id) {
    $('#projetModal').modal('show');
    $('.modal-title').html('Modifier un projet');
    $('.modal-title').attr('name', id);
}

$(document).on('click', '.update-projet', function (e) {
    e.preventDefault;
    const Projet = showProjet(this.name);
    console.log(Projet);
    modifierProjet(Projet.id);

    $("#designation").val(Projet.designation);
    $("#description").val(Projet.description);
});

////////////////////////////////////////////SUPPRIMER
$(document).on('click', '.delete-projet', function (e) {
    e.preventDefault();
    const projetId = this.name; // obtenir l'ID du projet à supprimer
    console.log(projetId);
    $.ajax({
        type: 'POST',
        url: "/deleteProjet/" + projetId,
        data: { projetId: projetId },
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            console.log(data);
            $('#' + projetId).remove();
        },
        error: function (data) {
            console.log(data);
        }
    });
});

/////////////////////////////////////////AJOUTER 
window.ajouterProjet = function () {
    $('#projetModal').modal('show');
    $('.modal-title').html('Ajouter un projet');
}

jQuery('#projetForm').submit(function (e) {
    e.preventDefault();
    const formData = new FormData(this);

    const Titre = $('.modal-title').html;
    if (Titre == "Ajouter un projet") {
        jQuery.ajax({
            type: 'POST',
            url: "/storeProjet",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
                // Mettre à jour la liste des projets dans l'interface utilisateur
                $('#listeProjets').append('<li class="projet" id="' + data.id + '">' + data.designation + '<div><a class="update-projet" name="{{ $projet->id }}"><i class="fa-solid fa-pen"></i></a><a class="delete-projet" name=' + data.id + '> <i class="fa-solid fa-trash"></i></a></div></li>');

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
    } else {
        const projetId = $('.modal-title').attr('name');;
        jQuery.ajax({
            type: 'PUT',
            url: "/updateProjet/" + projetId,
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
                // Mettre à jour la liste des projets dans l'interface utilisateur
                const projetElement = $('#listeProjets').find('#' + data.id);

                if (projetElement.length > 0) {
                    // Si l'élément avec l'ID existe, mettez à jour son contenu
                    projetElement.html(
                        data.designation +
                        '<div><a class="update-projet" name="' + data.id + '"><i class="fa-solid fa-pen"></i></a>' +
                        '<a class="delete-projet" name="' + data.id + '"> <i class="fa-solid fa-trash"></i></a></div>'
                    );
                }

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
    }


})

