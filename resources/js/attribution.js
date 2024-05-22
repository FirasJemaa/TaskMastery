//lorsque je clique sur un élément de la class suppElement je récupère le name et je supprime via ajax
$(document).on('click', '.suppElement', function(){
    const id_attribution = $(this).attr('name');
    console.log(id_attribution);
    $.ajax({
        url: '/deleteAttribution/' + id_attribution,
        type: 'POST',
        data: {id: id_attribution},
        cache: false,
        contentType: false,
        processData: false,
        success: function(data){
            //supprimer l'élément de la page
            $(this).parent().remove();
        },
        error: function(data){
            alert(data.responseJSON.message);
        }

    });
});