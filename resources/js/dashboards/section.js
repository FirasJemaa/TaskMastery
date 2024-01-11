// tache 
////////////////////////////////////AFFICHAGE DE LA TACHE EN FONCTION DU PROJET
// boucle foreach avec un écoute d'événement sur le click de la balise li
$(document).on('click', '#listeProjets li', function (e) {
    e.preventDefault();
    const projetId = this.id; 
    //supprimer tous les class active
    $('#listeProjets li').removeClass('active');

    //vider la balise section avec la classe statuts
    $('.taches').remove();

    //ajouter la class active sur la balise li cliquée
    $(this).addClass('active');

    //mettre #creerTache en visible
    $('#creerTache').css('visibility', 'visible');

    //ajax method GET pour obtenir les taches du projet ayant l'id projetId
    getAjax(projetId);

    // Modifie l'attribut href avec la nouvelle valeur
    $('#creerTache').attr('href', function(index, oldHref) {
        return oldHref.replace(/\/\d+$/, '/' + projetId);
    });
});

// Changer le statut sur le checkbox
$(document).ready(function () {
    $(document).on('click', '.check', function () {
        //ajax method POST pour changer le statut de la tache
        const etat = $(this).prop('checked') ? 1 : 0;
        postAjax($(this).attr('name'), etat);      
    });

    $(document).on('click', '.radio', function () {
        //on efface tous l'id #BtnAllumer de tous les éléments ayant la class radio
        $('.radio').removeAttr('id');
        //on ajoute l'id #BtnAllumer sur l'élément cliqué
        $(this).attr('id', 'BtnAllumer');
        //on passe l'élément cliqué en checked
        $(this).prop('checked', true);
        //mettre l'élément avec la class statut et name de l'élément cliqué en visible
        $('[class="statut"][name="' + $(this).attr('value') + '"]').css('visibility', 'visible');
        // mettre les autres éléments avec la class statut et name différent de l'élément cliqué en hidden
        $('[class="statut"][name!="' + $(this).attr('value') + '"]').css('visibility', 'hidden');
    });
});

// lorsque la taille de l'écran devient supérieur à 768px on affiche les taches
$(window).resize(function () {
    if ($(window).width() > 900) {
        $('.statut').css('visibility', 'visible');
        //on met l'id #BtnPuce en invisible
        $('#BtnPuce').css('visibility', 'hidden');
    }else{
        //on met l'id #BtnPuce en visible
        $('#BtnPuce').css('visibility', 'visible');
    }
});

//lorsque je double clique sur la balise div avec la class tache je récupère le name de la balise
$(document).on('dblclick', '.taches', function () {
    const tacheId = $(this).attr('name');
    window.location.href = '/Tache/' + tacheId;
});

///////////////////////////////////FUNCTION
//renvoyer le code couleur en hexa
function decimalToHex(decimal) {
    var hex = decimal.toString(16);
    // Ajouter des zéros à gauche pour compléter à six chiffres
    while (hex.length < 6) {
        hex = "0" + hex;
    }
    return hex;
}

function bCheck(nValeur){
    if (nValeur) {
        return "checked"
    }else{
        return " "
    }
}

function getAjax(projetId){
    $.ajax({
        type: 'GET',
        url: "/showTaches/" + projetId,
        data: { projetId: projetId },
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            //boucle for in pour afficher les taches dans la balise section avec la classe statuts
            for (let key in data){
                $('[class="statut"][name="' + data[key].id_statut + '"] .list').append(
                    '<div class="taches" draggable="true" style="background:#' + decimalToHex(data[key].code_couleur) + '" name="' + data[key].id + '">' +
                        '<div><h4>' + data[key].titre +'</h4>'+
                        '<input class="check" type = "checkbox" ' + bCheck(data[key].etat) +' name="'+ data[key].id +'"></div>'+
                        '<p><span>Étiquette :</span> ' + data[key].D_Etiquette +'</p>'+
                    '</div>'
                );
            };
        },
        error: function (data) {
            alert(data.responseJSON.message);
        }
    });
}

function postAjax(tacheId, etat){
    $.ajax({
        type: 'POST',
        url: "/updateTaches/" + tacheId,
        data: { tacheId: tacheId, etat: etat },
        success: function (data) {
            //message de succès
            console.log(data);            
        },
        error: function (data) {
            console.log(data.responseJSON.message);
        }
    });
}

////////////////////////////Drag and drop
// Événement de début de glisser
$(document).on('dragstart', '.taches', function (e) {
    // on spécifie les données à transférer lors du glisser-déposer
    e.originalEvent.dataTransfer.setData('text/plain', $(this).attr('name'));
});

// Événement pendant le survol de la zone de dépôt
$(document).on('dragover', '.statut', function (e) {
    e.preventDefault();
});

// Événement de dépôt
$(document).on('drop', '.statut', function (e) {
    e.preventDefault();

    // on récupère les données lors du lâcher
    const tacheId = e.originalEvent.dataTransfer.getData('text/plain');
    
    // on récupère l'élément de la tâche
    const tacheElement = $('[name="' + tacheId + '"][class="taches"]');

    // on récupère l'élément de la liste de destination
    const listeDestination = $(this).find('.list');

    // On ajoute l'élément de la tâche à la liste de destination
    listeDestination.append(tacheElement);
    $.ajax({   
        type: 'POST',
        url: "/updateStatutTache/" + tacheId,
        data: { tacheId: tacheId, statutId: $(this).attr('name') },
        success: function (data) {
            //message de succès
            console.log("Votre tache a été déplacée avec succès");            
        },
        error: function (data) {
            console.log(data.responseJSON.message);
        }
    });
});
