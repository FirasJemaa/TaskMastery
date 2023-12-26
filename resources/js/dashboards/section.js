// tache 
////////////////////////////////////AFFICHAGE DE LA TACHE EN FONCTION DU PROJET
// boucle foreach avec un écoute d'événement sur le click de la balise li
$(document).on('click', '#listeProjets li', function (e) {
    e.preventDefault();
    const projetId = this.id; 
    //supprimer tous les class active
    $('#listeProjets li').removeClass('active');

    //vider la balise section avec la classe statuts
    $('.statuts').empty();

    //ajouter la class active sur la balise li cliquée
    $(this).addClass('active');

    //ajax method GET pour obtenir les taches du projet ayant l'id projetId
    $.ajax({
        type: 'GET',
        url: "/showTaches/" + projetId,
        data: { projetId: projetId },
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            console.log(data);
            //boucle for in pour afficher les taches dans la balise section avec la classe statuts
            for (let key in data){
                $('.statuts').append(
                    '<div class="taches">' +
                        '<h4>' + data[key].designation +'</h4>'+
                        '<input type = "checkbox" value=' + data[key].notification +'>'+
                        '<p>Étiquette : ' + data[key].id_etiquette +'</p>'+
                    '</div>'
                    );
            };
        },
        error: function (data) {
            console.log(data);
        }
    });
});