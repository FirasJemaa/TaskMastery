// Projet
window.showProjet = function (projetId) {
    //e.preventDefault();
    let projetData;
    $.ajax({
        type: 'GET',
        url: "/showProjet/" + projetId,
        async: false,
        //data: { projetId: projetId },
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            projetData = (data);
        },
        error: function (data) {
            if (data.status == 403) window.location.href = "/403";
            alert(data.responseJSON.message);
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
    modifierProjet(Projet.id);

    $("#designation").val(Projet.designation);
    $("#description").val(Projet.description);
});

////////////////////////////////////////////SUPPRIMER
$(document).on('click', '.delete-projet', function (e) {
    e.preventDefault();
    //ouvrir la fenetre modal
    $('#deleteModal').modal('show');
    //mettre l'id du projet dans le bouton supprimer
    $('#btn-delete').val(this.name);
});
//supprimer le projet seulement si l'utilisateur clique sur le bouton supprimer
$('#btn-delete').click(function (e) {
    e.preventDefault();
    const projetId = $('#btn-delete').val();
    $.ajax({
        type: 'POST',
        url: "/deleteProjet/" + projetId,
        data: { projetId: projetId },
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            $('#' + projetId).remove();
        },
        error: function (data) {
            alert(data.responseJSON.message);
            //rediriger vers la page d'erreur
            if (data.status == 403) window.location.href = "/403";
            alert(data.responseJSON.message);
        }
    });
    //éxecuter le traitement apres une seconde
    setTimeout(function () {
        //vérifier si y a au moins un projet qui possède la classe actif sinon on passe id creerTache passe a hidden
        const projetActif = document.getElementsByClassName("active");
        if (projetActif.length == 0) {
            $('#creerTache').css('visibility', 'hidden');
        }
    }, 500);

    //passer le modal a hidden
    $('#deleteModal').modal('hide');
});

/////////////////////////////////////////AJOUTER 
window.ajouterProjet = function () {
    $('#projetModal').modal('show');
    $('.modal-title').html('Ajouter un projet');
    $("#designation").val("");
    $("#description").val("");
}

jQuery('#projetForm').submit(function (e) {
    e.preventDefault();
    const Titre = $('.modal-title').text();

    if (Titre == "Modifier un projet") {
        const projetId = $('.modal-title').attr('name');
        $('.Id-Projet').attr('value', projetId);
    } else {
        $('.Id-Projet').attr('value', '');
    }

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
            if (Titre == "Ajouter un projet") {
                $('#listeProjets').append(
                    '<li id="' + data.id + '">' + data.designation +
                    '<div>\
                        <a class="update-projet" name="' + data.id + '"><i class="fa-solid fa-pen"></i></a>\
                        <a class="delete-projet" name="' + data.id + '"><i class="fa-solid fa-trash"></i></a>\
                    </div></li>'
                );
                //on execute un clique sur le projet créé
                $('#' + data.id).click();
            } else {
                const projetElement = $('div').find('#' + data.id);
                projetElement.html(
                    data.designation +
                    '<div>\
                        <a class="update-projet" name="' + data.id + '"><i class="fa-solid fa-pen"></i></a>\
                        <a class="delete-projet" name="' + data.id + '"><i class="fa-solid fa-trash"></i></a>\
                    </div>'
                );
                //$('#' + data.id).click();
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
            console.log(data.responseJSON.message);
            if (data.status == 403) window.location.href = "/403";
        }
    });
})
