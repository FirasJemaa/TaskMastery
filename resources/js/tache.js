$(document).ready(function () {
    // Désactiver la sélection multiple en maintenant la touche Ctrl
    $('#options').on('mousedown', 'option', function (e) {
        e.preventDefault();
        $(this).prop('selected', !$(this).prop('selected'));
        return false;
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
        $('#modifiable').css('width', Math.round((pourcentage * 20) / 100) + "%");
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
$(document).on('click', '.AjoutCheckList', function () {
    const contenu = prompt("Veuillez saisir le contenu de la liste");
    if (contenu == null || contenu == "") {
        alert("Vous n'avez rien saisi");
    } else {
        // on ajoute ca dans la balise ul avec la class checkList
        $('.checklist').append('<li class="listes"><input type="checkbox" name="new" id="0"><label for="check">' + contenu + '</label></li>');
    }
});

// éxecuter des le début de la page
pourcentage();

