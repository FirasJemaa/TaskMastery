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

    //ajax method GET pour obtenir les taches du projet ayant l'id projetId
    getAjax(projetId);
});

// Changer le statut sur le checkbox
$(document).ready(function () {
    $(document).on('click', '.check', function () {
        //ajax method POST pour changer le statut de la tache
        const notification = $(this).prop('checked') ? 1 : 0;
        postAjax($(this).attr('name'), notification);      
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
                $('[class="statut"][name="' + data[key].id_statut + '"]').append(
                    '<div class="taches" style="background:#' + decimalToHex(data[key].code_couleur) + '" href="google.fr">' +
                        '<div><h4>' + data[key].designation +'</h4>'+
                        '<input class="check" type = "checkbox" ' + bCheck(data[key].notification) +' name="'+ data[key].id +'"></div>'+
                        '<p><span>Étiquette :</span> ' + data[key].D_Etiquette +'</p>'+
                    '</div>'
                );
            };
        },
        error: function (data) {
            console.log(data);
        }
    });
}

function postAjax(tacheId, notification){
    $.ajax({
        type: 'POST',
        url: "/updateTaches",
        data: { tacheId: tacheId, notification: notification },
        success: function (data) {
            //message de succès
            console.log(data);            
        },
        error: function (data) {
            console.log(data);
        }
    });
}

