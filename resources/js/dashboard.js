$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});

function ajouterEmploye() {
    $('#employeModal').modal('show');
}

jQuery('#employeForm').submit(function(e) { 
    e.preventDefault();
    const formData = new FormData(this);

    jQuery.ajax({
        type: 'POST',
        url: "{{ url('store') }}",
        data: formData,
        cache:false,
        contentType: false,
        processData: false,
        success: (data) => {
            console.log(data);
        },
        error: function(data){
            console.log(data);
        }
    });
})