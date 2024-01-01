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
    const NewContenu = prompt("Le contenu actuel est "+ label + " , veuillez saisir le nouveau contenu");
    if (NewContenu == null || NewContenu == "") {
        alert("Vous n'avez rien saisi");
    }else{
        $(this).find('label').text(NewContenu);
        alert("Le nouveau contenu est "+ NewContenu);
    }
});

// lorqu'on clique sur la .listes on récupère le nombre d'option checked et on affiche le nombre sur tous les input en pourcentage dans une alerte
$(document).on('click', '.listes', function () {
    pourcentage();
});

function pourcentage(){
    const nbre = $('.listes input:checked').length;
    const nbreT = $('.listes').length;
    //le pourcentage de la liste cochée sans virgule
    const pourcentage = Math.round((nbre/nbreT)*100);    
    $('span').text(pourcentage);
    $('#modifiable').css('width', Math.round((pourcentage*20)/100)+"%"); 
}

// éxecuter des le début de la page
pourcentage();