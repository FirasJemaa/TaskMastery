///////////////////////////////////////////////////////////////////////Partie Tâche////////////////////////////////////////////////////////////////////////////////////////
$(document).ready(function () {
    // Désactiver la sélection multiple en maintenant la touche Ctrl
    $('#dependances').on('mousedown', 'option', function (e) {
        e.preventDefault();
        $(this).prop('selected', !$(this).prop('selected'));
        return false;
    });

    $('#date_cloture').on('input', function() {
        const dateCreation = new Date($('#date_creation').val());
        const dateCloture = new Date($(this).val());

        if (dateCloture < dateCreation) {
            alert("La date de clôture ne peut pas être antérieure à la date de début.");
            $(this).val($('#date_creation').val());
        }
    });
});

// lorqu'on double clique sur la .listes on récupère le la balise label a l'interieur et on l'affiche dans une alerte
$(document).on('dblclick', '.listes', function () {
    var label = $(this).find('label').text();
    const NewContenu = prompt("Le contenu actuel est " + label + " , veuillez saisir le nouveau contenu");
    if (NewContenu == null || NewContenu == "") {
        alert("Vous n'avez rien saisi");
    } else {
        $(this).find('label').text(NewContenu);
        $(this).find('input[type="hidden"]').val(NewContenu);
        alert("Le nouveau contenu est " + NewContenu);
    }
});

// lorqu'on clique sur la .listes on récupère le nombre d'option checked et on affiche le nombre sur tous les input en pourcentage dans une alerte
$(document).on('click', '.listes', function () {
    pourcentage();
});

function pourcentage() {
    const nbre = $('.listes input:checked').length;
    const nbreT = $('.listes').length;
    //le pourcentage de la liste cochée sans virgule
    if (nbre == 0) {
        $('span').text(0);
        $('#modifiable').css('width', 0);
    } else {
        const pourcentage = Math.round((nbre / nbreT) * 100);
        $('span').text(pourcentage);
        $('#modifiable').css('width', Math.round((pourcentage * 200) / 100) + "px");
    }
}

// une fonction qui récupère le code couleur en décimal et qui le renvoie à un input de type couleur
function couleur() {
    const couleur = $('#couleur').val();
    //convertir le format en hexadécimal
    let couleurHex = couleur.toString(16);
    while (couleurHex.length < 6) {
        couleurHex = "0" + couleurHex;
    }
    console.log(couleurHex);
    $('#couleur').val(couleurHex);
}

//lorsqu'on clique sur la class AjoutCheckList on ajoute une liste
$('.AjoutCheckList').on('click', function () {
    console.log("ok");
    const contenu = prompt("Veuillez saisir le contenu de la liste");
    if (contenu == null || contenu == "") {
        alert("Vous n'avez rien saisi");
    } else {
        const uniqueId = Date.now();
        $('.checklist').append('<li class="listes">\
            <input type="checkbox" name="checkboxes[]" value="' + uniqueId + '" id="' + uniqueId + '" >\
            <label for="' + uniqueId + '" name="labels[]" value="' + uniqueId + '">' + contenu + '</label>\
            <input type="hidden" name="labels[' + uniqueId + ']" value="' + contenu + '">\
        </li>');
        pourcentage();
    }
});

// éxecuter des le début de la page
pourcentage();

///////////////////////////////////////////////////////////////////////Partie Contact////////////////////////////////////////////////////////////////////////////////////////
// lorqu'on clique sur le bouton ayant l'ID AjoutPrn
$('#AjoutPrn').on('click', function (e) {
    e.preventDefault();
    const inputValue = $('#inputValue').val();
    const id = $('#contact > button').attr('id');
    console.log(inputValue, id);
    //faire une méthode ajax post vers la route /attribuer/{ID} avec le paramètre ID de la tâche et le pseudo du participant
    $.ajax({
        url: '/ajouterContact',
        type: 'POST',
        data: {
            pseudo: inputValue,
            id_tache: id
        },
        success: function (data) {
            // Ajouter le pseudo dans la liste des participants
            alert(data.message);
        },
        error: function (data) {
            // Afficher un message d'erreur
            alert(data.message);
        }
    });
});

$('#message').keypress(function(e) {
    if (e.which === 13) { // 13 correspond à la touche Entrée
        // Exécutez le traitement du bouton
        $('#envoyerMsg').click();
    }
});

//lorsqu'on clique sur l'id envoyerMsg on récupère le contenu du message et on l'envoie à la route /envoyerMsg
$('#envoyerMsg').on('click', function (e) {
    e.preventDefault();
    const id = $('#contact > button').attr('id');
    const msg = $('#message').val();
    console.log(id, msg);
    $.ajax({
        url: '/ajouterMessage',
        type: 'POST',
        data: {
            id_tache: id,
            contenu: msg
        },
        success: function (data) {
            // Afficher un message de succès
            console.log(data.message);
            //ajouter le message dans la conversation :
            //ajouter dans la balise message une div avec la class messages et le contenu du message
            $('.message').append('<div class="messages hote">\
                <p>' + msg + '</p>\
                <h5>Moi</h5>\
                </div>');
        },
        error: function (data) {
            // Afficher un message d'erreur
            console.log(data.message);
        }
    });

    //vider le contenu du message
    $('#message').val('');
});

//raffraichir la conversation tous les 5 secondes
setInterval(function () {
    const id = $('#contact > button').attr('id');
    $.ajax({
        url: '/refreshConversation',
        type: 'GET',
        data: {
            id_tache: id
        },
        success: function (data) {
            $('.message').html('');
            const conversation = data.conversation;
            const pseudoActuel = data.utilisateurCourant;
            for (let key in conversation) {
                //verifier si l'utilisateurCourant = pseudo                
                if (pseudoActuel == conversation[key].pseudo) {
                    $('.message').append('<div class="messages hote">\
                    <p>' + conversation[key].contenu + '</p>\
                    <h5>Moi</h5>\
                    </div>');
                } else {
                    $('.message').append('<div class="messages participant">\
                    <p>' + conversation[key].contenu + '</p>\
                    <h5>' + conversation[key].pseudo + '</h5>\
                    </div>');
                }
            };
        },
        error: function (data) {
            // Afficher un message d'erreur
            console.log(data.message);
        }
    });
}, 1000);

setInterval(function () {
    var MsgConteneur = $('.message');
    var containerHeight = MsgConteneur.height();
    var contentHeight = MsgConteneur[0].scrollHeight;
    MsgConteneur.scrollTop(contentHeight - containerHeight);
},5000);