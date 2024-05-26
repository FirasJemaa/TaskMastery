//lorsque je clique sur un élément de la class suppElement je récupère le name et je supprime via fetch
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.suppElement').forEach(function (button) {
        button.addEventListener('click', function () {
            const id_attribution = this.getAttribute('name');
            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            fetch(`/deleteAttribution/${id_attribution}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': token
                },
                body: JSON.stringify({ id: id_attribution })
            })
            .then(response => {
                if (!response.ok) {
                    return response.json().then(error => { throw new Error(error.message) });
                }
                return response.json();
            })
            .then(data => {
                console.log(data.message);
                // Supprimer l'élément de la page
                this.closest('tr').remove();
            })
            .catch(error => {
                alert(error.message);
            });
        });
    });
});