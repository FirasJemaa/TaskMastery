/********************************DASHBOARD********************************/
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});

// Appel des fichiers js
import './dashboard/aside.js';
import './dashboard/section.js';
import './attribution.js';

//importer tache.js seulement si on est sur la page tache, voici un exemple url : http://localhost:8000/Tache/37
if (window.location.href.includes("Tache")) {
    import('./tache.js');
}